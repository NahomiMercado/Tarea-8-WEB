<?php

use Illuminate\Support\Facades\Route;
//Para las rutas del AuthController
use App\Http\Controllers\AuthController; 

Route::get('/', function () {
    return redirect('/register'); //Registrar como default
});

//Get and Post Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//Get and Post Login
Route::get('/login',[AuthController::class, 'showLogin'])->name('login');
Route::post('/login',[AuthController::class, 'login']);

//Post Logout
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

//Middleare
Route::middleware('auth')->get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

