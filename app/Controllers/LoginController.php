<?php

namespace App\Controllers;
use App\Models\User;

class LoginController extends BaseController
{
    public function login(): string
    {
        $user = new User();
        
        return view('login');
    }

    public function index(): string
    {
        return view('login');
    }

    public function signup():string
    {
        return view('signup');
    }

    public function resetPassword():string
    {
        return view('resetpassword1');
    }
}