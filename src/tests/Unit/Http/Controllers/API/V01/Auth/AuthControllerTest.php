<?php

namespace Tests\Http\Controllers\API\V01\Auth;

use App\Models\User;
use Faker\Provider\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{

    use RefreshDatabase;

    //test register

    public function test_register_should_be_validate()
    {
        $response = $this->postJson(route('auth.register'));
        $response->assertStatus(422);
    }

    public function test_new_user_register()
    {
        $response = $this->postJson(route('auth.register'), [
            'name' => "babak",
            'email' => "babak@gmail.com",
            'password' => "babak",
        ]);
        $response->assertStatus(201);
    }


    //test login

    public function test_login_should_be_validate()
    {
        $response = $this->postJson(route('auth.login'));
        $response->assertStatus(422);
    }

    public function test_new_user_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'secret'),
        ]);

        $response = $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => $password,
        ]);
        $response->assertStatus(200);
    }


    //test logout

    public function test_login_user_can_logout()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->postJson(route('auth.logout'));
        $response->assertStatus(200);
    }


    public function test_show_user_info_if_login()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('auth.user'));
        $response->assertStatus(200);
    }

}
