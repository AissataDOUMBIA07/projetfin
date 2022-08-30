<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FormationsController;
use App\Http\Controllers\PersonnelsController;
use App\Http\Controllers\VoituresController;
use App\Http\Controllers\ExamensController;
use App\Http\Controllers\ResultatsController;
use App\Http\Controllers\ProgrammesController;

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

// route pour formation
Route::resource('/Formations', FormationsController::class);
// Route::get('Formations', [App\Http\Controllers\FormationsController::class, 'index']);

// route pour personnels
Route::resource('/Personnels', PersonnelsController::class);

// route pour voitures
Route::resource('/Voitures', VoituresController::class);

// route pour examens
Route::resource('/Examens', ExamensController::class);

// route pour resultats
Route::resource('/Resultats', ResultatsController::class);

// route pour programme
Route::resource('/Programmes', ProgrammesController::class);


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

