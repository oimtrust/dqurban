<?php

use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
})->name('welcome');

Route::get('/login', function() {
    $users = User::all();
    if ($users->count() == 0 ) {
        return view('auth.register');
    } else {
        return view('auth.login');
    }
})->name('login');

Route::post('register', [AuthController::class, 'register'])->name('register');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
