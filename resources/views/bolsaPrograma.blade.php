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

<h1>Bolsas</h1>
<table>
    <thead>
    <tr>
        <th>Data de Pagamento</th>
        <th>Programa</th>
        <th>Banco</th>
        <th>Valor</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bolsas as $b)
        <tr >
            <td>{{$b->beneficiario}}</td>
            <td>{{$b->data_pagamento}}</td>
            <td>{{$b->banco}}</td>
            <td>{{$b->valor_beneficio}} </td>
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>
