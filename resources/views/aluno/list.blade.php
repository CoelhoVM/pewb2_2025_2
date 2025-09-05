@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')

    <h2 class="mt-5 mb-5">Listagem de Alunos</h2>

    <div class="row">

        <div class="col">

            <form action="{{ route('aluno.search') }}" method="post">

                @csrf
                <div class="row">

                    <div class="col">
                        <label class="form-label" for=""><strong>Tipo</strong></label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="cpf">CPF</option>
                            <option value="telefone">Telefone</option>
                        </select>
                    </div>

                    <div class="col">
                        <label class="form-label" for=""><strong>Valor</strong></label>
                        <input class="form-control" type="text" name="valor">
                    </div>

                    <div class="col d-flex align-items-end">

                        <div class="me-4">
                            <button type="submit" class="btn btn-success"
                                href="{{ url('/aluno/search') }}">Pesquisar</button>
                        </div>

                        <div>
                            <a class="btn btn-secondary" href="{{ url('/aluno/create') }}">Novo</a>
                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="row">

        <table class="table mt-5">
            <thead>
                <tr>
                    <td><strong>#ID</strong></td>
                    <td><strong>Nome</strong></td>
                    <td><strong>CPF</strong></td>
                    <td><strong>telefone</strong></td>
                    <td><strong>Ação</strong></td>
                    <td><strong>Ação</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->cpf }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>
                            <a href="{{ route('aluno.edit', $item->id) }}" class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square" style="color: #ffffff;"></i> </a>
                        </td>
                        <td>
                            <form action="{{ route('aluno.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Deseja excluir o registro?')"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@stop
