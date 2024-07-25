@extends ('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Pacientes:</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scope="row">{{$event->id}}</td>
                        <td><a href="/pacientes/{{$event->id}}">{{$event->nome}}</a></td>
                        <td>{{$event->sexo}}</td>
                        <td>{{$event->idade}} anos</td>
                        <td class="action-buttons">
                            <a href="/pacientes/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon
                                    name="create-outline"></ion-icon> Editar</a>
                            <form action="/pacientes/{{$event->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon
                                        name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Não há pacientes registrados!</h3>
    @endif
</div>

@endsection
