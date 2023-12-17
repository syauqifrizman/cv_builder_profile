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
    return view('home', ['title' => 'Home']);
});

// Route::get('/cv_builder', [PageController::class, 'cv_Builder'])->name('cv_builder');
// Route::post('/dashboard', [PageController::class, 'login'])->name('login');
// Route::get('/register', [PageController::class, 'register'])->name('register');
// Route::get('/dashboard',[PageController::class, 'dashboard'])->name('dashboard');

// nanti aktifin lagi
// Route::get('/register', [RegisterController::class, 'create'])->name('register');
// Route::post('register', [RegisterController::class, 'store'])->name('register');

// Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
// Route::post('login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
// Route::post('/dashboard', [UserController::class, 'login'])->name('login')->middleware('auth');

// nanti aktifin lagi
// Route::get('/login', [LoginController::class, 'login'])->name('login');

// Route::post('login', [LoginController::class, 'authenticate'])->name('login');
// Route::post('/dashboard', [UserController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('update');
Route::post('/change_password', [ProfileController::class, 'changePassword'])->name('changePassword');

// Route::get('/{page}', [PageController::class, 'redirectPage'])->name('redirect.page');

// Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::get('/login', [UserController::class, 'goToLoginPage'])->name('loginPage');
Route::get('/register', [UserController::class, 'goToRegisterPage'])->name('registerPage');
Route::post('/register', [UserController::class, 'registerAccount'])->name('registerAccount');

// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/cv_builder', [DocumentController::class, 'goToCvBuilder'])->name('cvBuilderPage');
// nanti aktifin lagi
// Route::post('/cv_builder', [DocumentController::class, 'store_data'])->name('store_data');

Route::get('/cv_test/{username}/{document}', [DocumentController::class, 'test'])->name('test');
Route::post('/cv_test/{username}/{document}', [DocumentController::class, 'storeTest'])->name('storeTest');
Route::put('/cv_test/{username}/{document}', [DocumentController::class, 'storeTest'])->name('storeTest');

Route::get('/dashboard/{user_id}', [DocumentController::class, 'index'])->name('dashboard');

Route::get('/cv_builder/{username}/{document_id}', [DocumentController::class, 'getDetail'])->name('detail');

//Route::post('/dashboard', [UserController::class, 'login'])->name('login');
