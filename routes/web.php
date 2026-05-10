<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TetsQrController;

Route::get('/', function () {
    return redirect('/generate-qr');
});

Route::get('/generate-qr', [TetsQrController::class, 'generate'])->name('qr.generate');

Route::get('/form/{id}', [TetsQrController::class, 'showForm'])->name('form');
Route::post('/form/{id}', [TetsQrController::class, 'submit']);

Route::get('/success', [TetsQrController::class, 'success'])->name('success');
