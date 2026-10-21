<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

/**
 * Exercises the registration form's validation rules (RegisterController::validator)
 * directly, without going through HTTP. End-to-end behaviour lives in Feature\RegisterTest.
 */
class RegisterValidatorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // The unique:users rule needs the table to exist.
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
        });

        // Don't call Google's siteverify endpoint from tests.
        Validator::extend('recaptcha', fn ($attribute, $value) => $value === 'valid-token');
    }

    private function validate(array $overrides = []): \Illuminate\Contracts\Validation\Validator
    {
        $data = array_merge([
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

        $method = new \ReflectionMethod(RegisterController::class, 'validator');
        $method->setAccessible(true);

        return $method->invoke(new RegisterController(), $data);
    }

    public function test_valid_data_passes()
    {
        $validator = $this->validate();

        $this->assertFalse($validator->fails(), $validator->errors()->toJson());
    }

    public function test_middlename_is_optional()
    {
        $validator = $this->validate(['middlename' => null]);

        $this->assertFalse($validator->errors()->has('middlename'));
    }

    /**
     * @dataProvider requiredFields
     */
    public function test_required_fields(string $field)
    {
        $validator = $this->validate([$field => '']);

        $this->assertTrue($validator->errors()->has($field));
    }

    public function requiredFields(): array
    {
        return [
            'name' => ['name'],
            'surname' => ['surname'],
            'email' => ['email'],
            'password' => ['password'],
            'g-recaptcha-response' => ['g-recaptcha-response'],
            'terms' => ['terms'],
            'country_id' => ['country_id'],
        ];
    }

    /**
     * @dataProvider limitedFields
     */
    public function test_fields_are_limited_to_255_characters(string $field)
    {
        $this->assertFalse($this->validate([$field => str_repeat('a', 255)])->errors()->has($field));
        $this->assertTrue($this->validate([$field => str_repeat('a', 256)])->errors()->has($field));
    }

    public function limitedFields(): array
    {
        return [
            'name' => ['name'],
            'middlename' => ['middlename'],
            'surname' => ['surname'],
        ];
    }

    public function test_password_minimum_length_is_10()
    {
        $this->assertFalse($this->validate([
            'password' => 'Sec123!abc',
            'password_confirmation' => 'Sec123!abc',
        ])->errors()->has('password'));

        $this->assertTrue($this->validate([
            'password' => 'Sec123!ab',
            'password_confirmation' => 'Sec123!ab',
        ])->errors()->has('password'));
    }

    /**
     * @dataProvider weakPasswords
     */
    public function test_password_complexity(string $password)
    {
        $validator = $this->validate([
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $this->assertTrue($validator->errors()->has('password'));
    }

    public function weakPasswords(): array
    {
        return [
            'no uppercase' => ['secret123!pass'],
            'no lowercase' => ['SECRET123!PASS'],
            'no digit' => ['SecretPass!word'],
            'no special character' => ['Secret123pass'],
        ];
    }

    public function test_password_must_be_confirmed()
    {
        $validator = $this->validate(['password_confirmation' => 'Different123!pass']);

        $this->assertTrue($validator->errors()->has('password'));
    }

    /**
     * @dataProvider acceptedTermsValues
     */
    public function test_terms_accepted_values(string $value)
    {
        $this->assertFalse($this->validate(['terms' => $value])->errors()->has('terms'));
    }

    public function acceptedTermsValues(): array
    {
        return [['1'], ['on'], ['yes'], ['true']];
    }

    public function test_terms_rejected_when_not_accepted()
    {
        $this->assertTrue($this->validate(['terms' => '0'])->errors()->has('terms'));
    }

    public function test_invalid_email_format_is_rejected()
    {
        $this->assertTrue($this->validate(['email' => 'not-an-email'])->errors()->has('email'));
    }

    public function test_email_already_taken_is_rejected()
    {
        DB::table('users')->insert(['email' => 'jane.doe.test@gmail.com']);

        $this->assertTrue($this->validate()->errors()->has('email'));
    }

    public function test_failed_recaptcha_is_rejected()
    {
        $validator = $this->validate(['g-recaptcha-response' => 'bad-token']);

        $this->assertTrue($validator->errors()->has('g-recaptcha-response'));
    }
}
