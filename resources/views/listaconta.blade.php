<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <ul>
        	@foreach($contas as $conta)
        		<li>{{$conta->banco}}<a href="/remover/contas/{{$conta->id}}">Remover Conta</a></li>
        	@endforeach
        </ul>
    </body>
</html>
