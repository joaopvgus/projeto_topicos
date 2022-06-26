<!DOCTYPE html>
<html lang="en">
@include('Header')

<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-6 mx-auto">
                <form method="post" action="{{route('salvarEmprestimo')}}">
                    @csrf

                    <div class="form-group">
                        <label class="my-1 mr-2" for="tituloLivro">Título do livro</label>
                        <select class="form-control" id="tituloLivro">
                            <option selected>Choose...</option>
                            @foreach($livros as $livro)
                                <option>{{$livro->titulo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="my-1 mr-2" for="nomeCliente">Nome do cliente</label>
                        <select class="form-control" id="nomeCliente">
                            <option selected>Choose...</option>
                            @foreach($clientes as $cliente)
                                <option>{{$cliente->nome}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dataFinal">Dias de emprestimo</label>
                        <input type="number" value="15" min="1" max="60" step="1" id="dataFinal" name="dataFinal"/>
                    </div>

                    <input value="{{$livro->id}}" name="idLivro" hidden>
                    <input value="{{$cliente->id}}" name="idCliente" hidden>
                    <input value="{{$livro->titulo}}" name="tituloLivro" hidden>
                    <input value="{{$cliente->nome}}" name="nomeCliente" hidden>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
