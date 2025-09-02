<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
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
        return view('aluno.form');
    }


    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
        ],
        [
            'nome.required' => 'O campo nome é obrigatório',
            'cpf.required' => 'O campo CPF é obrigatório',
        ]);

        Aluno::create($request->all());

        return redirect('aluno');
    }

    public function search(Request $request)
    {
        if(!empty($request->valor)){

           $dados = Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        }else{
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
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $dado = Aluno::findOrFail($id);
        $dado->delete();

        return redirect('aluno');
    }
}
