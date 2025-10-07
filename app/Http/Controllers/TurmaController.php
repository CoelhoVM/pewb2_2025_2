<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\CategoriaAluno;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $dados = Turma::All();

        return view('turma.list', ['dados' => $dados]);
    }


    public function create()
    {
        $cursos = Curso::orderBy('nome')->get();

        return view('turma.form', ['cursos' => $cursos]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate(
            [
                'curso_id' => 'required|exists:cursos,id',
                'nome' => 'required|max:150',
                'codigo' => 'required|max:20',
                'data_inicio' => 'nullable|date',
                'data_fim' => 'nullable|date|after:data_inicio',
            ],
            [
                'curso_id.required' => 'O curso é obrigatório',
                'nome.required' => 'O nome é obrigatório',
                'codigo.required' => 'O código é obrigatório',
                'data_inicio.date' => 'A data de início deve ser uma data válida',
                'data_fim.date' => 'A data de fim deve ser uma data válida',
                'data_fim.after' => 'A data de fim deve ser uma data posterior à data de início',
                'codigo.max' => 'O código deve ter no máximo 20 caracteres',
                'nome.max' => 'O nome deve ter no máximo 150 caracteres',
            ]
        );
    }

    public function store(Request $request)
    {

        $this->validateRequest($request);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $diretorio = 'imgem/turma/';

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Aluno::create($request->all());

        return redirect('turma');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {

            $dados = Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Aluno::All();
        }

        return view('turma.list', ['dados' => $dados]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $dado = Aluno::findOrFail($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();
        return view('turma.form', ['dado' => $dado, 'categorias' => $categorias]);
    }

    public function update(Request $request, string $id)
    {
        $this->validateRequest($request);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $diretorio = 'imgem/turma/';

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Aluno::updateOrCreate(['id' => $id], $data);

        return redirect('turma');
    }

    public function destroy(string $id)
    {
        $dado = Aluno::findOrFail($id);
        $dado->delete();

        return redirect('turma');
    }
}
