@extends('layouts.main')

@section('title', 'Produto')

@section('content')



@if ($id != null)
    <p>Exibindo produto de id: {{ $id }} </p>
@endif




@endsection