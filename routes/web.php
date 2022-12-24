<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CaptchaServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home', [
//         "title" => "home",
//         'active' => 'home',
//     ]);
// });

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'active' => 'about',
    ]);
});
Route::get('/aspiration', function () {
    return view('aspiration', [
        "title" => "aspiration",
        'active' => 'aspiration',
    ]);
})->name("aspiration");

Route::get('/login', function () {
    return view('login.index', [
        "title" => "login",
        'active' => 'login',
    ]);
})->name("login");

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('auth');
