<?php

use App\Http\Controllers\ApiController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('apiwork', [ApiController::class, 'apiwork'])->name('apiwork');

Route::delete('/contacts/{id}', [ApiController::class, 'destroy'])->name('delete.contact');

Route::get('/apidataform', [ApiController::class, 'apidataform'])->name('apidataform');

Route::post('/save-contact', [ApiController::class, 'saveContact'])->name('save.contact');