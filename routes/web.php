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

Route::get('/', [UserController::class, 'loggedIn'])->name('logged_in');

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

Route::get('/cv_builder/create/{username}', [DocumentController::class, 'formRedirectCreateDocument'])->name('cvBuilderPage');
Route::post('/cv_builder/create/{username}', [DocumentController::class, 'createDocument'])->name('create_document');

// nanti aktifin lagi
// Route::post('/cv_builder', [DocumentController::class, 'store_data'])->name('store_data');
// Route::get('/cv_test/{username}/{document}', [DocumentController::class, 'test'])->name('test');

Route::get('/cv_builder/personal/{username}/{document}/{type}', [DocumentController::class, 'getPersonal'])->name('detail_personal');
// Route::post('/cv_builder/personal/{username}/{document}', [DocumentController::class, 'storePersonal'])->name('store_personal');
Route::put('/cv_builder/personal/{username}/{document}', [DocumentController::class, 'storePersonal'])->name('store_personal');

Route::get('/cv_builder/experience/{username}/{document}/{type}', [DocumentController::class, 'getDetailExperience'])->name('detail_experience');
// Route::post('/cv_builder/experience/{username}/{document}', [DocumentController::class, 'storeExperience'])->name('store_experience');
Route::put('/cv_builder/experience/{username}/{document}', [DocumentController::class, 'storeExperience'])->name('store_experience');

Route::get('/cv_builder/project/{username}/{document}/{type}', [DocumentController::class, 'getDetailProject'])->name('detail_project');
// Route::post('/cv_builder/project/{username}/{document}', [DocumentController::class, 'storeProject'])->name('store_project');
Route::put('/cv_builder/project/{username}/{document}', [DocumentController::class, 'storeProject'])->name('store_project');

Route::get('/cv_builder/education/{username}/{document}/{type}', [DocumentController::class, 'getDetailEducation'])->name('detail_education');
Route::put('/cv_builder/education/{username}/{document}', [DocumentController::class, 'storeEducation'])->name('store_education');

Route::get('/cv_builder/skillOther/{username}/{document}/{type}', [DocumentController::class, 'getDetailSkillOther'])->name('detail_skillOther');
Route::put('/cv_builder/skillOther/{username}/{document}', [DocumentController::class, 'storeSkillOther'])->name('store_skillOther');


Route::get('/dashboard/{username}', [DocumentController::class, 'index'])->name('dashboard');

Route::get('/generate_pdf/{username}/{document}', [DocumentController::class, 'generatePDF'])->name('generate_pdf');


Route::post('/login', [UserController::class, 'loginAccount'])->name('loginAccount');
Route::get('/logout', [UserController::class, 'logoutAccount'])->name('logout');

Route::get('/updateProfile', [ProfileController::class, 'goToProfile'])->name('updatePage');
Route::post('/updateProfile', [ProfileController::class, 'update'])->name('updateProfile');
Route::get('/changePassword', [ProfileController::class, 'goToPassword'])->name('changePasswordPage');
Route::post('/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');
