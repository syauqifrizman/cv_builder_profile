<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }

    public function cv_builder(){
        return view('cv_builder');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }
}
