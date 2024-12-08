<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReminderController;

// Halaman utama menampilkan semua reminder
Route::get('/', [ReminderController::class, 'indexView'])->name('reminders.index');

// Menampilkan form untuk membuat reminder baru
Route::get('/reminders/create', [ReminderController::class, 'createView'])->name('reminders.create');
Route::post('/reminders', [ReminderController::class, 'store'])->name('reminders.store');

// Menampilkan detail reminder berdasarkan ID
Route::get('/reminders/{id}', [ReminderController::class, 'showView'])->name('reminders.show');

// Menampilkan form edit reminder
Route::get('/reminders/{id}/edit', [ReminderController::class, 'editView'])->name('reminders.edit');
Route::put('/reminders/{id}', [ReminderController::class, 'update'])->name('reminders.update');

// Menghapus reminder
Route::delete('/reminders/{id}', [ReminderController::class, 'destroy'])->name('reminders.destroy');
