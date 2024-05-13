<?php

namespace App\Controllers;
use App\Models\User;

class LoginController extends BaseController
{
    public function login()
    {
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");

        $rules = [
            'email' => 'valid_email',
        ];

        $data = [
            'validation' => '',
        ];

        $user = new User($email, $password);
        if($this->validate($rules))
        {
            if ($user->id != null) {
                $session = \Config\Services::session();
                $session->set("user_id", $user->id);
                return redirect() -> to('/');
            }
            else return view('login-failed');
        }
        else 
        {
            $data['validation'] = $this->validator;
            return view('login-failed', $data);
        }
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