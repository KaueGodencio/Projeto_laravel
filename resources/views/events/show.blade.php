@extends('layouts.main')

@section('title', $event->title)



@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="imag-container" class="col-md-6">
            <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{$event->title}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p class="event-city">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt"
                    viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>{{$event->city}}
            <p class="events-participants"> X Participante</p>
            <p class="event-owener"> dono do evento</p>
            <a href="" class="btn btn-primary" id="event-submit"> Confirmar Presença</a>
            <h4>O evento conta com:</h4>
            <div id="items">
                @foreach ($event->items as $item)

                    <p class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-check2-circle mr-2" viewBox="0 0 16 16">
                            <path
                                d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                            <path
                                d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                        </svg>
                        <span>{{$item}}</span>

                    </p>

                @endforeach

            </div>

           
        </div>
        <div class="col-md-12">
            <h3>Sobre o evento:</h3>
            <p class="event-description"> {{$event->description}}</p>

        </div>



    </div>

</div>


@endsection