<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::resource('members', MemberController::class);
Route::get('/', function () {
    return view('welcome');
});

// Route group dengan prefix /admin
Route::prefix('admin')->group(function () {
    Route::get('/info', function () {
        return response()->json([
            'status' => 'success',
            'message' => 'Selamat datang di halaman Admin Info Perpustakaan'
        ]);
    })->name('admin.info');
});