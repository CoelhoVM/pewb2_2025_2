
@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')

    <h2 class="mt-5 mb-5">Formulário - Cadastro de Alunos</h2>

    <form action="{{ route('aluno.store') }}" method="post">

        @csrf

        <div class="row">

            <div class="col">
                <label class="mb-3" for=""><strong>Nome</strong></label>
                <input class="form-control" type="text" name="nome">
            </div>

            <div class="col">
                <label  class="mb-3" for=""><strong>CPF</strong></label>
                <input class="form-control" type="text" name="cpf">
            </div>

            <div class="col">
                <label  class="mb-3" for=""><strong>Telefone</strong></label>
                <input class="form-control" type="text" name="telefone">
            </div>

        </div>

        <div class="row">

            <div class="col mt-5">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a class="btn btn-secondary" href="{{ url('aluno') }}">Voltar</a>
            </div>

        </div>

    </form>
@stop
