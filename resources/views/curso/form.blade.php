@extends('base')
@section('titulo', 'Formulário Curso')
@section('conteudo')

    <h2 class="mt-5 mb-5">Formulário - Cadastro de Cursos</h2>

    @php
        if (!empty($dado->id)) {
            $action = route('curso.update', $dado->id);
        } else {
            $action = route('curso.store');
        }
    @endphp

    <form action="{{ $action }}" method="post" enctype="multipart/form-data">

        @csrf

        @if (!empty($dado->id))
            @method('PUT')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        <div class="row">

            <div class="col">
                <label class="mb-3" for=""><strong>Nome</strong></label>
                <input class="form-control" type="text" name="nome" value="{{ old('id', $dado->nome ?? '') }}">
            </div>

            <div class="col">
                <label class="mb-3" for=""><strong>Requisito</strong></label>
                <input class="form-control" type="text" name="requisito" value="{{ old('id', $dado->requisito ?? '') }}">
            </div>

            <div class="col">
                <label class="mb-3" for=""><strong>Carga Horária</strong></label>
                <input class="form-control" type="text" name="carga_horaria" value="{{ old('id', $dado->carga_horaria ?? '') }}">
            </div>

            <div class="col">
                <label class="mb-3" for=""><strong>Valor</strong></label>
                <input class="form-control" type="text" name="valor" value="{{ old('id', $dado->valor ?? '') }}">
            </div>

        </div>

        <div class="row">

            <div class="col mt-5">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a class="btn btn-secondary" href="{{ url('curso') }}">Voltar</a>
            </div>

        </div>

    </form>
@stop
