<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Emprestimo;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function criar()
    {
        return view('CadastroLivro');
    }

    public function salvar(Request $request)
    {
        $livro = new Livro();

        // $validated = $request->validate([
        //     'titulo' => ['required', 'string', 'max:255'],
        //     'descricao' => ['required', 'string', 'max:11'],
        //     'editora' => ['required', 'string', 'min:11', 'max:11'],
        //     'paginas' => ['required', 'string', 'max:255']
        // ]);


        $livro->titulo = $request->titulo;
        $livro->descricao = $request->descricao;
        $livro->paginas = $request->paginas;
        $livro->editora = $request->editora;
        $livro->ano = $request->ano;
        $livro->isbn = $request->isbn;
        $livro->save();
        return redirect(route('Home'))->with(['sucesso' => "Criado " . $livro->titulo . " com sucesso"]);
    }

    public function listar()
    {

        $emps = Emprestimo::all()->pluck('idLivro');
        $livros = Livro::whereNotIn('id',$emps)->get();
        return view('ListaLivro')->with(['livros' => $livros]);
    }

    public function deletar($id)
    {
        $livro = Livro::find($id);
        $livro->delete();
        return redirect()->back()->with(['sucesso' => "Deletou"]);;
    }

    public function update($id)
    {
        $livro = Livro::find($id);
        return view('LivroAlterar')->with(['livro' => $livro]);
    }

    public function alterar(Request $request)
    {
        $livro = Livro::find($request->id);
        $livro->titulo = $request->titulo;
        $livro->descricao = $request->descricao;
        $livro->paginas = $request->paginas;
        $livro->editora = $request->editora;
        $livro->ano = $request->ano;
        $livro->isbn = $request->isbn;
        $livro->update();
        return redirect(route('listarLivro'))->with(['sucesso' => "Criado " . $livro->titulo . " com sucesso"]);
    }
}
