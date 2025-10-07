@extends('base')
@section('titulo', 'Formulário Turma')
@section('conteudo')

    <h2 class="mt-5 mb-5">Formulário - Cadastro de Turmas</h2>

    @php
        if (!empty($dado->id)) {
            $action = route('turma.update', $dado->id);
        } else {
            $action = route('turma.store');
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

                <label class="mb-3" for=""><strong>Curso</strong></label>
                <select class="form-select" name="curso_id">

                    <option value="">Selecione</option>

                    @foreach ($cursos as $item)
                        <option value="{{ $item->id }}"
                            {{ old('curso_id', $item->curso_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col">
                <label class="mb-3" for=""><strong>Nome</strong></label>
                <input class="form-control" type="text" name="nome" value="{{ old('id', $dado->nome ?? '') }}">
            </div>

            <div class="col">
                <label class="mb-3" for=""><strong>Código</strong></label>
                <input class="form-control" type="text" name="codigo" value="{{ old('id', $dado->codigo ?? '') }}">
            </div>

            <div class="col">
                <label class="mb-3" for=""><strong>Data inicio</strong></label>
                <input class="form-control" type="text" name="data_inicio" value="{{ old('id', $dado->data_inicio ?? '') }}">
            </div>

            <div class="col">
                <label class="mb-3" for=""><strong>Data fim</strong></label>
                <input class="form-control" type="text" name="data_fim" value="{{ old('id', $dado->data_fim ?? '') }}">
            </div>

        </div>

        <div class="row">

            <div class="col mt-5">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a class="btn btn-secondary" href="{{ url('turma') }}">Voltar</a>
            </div>

        </div>

    </form>
@stop
