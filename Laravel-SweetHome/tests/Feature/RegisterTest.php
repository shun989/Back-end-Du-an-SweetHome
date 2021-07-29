<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_fail()
    {
        $data = [
            'email' => 'toilaai',
            'phone' => '079809798',
            'password' => '1232'
        ];
        $response = $this->post('api/auth/register', $data);
        $response->assertStatus(400);
    }

    public function test_register_success() {
        $data = [
            'name' => 'toilaai',
            'email' => 'toilaai@gmail.com',
            'phone' => '099809923',
            'password' => '1232123',
            'password_confirmation' => '1232123',
        ];
        $response = $this->post('api/auth/register', $data);
        $response->assertStatus(201);
    }
}
