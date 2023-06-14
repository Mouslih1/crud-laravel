<?php

use App\Http\Controllers\EtudiantController;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [EtudiantController::class, 'welcome'])->name('acceuil');
Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant');
Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::post('/etudiant/create', [EtudiantController::class, 'store'])->name('etudiant.ajouter');
Route::post('/etudiant/{etudiant}', [EtudiantController::class, 'delete'])->name('etudiant.supprimer');
Route::put('/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');

