<?php

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Logout;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// })->name('home');

// Route::get('/cv_builder', function () {
//     return view('cv_builder');
// })->name('cv_builder');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

Route::get('/test', function () {
    return view('archive.test');
})->name('test');

Route::get('/', function(){
    return view('home');
})->name('home');

// Route::get('/cv_builder', [PageController::class, 'cv_Builder'])->name('cv_builder');
// Route::post('/dashboard', [PageController::class, 'login'])->name('login');
// Route::get('/register', [PageController::class, 'register'])->name('register');
// Route::get('/dashboard',[PageController::class, 'dashboard'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register');

// Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
// Route::post('login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
// Route::post('/dashboard', [UserController::class, 'login'])->name('login')->middleware('auth');

Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/dashboard', [UserController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('update');
Route::post('/change_password', [ProfileController::class, 'changePassword'])->name('changePassword');









Route::get('/{page}', [PageController::class, 'redirectPage'])->name('redirect.page');


Route::get('/cv_builder/{username}/{document_id}', [DocumentController::class, 'getDetail'])->name('detail');

//Route::post('/dashboard', [UserController::class, 'login'])->name('login');
