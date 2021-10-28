<?php

use App\Models\UserManagement\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('my-savings', [WelcomeController::class, 'mySaving'])->name('my-saving');

Route::get('/login', function() {
    $users = User::all();
    if ($users->count() == 0 ) {
        return view('auth.register');
    } else {
        return view('auth.login');
    }
})->name('login');

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('income', IncomeController::class);
    Route::resource('expense', ExpenseController::class);
});
