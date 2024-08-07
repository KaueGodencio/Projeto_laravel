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
Route::get('/events/create', [EventController::class,'create']);
Route::post('/events', [EventController::class,'store']);

Route::get('/contatos/contact', [EventController::class,'contact']);
Route::get('/produtos/product', [EventController::class,'product']);


/* Route::get('/contact', function () {
    return view('contact');
});


Route::get('/produtos', function () {
    $busca = request('search');
    return view('produtos', ['busca' => $busca]);
});



Route::get('/produto_testes/{id?}', function ($id = null) {
    return view('produto', ['id' => $id]);
});
 */