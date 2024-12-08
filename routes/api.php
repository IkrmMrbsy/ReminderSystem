<?php

use App\Http\Controllers\ReminderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Dengan pakai (resource) Menghasilkan seluruh rute CRUD, ketimbang kita buat satu2 seperti (Route::get,POST)
Route::resource('reminders', ReminderController::class);
