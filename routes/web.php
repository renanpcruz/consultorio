<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

//pages
Route::get('/', [EventController::class, 'index']);
Route::get('/pacientes/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/pacientes/{id}', [EventController::class, 'show']);
Route::get('/pacientes/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/pacientes', [EventController::class, 'store']);
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::delete('/pacientes/{id}', [EventController::class, 'destroy'])->middleware('auth');




//LEMBRAR DE POR AS COISAS DENTRO DO CONTROLLER, DELETE, UPDATE E TALS, VER SE FUNCIONA


