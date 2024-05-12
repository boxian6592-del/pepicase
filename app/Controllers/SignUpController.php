<?php

namespace App\Controllers;
use App\Models\User;

class SignUpController extends BaseController
{
    public function send_signup_mail(): string
    {
        $user = new User();
        return view('index');
    }

    public function signup(): string
    {
        $new = new User();
    }
}