@extends('layouts.base')

@section('Title', 'Adicionar Servidor')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label>Nome Completo:</label>
                        <input id = "nome_completo" type="text"class="form-control @error('nome_completo') is-invalid @enderror" name="nome_completo" value ="{{ old('nome_completo')}}" required autofocus/> <br>
                        @error('nome_completo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label>CPF: <</label>
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value ="{{ old('cpf')}}" required autofocus/> <br>
                        @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Data de Nascimento:</label>
                        <input id="data_nascimento" type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value ="{{ old('data_nascimento')}}" required autofocus/> <br>
                        @error('data_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4 col-12">
                        <label>Endereco:</label>
                        <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value ="{{ old('endereco')}}" required autofocus/> <br>
                        @error('endereco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4 col-12">
                        <label>Email:</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value ="{{ old('email')}}" required autofocus/><br>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4 col-12">
                        <label>Senha:</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/><br>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-4 col-12">
                        <label>Confirme a senha:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/><br>
                        <input class="btn btn-primary" type="submit" value="Cadastrar"/>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
