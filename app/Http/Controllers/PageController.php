<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function redirectPage($page)
    {
        // Menangani redirect ke berbagai halaman
        switch ($page) {
            case 'home':
                return view('home');
                break;
            case 'dashboard':
                return view('dashboard');
                break;
            case 'register':
                return view('register');
                break;
            case 'login':
                return view('login');
                break;
            case 'cv_builder':
                return view('cv_builder');
                break;
            case 'register':
                return view('register');
                break;
            // Tambahkan halaman lainnya sesuai kebutuhan
            default:
                return abort(404);
        }
    }

    public function login(){
        return redirect()->route('redirect.page', ['page' => 'dashboard']);
    }
}
