<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DocumentController;


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
Route::post('/dashboard', [PageController::class, 'login'])->name('login');
// Route::get('/register', [PageController::class, 'register'])->name('register');
// Route::get('/dashboard',[PageController::class, 'dashboard'])->name('dashboard');
Route::get('/{page}', [PageController::class, 'redirectPage'])->name('redirect.page');
Route::get('/cv_builder/{username}/{document_id}', [DocumentController::class, 'getDetail'])->name('detail');
