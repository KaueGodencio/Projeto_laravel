@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')


<div id="search-container" class="col-md-12 d-flex justify-content-center">
    <h1 class="mt-3 text-primary">Busque um evento </h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control " placeholder="Procurar">
    </form>
</div>

<div class="container border">
    <div id="events-container" class="col-md-12 ">
        <h2>Proximos eventos</h2>
        <p>Veja os eventos dos proximos dias </p>
        <div id="card-container" class="row ">
            @foreach($events as $event)
                <div class=" col-md-4 col-lg-3  ">
                    <div class="card border mb-2">
                        <img src="/img/events/{{$event->image}}" width="100%" alt="{{$event->title}}">
                        <div class="card-body">
                        <p class="card-date">{{ $event->date->format('d/m/Y') }}</p>
                            <h5 class="card-title">{{$event->title}}</h5>
                            <p class="card-participants"> X Participante</p>
                            <a href="/events/{{$event->id}}" class="btn btn-primary"> Saber Mais</a>

                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($events) == 0)
                <div class="alert alert-primary col-12" role="alert">
                    <p>Não há eventos disponiveis. <span><a href="/events/create">Criar Eventos</a></span></p>
                </div>
           

            @endif
        </div>
    </div>
</div>
@endsection