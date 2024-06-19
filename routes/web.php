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


Route::get('/contact', function () {
    return view('contact');
});

/* Rotas de Buscas que verifica o Request do usuario pelo nome digitado */
Route::get('/produtos', function () {
    $busca = request('search');
    return view('produtos', ['busca' => $busca]);
});

/* fim */


Route::get('/produto_testes/{id?}', function ($id = null) {
    return view('produto', ['id' => $id]);
});
