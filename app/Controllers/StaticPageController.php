<?php

namespace App\Controllers;

class StaticPageController extends BaseController
{
    public function Policy(): string
    {
        return view('policy');
    }
    
    public function AboutUs():string
    {
        return view('about-us');
    }

    public function TermsOfUse():string
    {
        return view('terms-of-use');
    }
}

