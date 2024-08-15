@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')


<div id="search-container" class="col-md-12 d-flex justify-content-center">
 
        <h2 class="text-primary">Buscar evento</h2>
   

    <div class="row ">
        <form action="/" method="GET" class="d-flex col-12 col-md-6">
            <input type="text" id="search" name="search" class="form-control mr-2 " placeholder="Procurar">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>

    </div>
</div>

<div class="container border">
    <div id="events-container" class="col-md-12 ">
        @if ($search)
            
            <div class="alert alert-primary mt-2 col-12" role="alert" id="alerta-danger">
            <p class="mb-0">Busca realizada por: <b>{{$search}}</b></p>
            </div>
        @else 
            <h1 class="mt-3 ">Proximos Evento</h1>
            <p>Veja os eventos dos proximos dias </p>
        @endif
        
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
            @if (count($events) == 0 && $search)
                <div class="alert alert-danger col-12" role="alert" id="alerta-danger">
                    <p class="mb-0">Não encontramos nenhum evento correspondente a "<b>{{$search}}</b>." Tente usar outros termos de busca ou clique em . <a href="/">Ver Eventos</a></p>
                </div>
            @elseif(count($events)==0)
            <div class="alert alert-primary col-12" role="alert">
                    <p class="mb-0">Não há eventos disponiveis. <span><a href="/events/create">Criar Eventos</a></span></p>
                </div>


            @endif
        </div>
    </div>
</div>
@endsection