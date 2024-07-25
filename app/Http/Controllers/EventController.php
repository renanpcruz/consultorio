<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Carbon\Carbon;


class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {

            $events = Paciente::where([
                ['nome', 'like', '%' . $search . '%']
            ])->get();

        } else {
            $events = Paciente::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Paciente;

        $event->nome = $request->nome;
        $event->idade = $request->idade;
        $event->sexo = $request->sexo;
        $event->telefone = $request->telefone;

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;

        } else {
            // Assign a default image if none is uploaded
            $event->image = 'default-image.jpg';
        }

        $event->save();

        return redirect('/')->with('msg', 'Paciente cadastrado com sucesso!');
    }

    public function show($id)
    {
        $event = Paciente::findOrFail($id);
        $event->idade = Carbon::parse($event->idade)->format('d/m/Y');
        $event->telefone = $this->maskPhone($event->telefone);


        return view('events.show', ['event' => $event]);
    }

    public function dashboard(){
        $events = Paciente::all();

        foreach ($events as $event) {
            $event->idade = Carbon::parse($event->idade)->age;
        }
        
        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id) {

        Paciente::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');

    }

    public function edit($id)
    {
        $event = Paciente::findOrFail($id);
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }

        Paciente::findOrFail($id)->update($data);

        return redirect('/dashboard')->with('msg', 'Paciente editado com sucesso!');
    }

    private function maskPhone($phone)
    {
        $phone = preg_replace('/\D/', '', $phone);
        if (strlen($phone) === 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $phone);
        } elseif (strlen($phone) === 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $phone);
        }
        return $phone;
    }

}
