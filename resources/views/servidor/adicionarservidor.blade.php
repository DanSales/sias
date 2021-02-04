<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
    	<h1>Adicionar Servidor</h1>
        <form method="post">
        	@csrf
        	Nome Completo: <input id = "nome_completo" type="text"class="form-control @error('nome_completo') is-invalid @enderror" name="nome_completo" value ="{{ old('nome_completo')}}" required autofocus/> <br>
        	@error('nome_completo')
        	<span class="invalid-feedback" role="alert">
        		<strong>{{$message}}</strong><br>
        	</span>
        	@enderror
        	CPF: <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value ="{{ old('cpf')}}" required autofocus/> <br>
        	@error('cpf')
        	<span class="invalid-feedback" role="alert">
        		<strong>{{$message}}</strong><br>
        	</span>
        	@enderror
        	Data de Nascimento: <input id="data_nascimento" type="text" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value ="{{ old('data_nascimento')}}" required autofocus/> <br>
        	@error('data_nascimento')
        	<span class="invalid-feedback" role="alert">
        		<strong>{{$message}}</strong><br>
        	</span>
        	@enderror
        	Endereco: <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value ="{{ old('endereco')}}" required autofocus/> <br>
        	@error('endereco')
        	<span class="invalid-feedback" role="alert">
        		<strong>{{$message}}</strong><br>
        	</span>
        	@enderror
        	Email:<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value ="{{ old('email')}}" required autofocus/><br>
        	@error('email')
        	<span class="invalid-feedback" role="alert">
        		<strong>{{$message}}</strong><br>
        	</span>
        	@enderror
        	Senha:<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/><br>
        	@error('password')
        	<span class="invalid-feedback" role="alert">
        		<strong>{{$message}}</strong><br>
        	</span>
        	@enderror
        	Confirme a senha:<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/><br>
        	<input type="submit" value="cadastrar"/>
        </form>
    </body>
</html>
