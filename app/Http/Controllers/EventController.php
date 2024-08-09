<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
      
        return view('welcome', ['events'=>$events]);
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
    
        // Salvar o evento
        $event->save();
    
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }


    public function show($id){
        $event = Event::findOrFail($id);    

        return view ('events.show' , ['event' => $event]);
        
    }

  
}
