<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layouts/dashboard', ['title' => 'Dashboard']);
    }
    public function dashboard(): string
    {
        return view('layouts/dashboard', ['title' => 'Dashboard']);
    }
}
