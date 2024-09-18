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


/* criando uma nova rota do verbo "GET" estou recebendo dados onde eu acesso a URL /contact e vou ter  volta um arquivo de blade.php que tem HTML com PHP */

Route::get('/', [EventController::class,'index']);
Route::get('/events/create', [EventController::class,'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class,'show']);
Route::post('/events', [EventController::class,'store']);

Route::get('/dashboard', [EventController::class,'dashboard'])->middleware('auth');


/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */





