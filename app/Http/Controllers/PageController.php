<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Document;

use App\Http\Controllers\DocumentController;
use App\Models\Personal;

class PageController extends Controller
{
    // protected $documentController;

    // public function __construct(DocumentController $document)
    // {
    //     $this->documentController = $document;
    // }

    // public function redirectPage($page)
    // {
    //     // Menangani redirect ke berbagai halaman
    //     switch ($page) {
    //         case 'home':
    //             return view('home', [
    //                 "title" => "Home"
    //             ]);
    //             break;
    //         case 'dashboard':
    //             $documents = $this->documentController->getAllDocument();
    //             return view('dashboard', [
    //                 "docs" => $documents,
    //                 "title" => "Dashboard"
    //             ]);
    //             break;
    //         case 'register':
    //             return view('register', [
    //                 "title" => "Register Account"
    //             ]);
    //             break;
    //         case 'login':
    //             return view('login', [
    //                 "title" => "Login Account"
    //             ]);
    //             break;
    //         case 'cv_builder':
    //             return view('cv_builder', [
    //                 'document' => null,
    //                 "title" => "CV Builder"
    //             ]);
    //             break;
    //         case 'profile':
    //             return view('profile', [
    //                 "title" => "Profile Account"
    //             ]);
    //             break;
    //         case 'change_password':
    //             return view('change_password', [
    //                 "title" => "Change Password Account"
    //             ]);
    //             break;
    //         case 'update':
    //             return view('profile', [
    //                 "title" => "Update Account"
    //             ]);
    //             break;
    //         // Tambahkan halaman lainnya sesuai kebutuhan
    //         default:
    //             return abort(404);
    //     }
    // }

}
