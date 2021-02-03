<?php

namespace Tests\Feature\Dashboard;

use App\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * Login page return success code
     *
     * @return void
     */
    public function testUserCanViewLoginForm()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /**
     * Can login using correct credentials
     *
     * @return void
     */
    public function testCanLoginUsingCorrectCredentials()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Can login using `email` and `password`
     *
     * @return void
     */
    public function testCanLoginUsingEmailAndPassword()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'username' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Can not login using incorrect credentials
     *
     * @return void
     */
    public function testCanNotLoginUsingIncorrectCredentials()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'username' => $user->email,
            'password' => 'wrong-password'
        ]);

        $response->assertSessionHasErrors([
            'username' => Lang::get('auth.failed')
        ]);
    }

    /**
     * User will get error message
     * if try to login without credentials
     *
     * @return void
     */
    public function testCanNotLoginWithoutCredentials()
    {
        $response = $this->post(route('login'), []);

        $response->assertSessionHasErrors([
            'username' => Str::replaceFirst(':attribute', 'username', Lang::get('validation.required'))
        ]);
    }

    /**
     * User will get errors
     * if try to login without password
     *
     * @return void
     */
    public function testCanNotLoginWithoutPassword()
    {
        $response = $this->post(route('login'), [
            'username' => 'username',
            'password' => null
        ]);

        $response->assertSessionHasErrors([
            'password' => Str::replaceFirst(':attribute', 'password', Lang::get('validation.required'))
        ]);
    }
}
