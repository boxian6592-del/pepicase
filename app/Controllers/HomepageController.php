<?php

namespace App\Controllers;

class HomepageController extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
}
