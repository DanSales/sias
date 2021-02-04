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
<h1>Cadastrar Anexo</h1>

<form method="post" action="{{route('createAnexo', ['id' => $programa->id])}}" enctype="multipart/form-data">
    @csrf

    <input type="file" name="caminho_arquivo" id="arquivo" @error('caminho_arquivo') is-invalid @enderror" value ="{{ old('caminho_arquivo')}}" required autofocus>
    @error('caminho_arquivo')
    <span class="invalid-feedback" role="alert">
        		<strong>{{$message}}</strong><br>
        	</span>
    @enderror
    <input type="hidden" value="{{$programa->id}}" name="programa_id">
    <input type="submit" value="Cadastrar">
</form>

<h1>Lista Anexos</h1>
<table>
    <thead>
    <tr>
        <th>Caminho do arquivo</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($anexos as $a)
        <tr >
            <td>{{$a->caminho_arquivo}}</td>
            <td><a href="{{route('deleteAnexo',['id'=>$programa->id, 'idAnexo' => $a->id])}}">Deletar</a></td>
        </tr>
    @endforeach

    </tbody>
</table>


</body>
</html>
