<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTOController;

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

Route::get('/', [OTOController::class, 'index'])->name('contact.form');
Route::post('/', [OTOController::class, 'modify'])->name('contact.form');


Route::post('/confirm', [OTOController::class, 'confirm'])->name('contact.confirm');

Route::post('/submit', [OTOController::class, 'submit'])->name('contact.submit');

Route::get('/thanks', function () {return view('thanks');})->name('thanks');

Route::get('/register', [OTOController::class, 'register'])->name('register');
Route::post('/register', [OTOController::class, 'registerSubmit'])->name('register.submit');


Route::get('/login', [OTOController::class, 'login'])->name('login');
Route::post('/login', [OTOController::class, 'loginSubmit'])->name('login.submit');


Route::get('/dashboard', [OTOController::class, 'dashboard'])->name('dashboard.index');
Route::delete('/dashboard/{id}', [OTOController::class, 'destroy'])->name('dashboard.destroy');