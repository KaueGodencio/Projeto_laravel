@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="col-md-12 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>

    <div class="col-md-12 p-0 dashboard-events-container">
        @if(count($events) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td scope="row">{{$loop->index + 1}}</td>
                            <td><a href="events/{{$event->id}}">{{$event->title}}</a></td>
                            <td>{{count($event->users)}}</td>
                            <td class="d-flex">
                                <a href="/events/edit/{{$event->id}}" class="text-primary edit-btn mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </a>
                                <form action="/events/{{$event->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger delete-btn border-0 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                            class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Voce não possui eventos cadastrados <a href="/events/create"> Criar evento</a></p>
        @endif
    </div>

    <div class="col-md-12 dashboard-title-container">
        <h1>Eventos que estou participando</h1>
    </div>

    <div class="col-md-12 dashboard-events-container">
        @if(session('message'))
            <div class="alert alert-success w-100">
                {{ session('message') }}
            </div>
        @endif

        @if(count($eventsAsParticipant) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventsAsParticipant as $event)
                        <tr>
                            <td scope="row">{{$loop->index + 1}}</td>
                            <td><a href="events/{{$event->id}}">{{$event->title}}</a></td>
                            <td>{{count($event->users)}}</td>
                            <td>
                                <form action="/events/leave/{{$event->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="subimit" class="btn btn-danger delete-btn ">
                                        Sair do evento
                                    </button>



                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos os eventos</a></p>
        @endif
    </div>
</div>

@endsection
