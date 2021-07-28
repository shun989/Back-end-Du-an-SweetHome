<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    function initUser() {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@123';
        $user->password = Hash::make('admin123');
        return $user;
    }
}
