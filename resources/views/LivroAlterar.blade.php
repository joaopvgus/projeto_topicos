<!DOCTYPE html>
<html lang="en">
@include('Header')
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-6 mx-auto">
            <form method="post" action="{{route('alterarLivro')}}">
                @csrf
                <div class="form-group">
                    <label for="titulo">titulo</label>
                    <input type="text" class="form-control" id="titulo" placeholder="titulo" name="titulo" value="{{$livro->titulo}}">
                </div>
                <div class="form-group">
                    <label for="descricao">Descricao</label>
                    <input type="text" class="form-control" id="descricao" placeholder="descricao" name="descricao" value="{{$livro->telefone}}">
                </div>
                <div class="form-group">
                    <label for="paginas">paginas</label>
                    <input type="text" class="form-control" id="paginas" placeholder="paginas" name="paginas" value="{{$livro->paginas}}">
                </div>
                <div class="form-group">
                    <label for="editora">editora</label>
                    <input type="text" class="form-control" id="editora" placeholder="editora" name="editora" value="{{$livro->editora}}">
                </div>
                <div class="form-group">
                    <label for="ano">ano</label>
                    <input type="text" class="form-control" id="ano" placeholder="ano" name="ano" value="{{$livro->ano}}">
                </div>
                <div class="form-group">
                    <label for="isbn">isbn</label>
                    <input type="text" class="form-control" id="isbn" placeholder="isbn" name="isbn" value="{{$livro->isbn}}">
                </div>
                <input value="{{$livro->id}}" name="id" hidden>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
