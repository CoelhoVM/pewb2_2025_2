
@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')

    <h2 class="mt-5 mb-5">Formulário - Cadastro de Alunos</h2>

    @php
        if (!empty($dado->id)){
            $action = route('aluno.update', $dado->id);
        }else{
            $action = route('aluno.store');
        }
    @endphp

    <form action="{{ $action }}" method="post">

        @csrf

        @if(!empty($dado->id))
            @method('PUT')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '')}}">

        <div class="row">

            <div class="col">
                <label class="mb-3" for=""><strong>Nome</strong></label>
                <input class="form-control" type="text" name="nome"  value="{{ old('id', $dado->nome ?? '')}}">
            </div>

            <div class="col">
                <label  class="mb-3" for=""><strong>CPF</strong></label>
                <input class="form-control" type="text" name="cpf"  value="{{ old('id', $dado->cpf ?? '')}}">
            </div>

            <div class="col">
                <label  class="mb-3" for=""><strong>Telefone</strong></label>
                <input class="form-control" type="text" name="telefone"  value="{{ old('id', $dado->telefone ?? '')}}">
            </div>

        </div>

        <div class="row">

            <div class="col mt-5">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a class="btn btn-secondary" href="{{ url('aluno') }}">Voltar</a>
            </div>

        </div>

    </form>
@stop
