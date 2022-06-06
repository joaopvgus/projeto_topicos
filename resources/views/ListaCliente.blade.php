<!DOCTYPE html>
<html lang="en">
@include('Header')
<body>
<div class="container">
    <div class="row ">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">CPF</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereco</th>
                <th scope="col">Deletar</th>
                <th scope="col">Alterar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>

                    <td>{{$cliente->cpf}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->telefone}}</td>
                    <td>{{$cliente->endereco}}</td>
                    <td><a class="btn" type='button' href="{{route('deletar',['id' => $cliente->id])}}">Deletar</a></td>
                    <td><a class="btn" type='button' href="{{route('update',['id' => $cliente->id])}}">Alterar</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>


    </div>
</div>
</body>
</html>
