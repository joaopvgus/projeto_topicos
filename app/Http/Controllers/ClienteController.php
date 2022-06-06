<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function criar(){
        return view('CadastroCliente');
    }

    public function salvar(Request $request){
        $cliente = new Cliente();
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
        $cliente->delete();
        return redirect()->back()->with(['sucesso' => "Deletou"]);;
    }

    public function update($id){
        $cliente = cliente::find($id);
        return view('ClienteAlterar')->with(['cliente' => $cliente]);
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
