<!DOCTYPE html>
<html lang="en">
@include('Header')
<body>
<div class="container">
    <div class="row ">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">emprestimo</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data de emprestimo</th>
                <th scope="col">Data de devolução</th>
                <th scope="col">Devolver</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emprestimos as $emprestimo)
                <tr>

                    <td>{{$emprestimo->tituloLivro}}</td>
                    <td>{{$emprestimo->nomeCliente}}</td>
                    <td>{{$emprestimo->dataInicio}}</td>
                    <td>{{$emprestimo->dataFinal}}</td>
                    <td><a class="btn" type='button' href="{{route('finalizarEmprestimo',['id' => $emprestimo->id])}}">Devolver</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>


    </div>
</div>
</body>
</html>
