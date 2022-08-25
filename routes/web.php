<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route pour Administrateurs
Route::get('/administrateurs/create', [App\Http\Controllers\AdministrateursController::class, 'index'])->name('administrateurs');
Route::post('/administrateurs', [App\Http\Controllers\AdministrateursController::class, 'create'])->name('administrateurs.create');
Route::get('/administrateurs', [App\Http\Controllers\AdministrateursController::class, 'tableaubord'])->name('administrateurs.tableaubord');

// Route pour Clients
Route::get('/clients/create', [App\Http\Controllers\ClientsController::class, 'index'])->name('clients');
Route::post('/clients', [App\Http\Controllers\ClientsController::class, 'create'])->name('clients.create');
Route::get('/clients', [App\Http\Controllers\ClientsController::class, 'tableaubord'])->name('clients.tableaubord');

