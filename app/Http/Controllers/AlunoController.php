<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\CategoriaAluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $dados = Aluno::All();

        return view('aluno.list', ['dados' => $dados]);
    }


    public function create()
    {
        $categorias = CategoriaAluno::orderBy('nome')->get();

        return view('aluno.form', ['categorias' => $categorias]);
    }

    private function validateRequest(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required',
                'cpf' => 'required',
                'categoria_id' => 'required',
                'imagem' => 'nullable|mimes:jpeg,png,jpg',
            ],
            [
                'nome.required' => 'O campo Nome é obrigatório',
                'cpf.required' => 'O campo CPF é obrigatório',
                'categoria_id.required' => 'O campo categoria é obrigatório',
                'imagem.mimes' => 'O arquivo deve ser uma imagem do tipo: jpeg, png, jpg',
                'imagem.image' => 'O arquivo deve ser enviado',

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
            $diretorio = 'imgem/aluno/';

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Aluno::create($request->all());

        return redirect('aluno');
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

        return view('aluno.list', ['dados' => $dados]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $dado = Aluno::findOrFail($id);
        $categorias = CategoriaAluno::orderBy('nome')->get();
        return view('aluno.form', ['dado' => $dado, 'categorias' => $categorias]);
    }

    public function update(Request $request, string $id)
    {
        $this->validateRequest($request);
        $data = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();
            $diretorio = 'imgem/aluno/';

            $imagem->storeAs($diretorio, $nome_imagem, 'public');

            $data['imagem'] = $diretorio . $nome_imagem;
        }

        Aluno::updateOrCreate(['id' => $id], $data);

        return redirect('aluno');
    }

    public function destroy(string $id)
    {
        $dado = Aluno::findOrFail($id);
        $dado->delete();

        return redirect('aluno');
    }
}
