<?php

namespace App\Controllers;
use App\Models\CustomSession;
use App\Models\Admin;

class AdminController extends BaseController
{
    function redirect() // hàm chuyển qua trang điều hướng để kiểm tra biến Secret
    {
        $curr_session = new CustomSession();
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/login') === 0) // nếu user đến từ trang login
        {
            if($curr_session->isSessionSet()) // nếu session đã được set từ trang user
            {
                $curr_user = new Admin();
                if($curr_user->check_admin($curr_session->get_id())) // nếu user thật sự là admin
                {
                    return view ('redirect');
                }
            }
            else 
            {
                $curr_session->delete_session_cookie();
                return redirect() -> to ('/login');
            }
        }
        else 
        {
            $curr_session->delete_session_cookie();
            return redirect() -> to ('/login');
        }
    }

    function check_secret()
    {
        $secret = $this->request->getPost('secret');
        if($secret == 'banana') return redirect() -> to ('/admin/dashboard');
        else
        {
            $curr_session = new CustomSession();
            $curr_session->delete_session_cookie();
            return redirect() -> to ('/login');
        } 
    }


    function show_dashboard()
    {
        $previousUrl = $this->request->getServer('HTTP_REFERER');
        if (strpos($previousUrl, 'http://localhost/pepicase/public/redirect') === 0) // nếu user đến từ trang redirect
        return view('dashboard');
        else
        {
            $curr_session = new CustomSession();
            $curr_session->delete_session_cookie();
            return redirect() -> to ('/login');
        }
    }
}