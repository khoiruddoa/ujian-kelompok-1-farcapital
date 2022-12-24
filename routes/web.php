<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "home",
        'active' => 'home',
    ]);
});

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
    return view('dashboard.index', [
        "title" => "dashboard",
        'active' => 'dashboard',
    ]);
})->name("dashboard");

Route::get('/dashboard/aspiration', function () {
    return view('dashboard.aspiration.index', [
        "title" => "aspiration",
        'active' => 'aspiration',
    ]);
})->name("aspiration");

Route::get('/dashboard/aspiration/create', function () {
    return view('dashboard.aspiration.create', [
        "title" => "create",
        'active' => 'create',
    ]);
})->name("aspiration.create");

Route::get('/dashboard/register', function () {
    return view('dashboard.register.index', [
        "title" => "register",
        'active' => 'register',
    ]);
})->name("dashboard.register");

Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
