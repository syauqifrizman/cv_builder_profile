<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Document;

use App\Http\Controllers\DocumentController;
use App\Models\Personal;

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
                $documentController = new DocumentController();
                $documents = $documentController->getAllDocument();

                return view('dashboard', ['docs' => $documents]);
                break;
            case 'register':
                return view('register');
                break;
            case 'login':
                return view('login');
                break;
            case 'cv_builder':
                $documentController = new DocumentController();
                $selectedDocument = $documentController->getDocumentByID(1);

                return view('cv_builder', ['document' => $selectedDocument]);
                break;
            case 'register':
                return view('register');
                break;
            case 'profile':
                return view('profile');
                break;
            case 'change_password':
                return view('change_password');
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
