<?php

namespace Tests\Feature\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Login page return success code.
     *
     * @return void
     */
    public function test_user_can_view_login_form()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /**
     * Can login using correct credentials.
     *
     * @return void
     */
    public function test_can_login_using_correct_credentials()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Can login using `email` and `password`.
     *
     * @return void
     */
    public function test_can_login_using_email_and_password()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'username' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Can not login using incorrect credentials.
     *
     * @return void
     */
    public function test_can_not_login_using_incorrect_credentials()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'username' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors([
            'username' => Lang::get('auth.failed'),
        ]);
    }

    /**
     * User will get error message
     * if try to login without credentials.
     *
     * @return void
     */
    public function test_can_not_login_without_credentials()
    {
        $response = $this->post(route('login'), []);

        $response->assertSessionHasErrors([
            'username' => Str::replaceFirst(':attribute', 'username', Lang::get('validation.required')),
        ]);
    }

    /**
     * User will get errors
     * if try to login without password.
     *
     * @return void
     */
    public function test_can_not_login_without_password()
    {
        $response = $this->post(route('login'), [
            'username' => 'username',
            'password' => null,
        ]);

        $response->assertSessionHasErrors([
            'password' => Str::replaceFirst(':attribute', 'password', Lang::get('validation.required')),
        ]);
    }
}
