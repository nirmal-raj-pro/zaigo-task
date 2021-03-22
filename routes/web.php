<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Profile\ProfileController;
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

Route::redirect('/', 'login');

Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('login', [LoginController::class, 'authenticateLogin']);


Route::get('newuser', [Controller::class, 'getCreateForm'])->name('newuser');
Route::post('newuserpost', [Controller::class, 'postCreateForm'])->name('create.newuser');

Route::group(['middleware' => ['auth', 'role']], function () {
    Route::get('dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');
    Route::get('edit/{id}', [AdminController::class, 'getEditForm']);
    Route::post('update/{id}', [AdminController::class, 'updateUser']);
    Route::get('delete/{id}', [AdminController::class, 'destroy']); 
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('index', [UserController::class, 'getIndex'])->name('index');
});

Route::get('profile/{id}', [ProfileController::class, 'GetProfile'])->name('profile');
Route::post('profile/update/{id}', [ProfileController::class, 'UpdateProfile']);


Route::get('logout', [LoginController::class, 'logOut'])->name('logout');
