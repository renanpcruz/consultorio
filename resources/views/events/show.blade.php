@extends ('layouts.main')

@section('title', $event->nome)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{$event->image}}" class="img-fluid border border-primary">
        </div>
        <div id="info-container" class="col-md-6">
            <h3>Nome do paciente: {{$event->nome}}</h3>
            <p class="paciente-idade"><ion-icon name="calendar-outline"></ion-icon> {{$event->idade}}</p>
            <p class="paciente-sexo"><ion-icon name="male-female-outline"></ion-icon> {{$event->sexo}}</p>
            <p class="paciente-telefone"><ion-icon name="call-outline"></ion-icon> {{$event->telefone}}</p>
        </div>
    </div>
</div>

@endsection