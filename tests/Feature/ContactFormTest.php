<?php

namespace Tests\Feature;

use App\GeneralRequest;
use App\Mail\GeneralRequestMail;
use App\Subscriber;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

/**
 * Contact form on the "Contact Us" page (pages/footer/contact-us-page.blade.php),
 * which posts to /send-email-modal. Payloads mirror exactly what that form sends.
 */
class ContactFormTest extends TestCase
{
    private const URL = '/send-email-modal';

    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->boolean('is_active')->default(0);
            $table->integer('lang');
            $table->string('code');
        });

        // No migration exists for this table; columns taken from App\GeneralRequest::$fillable.
        Schema::create('general_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->string('request_type')->nullable();
            $table->text('message');
            $table->timestamps();
        });

        Mail::fake();
    }

    private function formData(array $overrides = []): array
    {
        return array_merge([
            'name_request' => 'Jane Doe',
            'email_request' => 'jane@example.com',
            'message' => 'I would like more information about your programs.',
            // Honeypot fields, left empty by real users.
            'name' => '',
            'email' => '',
            'age' => '',
            'g-recaptcha-response' => 'token',
        ], $overrides);
    }

    public function test_contact_form_endpoint_exists()
    {
        // Check the exception itself: rendering the 404 page can fail and surface as a 500.
        $this->withoutExceptionHandling();

        try {
            $this->post(self::URL, $this->formData());
        } catch (NotFoundHttpException | MethodNotAllowedHttpException $e) {
            $this->fail('The contact form posts to '.self::URL.' but no route handles it.');
        } catch (\Throwable $e) {
            // Any other failure is covered by the behaviour tests below.
        }

        $this->addToAssertionCount(1);
    }

    public function test_valid_submission_redirects_back_with_success_message()
    {
        $response = $this->from('/contact')->post(self::URL, $this->formData());

        $response->assertRedirect('/contact');
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success_message');
    }

    public function test_valid_submission_stores_request_and_subscriber()
    {
        $this->post(self::URL, $this->formData());

        $this->assertDatabaseHas('general_requests', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'I would like more information about your programs.',
        ]);
        $this->assertDatabaseHas('subscribers', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'is_active' => 1,
        ]);
    }

    public function test_valid_submission_emails_the_team()
    {
        $this->post(self::URL, $this->formData());

        Mail::assertSent(GeneralRequestMail::class, fn ($mail) => $mail->hasTo('graduate@graduate.me'));
        Mail::assertSent(GeneralRequestMail::class, fn ($mail) => $mail->hasTo('mathias.kunze@onsites.com'));
    }

    public function test_existing_subscriber_is_not_duplicated()
    {
        Subscriber::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'lang' => 1,
            'is_active' => 1,
            'code' => 'existing',
        ]);

        $this->post(self::URL, $this->formData());

        $this->assertSame(1, Subscriber::count());
        $this->assertSame(1, GeneralRequest::count());
    }

    public function test_required_fields_are_validated()
    {
        $response = $this->post(self::URL, $this->formData([
            'name_request' => '',
            'email_request' => '',
            'message' => '',
        ]));

        $response->assertSessionHasErrors(['name_request', 'email_request', 'message']);
        $this->assertSame(0, GeneralRequest::count());
        Mail::assertNothingSent();
    }

    public function test_invalid_email_is_rejected()
    {
        $response = $this->post(self::URL, $this->formData(['email_request' => 'not-an-email']));

        $response->assertSessionHasErrors('email_request');
    }

    public function test_overlong_name_and_message_are_rejected()
    {
        $response = $this->post(self::URL, $this->formData([
            'name_request' => str_repeat('a', 61),
            'message' => str_repeat('a', 2001),
        ]));

        $response->assertSessionHasErrors(['name_request', 'message']);
    }

    /**
     * @dataProvider honeypotFields
     */
    public function test_bot_filling_honeypot_is_silently_ignored(string $field)
    {
        // A bot request should be dropped quietly, not error out.
        $this->withoutExceptionHandling();

        $this->post(self::URL, $this->formData([$field => 'bot']));

        $this->assertSame(0, GeneralRequest::count());
        $this->assertSame(0, Subscriber::count());
        Mail::assertNothingSent();
    }

    public function honeypotFields(): array
    {
        return [
            'name' => ['name'],
            'email' => ['email'],
            'age' => ['age'],
        ];
    }
}
