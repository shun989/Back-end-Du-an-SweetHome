<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_login_fail()
    {
        $user = $this->initUser();
        $user->save();

        $data = [
            'email' => 'toilaai',
            'password' => 'admin123',
        ];

        $response = $this->post('api/login', $data);
        $response->assertStatus(200);
        $response->assertJson(['status' => 'error']);
    }

    public function test_login_success() {

        $user = $this->initUser();
        $user->save();

        $data = [
            'email' => 'admin@123',
            'password' => 'admin123',
        ];

        $response = $this->post('api/login', $data);
        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);
    }
}
