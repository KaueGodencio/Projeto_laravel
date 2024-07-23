<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $nome = "Kaue";
        $idade = "29";
        $arr = [1, 2, 3, 4, 5];
        return view('welcome', [
            'nome' => $nome,
            'idade2' => $idade,
            'profissao' => "Progrador",
            'arr' => $arr

        ]);
    }


    public function create() {
        return view('events.create');

    }

    public function contact() {
        return view('contatos/contact');

    }
    public function product() {
        return view('produtos/product');

    }
}
