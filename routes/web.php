<?php

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


Route::post('/admin-register', [\App\Http\Controllers\Admin\AdminController::class, 'adminRegisterStore']);

Route::get('/admin-register', [\App\Http\Controllers\Admin\AdminController::class, 'adminRegisterForm'])->name('admin-register');

Route::get('/admin-login', [\App\Http\Controllers\Admin\AdminController::class, 'adminLoginForm'])->name('admin-login');

Route::post('/admin-login', [\App\Http\Controllers\Admin\AdminController::class, 'adminLogin']);

Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'adminDashboard'])->name('admin.dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
