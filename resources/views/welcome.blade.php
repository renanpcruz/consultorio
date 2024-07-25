@extends ('layouts.main')

@section('title', 'Home')

@section('content')

<div class="container">
    <h1>Seja bem vindo!</h1>
</div>

<div class="container-md">
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar por um paciente...">
    </form>
</div>

<div id="pacientes-container" class="col-md-12">
    @if ($search)
        <h2>Buscando por: {{$search}}</h2>
    @else
        <h2>Últimos pacientes adicionados:</h2>
    @endif

    <div id="cards-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$event->nome}}</h5>
                    <p class="card-date"><ion-icon name="calendar-outline"></ion-icon>
                        {{date('d/m/Y', strtotime($event->idade))}}</p>
                    <p class="card-sexo"><ion-icon name="male-female-outline"></ion-icon> {{$event->sexo}}</p>

                    <a href="/pacientes/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum paciente com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Nenhum paciente foi cadastrado.</p>
        @endif
    </div>


</div>



@endsection