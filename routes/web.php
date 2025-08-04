<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'home'])->name('welcome');

Route::get('/contacto', [HomeController::class, 'contact'])->name('contacto');

Route::get('/albumes', [HomeController::class, 'albums'])->name('albumes');
Route::get('/albumes/{id}', [HomeController::class, 'showAlbum'])->name('album');
