<?php

namespace App\Controllers;
use App\Models\CustomSession;

class StaticPageController extends BaseController
{
    // trang để trả view các trang tĩnh
    public function Policy(): string
    {
        return view('policy');
    }
    
    public function AboutUs(): string
    {
        return view('about-us');
    }

    public function TermsOfUse():string
    {
        return view('terms-of-use');
    }

    public function account()
    {
        $curr_session = new CustomSession(null);
        $curr_session->fetch_session_cookie();
        // check xem người dùng đã log in chưa
        if($curr_session->isSessionSet()) // nếu có
        {
            // chạy database, kiểm tra xem người dùng đó có user_info chưa
            // nếu có thì lấy user info đó về thôi
            // nếu chưa thì không làm
            return view('account');
        }
        else return redirect() -> to ('/login');
    }

    public function Purchases() // purchases cũng tĩnh nhưng tĩnh ở một mức nhất định
    {
        $curr_session = new CustomSession(null);
        if($curr_session->isSessionSet())
        {
            
        }
        else
        {
            return redirect() -> to ('/login');
        }
    }


}

