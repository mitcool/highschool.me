<?php

namespace Tests\Feature;

use App\InvoiceDetail;
use App\Mail\VerificationProfile;
use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // The generated migrations don't run cleanly, so build only the tables registration touches.
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('middlename')->nullable();
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->string('confirmation_code', 225);
            $table->boolean('is_verified')->default(0);
            $table->tinyInteger('must_change_password')->nullable();
        });

        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('country_id');
        });

        // Don't call Google's siteverify endpoint from tests.
        Validator::extend('recaptcha', fn ($attribute, $value) => $value === 'valid-token');

        Mail::fake();
    }

    private function validData(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Jane',
            'middlename' => '',
            'surname' => 'Doe',
            // email:dns does a real MX lookup, so use a domain that has one.
            'email' => 'jane.doe.test@gmail.com',
            'password' => 'Secret123!pass',
            'password_confirmation' => 'Secret123!pass',
            'g-recaptcha-response' => 'valid-token',
            'terms' => '1',
            'country_id' => 7,
        ], $overrides);
    }

    public function test_valid_registration_creates_unverified_parent_and_redirects_to_login()
    {
        $response = $this->post('/register', $this->validData());

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('success_message');
        $this->assertGuest();

        $user = User::where('email', 'jane.doe.test@gmail.com')->first();
        $this->assertNotNull($user);
        $this->assertSame(2, (int) $user->role_id);
        $this->assertSame(0, (int) $user->is_verified);
        $this->assertSame(30, strlen($user->confirmation_code));
        $this->assertTrue(Hash::check('Secret123!pass', $user->password));

        $this->assertTrue(InvoiceDetail::where('user_id', $user->id)->where('country_id', 7)->exists());
    }

    public function test_valid_registration_sends_verification_email()
    {
        $this->post('/register', $this->validData());

        Mail::assertSent(VerificationProfile::class, function ($mail) {
            return $mail->hasTo('jane.doe.test@gmail.com');
        });
    }

    public function test_required_fields_are_validated()
    {
        $response = $this->post('/register', []);

        $response->assertSessionHasErrors([
            'name', 'surname', 'email', 'password', 'g-recaptcha-response', 'terms', 'country_id',
        ]);
        $this->assertSame(0, User::count());
        Mail::assertNothingSent();
    }

    /**
     * @dataProvider weakPasswords
     */
    public function test_weak_passwords_are_rejected(string $password)
    {
        $response = $this->post('/register', $this->validData([
            'password' => $password,
            'password_confirmation' => $password,
        ]));

        $response->assertSessionHasErrors('password');
        $this->assertSame(0, User::count());
    }

    public function weakPasswords(): array
    {
        return [
            'too short' => ['Sec123!ab'],
            'no uppercase' => ['secret123!pass'],
            'no lowercase' => ['SECRET123!PASS'],
            'no digit' => ['SecretPass!word'],
            'no special character' => ['Secret123pass'],
        ];
    }

    public function test_password_confirmation_must_match()
    {
        $response = $this->post('/register', $this->validData([
            'password_confirmation' => 'Different123!pass',
        ]));

        $response->assertSessionHasErrors('password');
        $this->assertSame(0, User::count());
    }

    public function test_email_must_be_unique()
    {
        $this->post('/register', $this->validData());

        $response = $this->post('/register', $this->validData(['name' => 'Second']));

        $response->assertSessionHasErrors('email');
        $this->assertSame(1, User::count());
    }

    public function test_invalid_email_is_rejected()
    {
        $response = $this->post('/register', $this->validData(['email' => 'not-an-email']));

        $response->assertSessionHasErrors('email');
    }

    public function test_terms_must_be_accepted()
    {
        $response = $this->post('/register', $this->validData(['terms' => '0']));

        $response->assertSessionHasErrors('terms');
        $this->assertSame(0, User::count());
    }

    public function test_failed_recaptcha_is_rejected()
    {
        $response = $this->post('/register', $this->validData(['g-recaptcha-response' => 'bad-token']));

        $response->assertSessionHasErrors('g-recaptcha-response');
        $this->assertSame(0, User::count());
    }

    public function test_logged_in_user_cannot_register_again()
    {
        $user = User::create([
            'name' => 'Existing',
            'surname' => 'User',
            'email' => 'existing@gmail.com',
            'password' => Hash::make('Secret123!pass'),
            'role_id' => 2,
            'confirmation_code' => 'abc',
            'is_verified' => 1,
        ]);

        $response = $this->actingAs($user)->post('/register', $this->validData());

        $response->assertRedirect();
        $this->assertSame(1, User::count());
    }
}
