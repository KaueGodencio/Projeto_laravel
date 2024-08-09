@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3  p-3">
    <h1>Crie o seu evento</h1>

    <form action="/events" method="POST" enctype="multipart/form-data" class="border my-3 p-3 rounded">
        @csrf
        <div class="form-group d-flex flex-column">
            <label for="image"> Evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">

        </div>
        <div class="form-group">
            <label for="title" class="fw-bold"> Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">

        </div>
        <div class="form-group">
            <label for="title"> Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">

        </div>
        <div class="form-group">
            <label for="title"> O evento é privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>

        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control"
                placeholder="O que vai acontecer no evento"></textarea>

        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input class="form-check-input" name="items[]" type="checkbox" value="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input class="form-check-input" name="items[]" type="checkbox" value="Mesas">Mesas
            </div>
            <div class="form-group">
                <input class="form-check-input" name="items[]" type="checkbox" value="Palco">Palco
            </div>
            <div class="form-group">
                <input class="form-check-input" name="items[]" type="checkbox" value="Cafe">Café
            </div>
            <div class="form-group">
                <input class="form-check-input" name="items[]" type="checkbox" value="Agua">água
            </div>
            <div class="form-group">
                <input class="form-check-input" name="items[]" type="checkbox" value="Brindes">Brindes
            </div>



        </div>

        <input type="submit" class="btn btn-primary" value="Criar Evento">




    </form>

</div>

@endsection