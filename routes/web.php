<?php

use App\Http\Controllers\Admin\AuthenticateController;
use App\Http\Controllers\Admin\ImageController;
use Illuminate\Support\Facades\Route;

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
});


Route::get('/admin', [AuthenticateController::class, 'loginView'])->name('admin.login');
Route::post('/authenticate', [AuthenticateController::class, 'loginPost'])->name('admin.login.post');
Route::get('/logout', [AuthenticateController::class, 'logout'])->name('admin.logout');
Route::get('/register', [AuthenticateController::class, 'registerView'])->name('admin.register');
Route::post('/post_register', [AuthenticateController::class, 'registerPost'])->name('admin.register.post');

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::resource('image', ImageController::class);
});