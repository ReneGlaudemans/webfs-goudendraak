<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KassaController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::get('/kassa',[KassaController::class, 'index'])->name('kassa.index');

require __DIR__.'/auth.php';
