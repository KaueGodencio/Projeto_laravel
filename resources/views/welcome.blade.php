@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')


<h1>teste</h1>
<img width="100%" src="/img/banner.jpg" alt="">
@if(10>11)
<p>a condição é true </p>
@endif
<p>Meu nome é {{$nome}} tenho {{$idade2}} anos e sou {{$profissao}} e tenho {{$idade2}} </p>


@endsection