<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Cadastrar Programa</h1>
    <form method="post" action="{{route('createPrograma')}}">
        @csrf
        Descrição: <input type="text" name="descricao"><br>
        Valor do Benefício: <input type="text" name="valor_beneficio"><br>
        <input type="submit" value="Cadastrar">
    </form>

    <h1>Lista Programas</h1>
    <table>
        <thead>
            <tr>
               <th>Descrição</th>
               <th>Valor do Benefício</th>
               <th></th>
               <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($programas as $p)
                <tr >
                    <td>{{$p->descricao}}</td>
                    <td>{{$p->valor_beneficio}}</td>
                    <td><a>Atualizar</a></td>
                    <td><a href="/programa/delete/{{$p->id}}">Deletar</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
