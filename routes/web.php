<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('login'); });

Route::get('dashboard', [UserController::class, 'dashboard']); 
Route::post('auth/user', [UserController::class, 'auth'])->name('auth.user'); 
Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('client/store', [ClientController::class, 'store'])->name('client.store');
Route::post('client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::post('/clients/update', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients/{id}/delete', [ClientController::class, 'destroy'])->name('clients.delete');



