<?php

namespace App\Controllers;
use App\Models\CustomSession;

class StaticPageController extends BaseController
{
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

    public function Purchases()
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

