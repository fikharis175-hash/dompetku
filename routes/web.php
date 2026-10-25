<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dompetku.dashboard');
})->name('dashboard');

Route::get('/transactions/create', function () {
    return view('dompetku.transactions.create');
})->name('transactions.create');

Route::get('/transactions', function () {
    return view('dompetku.transactions.index');
})->name('transactions.index');