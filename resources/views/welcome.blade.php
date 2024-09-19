@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')






<div id="search-container" class="col-md-12 d-flex justify-content-center">
    <h2 class="text-primary">Buscar evento</h2>
    <div class="row d-flex justify-content-center">
        <form action="/" method="GET" class="d-flex col-12 col-md-6 col-lg-4 ">
            <input type="text" id="search" name="search" class="form-control  " placeholder="Procurar">
            <button type="submit" class="btn btn-search text-primary "><svg xmlns="http://www.w3.org/2000/svg" width="20"
                    height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg></button>
        </form>

        @if ($search)
            <div class="col-12 my-3">
                <p class="mb-0 text-white ">Busca realizada por: <b>{{$search}}</b></p>
            </div>
        @endif
        @if (count($events) == 0 && $search)
            <div class="row d-flex justify-content-center ">
                <div class="alert alert-danger col-12 col-md-8 " role="alert" id="alerta-danger">
                    <p class="mb-0">Não encontramos nenhum evento correspondente a "<b>{{$search}}</b>." Tente usar outros
                        termos de busca ou clique em . <a href="/">Ver Eventos</a></p>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="container border">

    <div id="events-container" class="col-md-12 ">
        @if ($search)


        @else
            <h1 class="mt-3 ">Proximos Evento</h1>
            <p>Veja os eventos dos proximos dias </p>
        @endif

        @if(count($events) == 0)
            <div class="alert alert-primary col-12 my-3" role="alert">
                <p class="mb-0">Não há eventos disponiveis. <span><a href="/events/create">Criar Eventos</a></span></p>
            </div>
        @endif

        <div id="card-container" class="row ">
            @foreach($events as $event)
                <div class="col-12 col-md-6 col-lg-3  ">
                    <div class="card-person card card_event border mb-2">

                        <img src="/img/events/{{$event->image}}" width="100%" height="180px" alt="{{$event->title}}">
                        <div class="card-body">
                            <p class="card-date">{{ $event->date->format('d/m/Y') }}</p>
                            <h5 class="card-title">{{$event->title}}</h5>
                            <p class="card-participants"> X Participante</p>
                            <a href="/events/{{$event->id}}" class="btn btn-primary"> Saber Mais</a>

                        </div>
                    </div>
                </div>
            @endforeach




        </div>
    </div>
</div>
@endsection