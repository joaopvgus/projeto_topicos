<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Cliente;
use App\Models\Livro;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function criar()
    {
        return view('CadastroEmprestimo');
    }

    public function salvar(Request $request)
    {
        $emprestimo = new Emprestimo();

        $emprestimo->idLivro = $request->idLivro;
        $emprestimo->tituloLivro = $request->tituloLivro;
        $emprestimo->idCliente = $request->idCliente;
        $emprestimo->nomeCliente = $request->nomeCliente;
        $emprestimo->dataInicio = $request->dataInicio;
        $emprestimo->dataFinal = $request->dataFinal;
        $emprestimo->save();
        return redirect(route('Home'))->with(['sucesso' => "Livro " . $emprestimo->tituloLivro . " emprestado com sucesso"]);
    }

    public function getClientesELivros()
    {
        $livros = Livro::all();
        $clientes = Cliente::all();
        return view('CadastroEmprestimo')->with(['clientes' => $clientes , 'livros' => $livros]);
    }

    public function listar()
    {
        $emprestimos = Emprestimo::all();
        return view('ListaEmprestimo')->with(['emprestimos' => $emprestimos]);
    }

    public function deletar($id)
    {
        $emprestimo = emprestimo::find($id);
        $emprestimo->delete();
        return redirect()->back()->with(['sucesso' => "Deletou"]);;
    }

    public function update($id)
    {
        $emprestimo = emprestimo::find($id);
        return view('emprestimoAlterar')->with(['emprestimo' => $emprestimo]);
    }

    public function alterar(Request $request)
    {
        $emprestimo = emprestimo::find($request->id);
        $emprestimo->dataFinal = $request->dataFinal;
        $emprestimo->update();
        return redirect(route('listaremprestimo'))->with(['sucesso' => "Data de entrega atualizada com sucesso"]);
    }

    public function finalizar($id)
    {
        $emprestimo = emprestimo::find($id);
        $emprestimo->delete();
        return redirect()->back()->with(['sucesso' => "Finalizou"]);;
    }
}
