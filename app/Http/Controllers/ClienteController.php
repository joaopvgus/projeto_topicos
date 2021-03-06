<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Emprestimo;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function criar(){
        return view('CadastroCliente');
    }

    public function salvar(Request $request){
        $cliente = new Cliente();

        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['required', 'string', 'max:11'],
            'cpf' => ['required', 'string', 'min:11','max:11'],
            'endereco' => ['required', 'string', 'max:255']
        ]);


        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->cpf = $request->cpf;
        $cliente->save();
        return redirect(route('Home'))->with(['sucesso' => "Criado " .$cliente->nome ." com sucesso"]);
    }

    public function listar(){
        $clientes = Cliente::all();
        return view('ListaCliente')->with(['clientes' => $clientes]);
    }

    public function deletar($id){
        $cliente= Cliente::find($id);
        if(Emprestimo::where('idCliente',$id)->first() != null){
            return redirect()->back()->with(['sucesso' => "Este cliente possui emprestimos em andamento"]);;
        }else{
            $cliente->delete();
        }
        return redirect()->back()->with(['sucesso' => "Deletou"]);;
    }

    public function update($id){
        $cliente = cliente::find($id);
        if(Emprestimo::where('idCliente',$id)->first() != null){
            return redirect()->back()->with(['sucesso' => "Este cliente possui emprestimos em andamento"]);;
        }else {
            return view('ClienteAlterar')->with(['cliente' => $cliente]);
        }
    }

    public function alterar(Request $request){
        $cliente = Cliente::find($request->id);
        $cliente->nome = $request->nome;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->update();
        return redirect(route('listar'))->with(['sucesso' => "Criado " .$cliente->nome ." com sucesso"]);
    }


}
