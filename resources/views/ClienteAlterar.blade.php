<!DOCTYPE html>
<html lang="en">
@include('Header')
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-6 mx-auto">
            <form method="post" action="{{route('alterar')}}">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="nome">Telefone</label>
                    <input type="text" class="form-control" id="telefone" placeholder="telefone" name="telefone">
                </div>
                <div class="form-group">
                    <label for="nome">Endereco</label>
                    <input type="text" class="form-control" id="endereco" placeholder="endereco" name="endereco">
                </div>
                <input value="{{$cliente->id}}" name="id" hidden>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
