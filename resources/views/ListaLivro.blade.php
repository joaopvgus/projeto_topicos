<!DOCTYPE html>
<html lang="en">
@include('Header')
<body>
<div class="container">
    <div class="row ">
        @if(session('sucesso'))
            <div class="row">
                <div class="col-md-12" style="margin-top: 5px;">
                    <div class="alert alert-success">
                        <p>{{session('sucesso')}}</p>
                    </div>
                </div>
            </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">titulo</th>
                <th scope="col">descricao</th>
                <th scope="col">paginas</th>
                <th scope="col">editora</th>
                <th scope="col">ano</th>
                <th scope="col">isbn</th>
                <th scope="col">Deletar</th>
                <th scope="col">Alterar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($livros as $livro)
                <tr>

                    <td>{{$livro->titulo}}</td>
                    <td>{{$livro->descricao}}</td>
                    <td>{{$livro->paginas}}</td>
                    <td>{{$livro->editora}}</td>
                    <td>{{$livro->ano}}</td>
                    <td>{{$livro->isbn}}</td>
                    <td><a class="btn" type='button' href="{{route('deletarLivro',['id' => $livro->id])}}">Deletar</a></td>

                    <td><a class="btn" type='button' href="{{route('updateLivro',['id' => $livro->id])}}">Alterar</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>


    </div>
</div>
</body>
</html>
