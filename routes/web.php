<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('organizations', OrganizationController::class)->except(['show']);

Route::resource('contacts', ContactController::class)->except(['show']);

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

