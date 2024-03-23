<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.content');
    }
    public function search()
    {
        return view('pages.search');
    }
    public function login()
    {
        return view('pages.login');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function flight()
    {
        return view('pages.flight');
    }
    public function detail()
    {
        return view('pages.detail');
    }
}
