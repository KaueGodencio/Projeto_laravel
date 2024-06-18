<?php

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

Route::get('/', function () {

    $nome = "Kaue";
    $idade = "29";


    $arr = [1, 2, 3, 4, 5];




    return view('welcome', [
        'nome' => $nome,
        'idade2' => $idade,
        'profissao' => "Progrador",
        'arr' => $arr

    ]);
});


Route::get('/contact', function () {
    return view('contact');
});


Route::get('/produtos', function () {
    $busca = request('search');
    return view('produtos', ['busca' => $busca]);
});


Route::get('/produto_testes/{id?}', function ($id = null) {
    return view('produto', ['id' => $id]);
});
