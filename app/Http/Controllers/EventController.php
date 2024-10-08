<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;


class EventController extends Controller
{
    public function index() {
       
        $search = request('search');
    
        if ($search) {
            // Busca os eventos que correspondem ao título
            $events = Event::where('title',  'like', '%' . $search . '%')->get();
        } else {
            // Caso não haja busca, obtém todos os eventos
            $events = Event::all();
        }
    
        // Retorna a view 'welcome' com os eventos e o termo de busca
        return view('welcome', ['events' => $events, 'search' => $search]);
    }


    public function create() {
        return view('events.create');

    }


    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'title' => 'required|string',
            'city' => 'required|string',
            'private' => 'required|boolean',
            'description' => 'required|string',
            /* 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', */
        ]);
    
        // Criação do evento
        $event = new Event();
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->city = $request->input('city');
        $event->private = $request->input('private');
        $event->description = $request->input('description');
        $event->image= $request->input('image');
        $event->items = $request->input('items');
    
        // Upload de imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . '.' . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        } else {
            $event->image = null; // Defina a imagem como nula se não houver upload
        } 

        $user =auth()->user();
        $event->user_id = $user->id;

    
        // Salvar o evento
        $event->save();
    
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }


    public function show($id){
        $event = Event::findOrFail($id);    

        $eventOwner = User::where('id','=', $event->user_id)->first()->toArray();

        return view ('events.show' , ['event' => $event, 'eventOwner'=>$eventOwner ]);
        
    }

    public function dashboard()
{
    $user = auth()->user();

    // Eventos criados pelo usuário
    $events = $user->events;

    // Eventos que o usuário está participando
    $eventsAsParticipant = $user->eventsAsParticipant;

    return view('events.dashboard', [
        'events' => $events,
        'eventsAsParticipant' => $eventsAsParticipant
    ]);
}

    public function destroy($id){
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg','Evento exluido com sucesso!');

    }

    public function edit($id) {

        $user = auth()->user();

        $event = Event::findOrFail($id);

        
        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }


        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request) {

        $data = $request->all();     
                
        Event::findOrFail($request->id)->update($request->all());
        return redirect('/dashboard')->with('msg','Evento editado com sucesso!');

    }




public function joinEvent($id)
{
    $user = auth()->user(); // Obtém o usuário autenticado
    $event = Event::findOrFail($id); // Encontra o evento

    // Verifica se o usuário já está participando do evento
    if (!$event->users->contains($user->id)) {
        // Associa o usuário ao evento
        $event->users()->attach($user->id);
    }

    // Redireciona para a dashboard após a confirmação da presença
    return redirect('/dashboard')->with('message', 'Sua presença foi confirmada no evento');
} 


    


  
}