@extends ('layouts.main')

@section('title', 'Cadastrar Paciente')

@section('content')

<div class="container-md mt-5">
    <h2 class="text-center">Formulário de Cadastro</h2>
    <form id="cadastroForm" action="/pacientes" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome completo:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
        </div>
        <div class="form-group">
            <label for="idade">Data de nascimento:</label>
            <input type="date" class="form-control" id="idade" name="idade">
        </div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <select class="form-control" name="sexo" id="sexo" required>
                <option value="" disabled selected>--</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
                <option value="Outro">Outro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" class="form-control" id="telefone">
        </div>
        <div class="form-group">
            <label for="image">Foto do paciente:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/png, image/jpeg, image/jpg" />
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

@endsection
