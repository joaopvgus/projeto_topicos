<!DOCTYPE html>
<html lang="en">
@include('Header')
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-6 mx-auto">
            <form method="post" action="{{route('salvarLivro')}}">
                @csrf
                <div class="form-group">
                    <label for="titulo">titulo</label>
                    <input type="text" class="form-control" id="titulo" placeholder="titulo" name="titulo">
                    @error('titulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descricao">descricao</label>
                    <input type="text" class="form-control descricao" id="descricao" placeholder="descricao" name="descricao"  >
                    @error('descricao')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="paginas">paginas</label>
                    <input type="text" class="form-control" id="paginas" placeholder="paginas" name="paginas">
                    @error('paginas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="editora">editora</label>
                    <input type="text" class="form-control" id="editora" placeholder="editora" name="editora"  >
                    @error('editora')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ano">ano</label>
                    <input type="text" class="form-control" id="ano" placeholder="ano" name="ano"  >
                    @error('ano')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isbn">isbn</label>
                    <input type="text" class="form-control" id="isbn" placeholder="isbn" name="isbn"  >
                    @error('isbn')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
</body>

</html>
