@extends ('layouts.main')

@section('title', 'Editando ' . $event->nome)

@section('content')

<div class="container-md mt-5">
    <h2 class="text-center">Editando Paciente</h2>
    <form id="cadastroForm" action="/events/update/{{$event->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome completo:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $event->nome }}" placeholder="Digite seu nome completo" required>
        </div>
        <div class="form-group">
            <label for="idade">Data de nascimento:</label>
            <input type="date" class="form-control" id="idade" name="idade" value="{{ $event->idade }}">
        </div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" name="sexo" id="sexo" required>
                <option value="" disabled>--</option>
                <option value="Masculino" {{ $event->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Feminino" {{ $event->sexo == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                <option value="Outro" {{ $event->sexo == 'Outro' ? 'selected' : '' }}>Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" class="form-control" id="telefone" value="{{ $event->telefone }}">
        </div>
        <div class="form-group">
            <label for="image">Foto do paciente:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg" />
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

@endsection
