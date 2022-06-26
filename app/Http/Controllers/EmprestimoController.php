<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Cliente;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $dataIni =  Carbon::today('America/Recife');
        $emprestimo->dataInicio = $dataIni->toDateString();

        $dtf = $dataIni->addDays($request->dataFinal);
        $emprestimo->dataFinal = $dtf->toDateString();
        $emprestimo->save();
        return redirect(route('Home'))->with(['sucesso' => "Livro " . $emprestimo->tituloLivro . " emprestado com sucesso"]);
    }

    public function getClientesELivros()
    {
        $emps = Emprestimo::all()->pluck('idLivro');
        $livros = Livro::whereNotIn('id',$emps)->get();
        $clientes = Cliente::all();

        if($clientes->first() == null){
            return redirect(route('Home'))->with(['sucesso' => "Não existe nenhum cliente para realizar o emprestimo"]);;
        }
        else if($livros->first() == null){
            return redirect(route('Home'))->with(['sucesso' => "Não existe nenhum livro para realizar o emprestimo"]);;
        }else {
            return view('CadastroEmprestimo')->with(['clientes' => $clientes, 'livros' => $livros]);
        }
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
