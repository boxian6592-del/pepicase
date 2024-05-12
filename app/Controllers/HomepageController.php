<?php

namespace App\Controllers;

class HomepageController extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function testing(): string
    {
        return view('testing');
    }
}
