<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
    	<h1>Adicionar Conta</h1>
        <form method="post">
        	@csrf
        	Agencia: <input type="text" name="agencia" /> <br>
        	Banco: <input type="text" name="banco" /> <br>
        	Codigo do Banco: <input type="text" name="codigo_banco" /> <br>
        	Tipo de Conta: <input type="text" name="tipo_conta" /> <br>
        	Numero da Conta:<input type="text" name="numero_conta" /><br>
        	<label for="ativa">Ativa</label>
        	<select name="ativa" id="Ativa">
		  <option value="TRUE">Sim</option>
		  <option value="FALSE">Nao</option>
		</select> <br>
		<label for="beneficiario_id">Beneficiario</label>
        	<select name="beneficiario_id" id="beneficiario_id">
			  @foreach($beneficiarios as $beneficiario)
			  	<option value={{$beneficiario->id}}>{{$beneficiario->id}}</option><>
			  @endforeach
		</select><br>
        	<input type="submit" value="cadastrar"/>
        </form>
    </body>
</html>
