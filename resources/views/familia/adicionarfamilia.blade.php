@extends('layouts.base')

@section('Title', 'Adicionar Familia')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" id="idEdital" name="idEdital" value="{{$idEdital}}">
                    <div class="col-12 col-md-4">
                        <label>Nome: </label>
                        <input  id = "nome" type="text"class="form-control @error('nome') is-invalid @enderror" name="nome" value ="{{ old('nome')}}" required autofocus/> <br>
                        @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>CPF: </label>
                        <input id = "cpf" type="text"class="form-control @error('cpf') is-invalid @enderror" name="cpf" value ="{{ old('cpf')}}"/> <br>
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
                    <div class="col-12 col-md-4">
                        <label>Escolaridade:</label>
                        <input id="escolaridade" type="text" class="form-control @error('escolaridade') is-invalid @enderror" name="escolaridade" value ="{{ old('escolaridade')}}" required autofocus/> <br>
                        @error('escolaridade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Renda Mensal: </label>
                        <input id="renda_mensal" type="text" class="form-control @error('renda_mensal') is-invalid @enderror" name="renda_mensal" value ="{{ old('renda_mensal')}}" required autofocus/> <br>
                        @error('renda_mensal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Profissao:</label>
                        <input id="profissao" type="text" class="form-control @error('profissao') is-invalid @enderror" name="profissao" value ="{{ old('profissao')}}" required autofocus/><br>
                        @error('profissao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Declaracao Autonomo:</label>
                        <input class="form-control-file" type="file" name="declaracao_autonomo" id="arquivo" @error('declaracao_autonomo') is-invalid @enderror" value ="{{ old('declaracao_autonomo')}}"/>
                        @error('declaracao_autonomo')
                        <span class="invalid-feedback d-block" role="alert">
        		            <strong>{{$message}}</strong><br>
        	            </span>
                        @enderror

                    </div>
                    <div class="col-12 col-md-4">
                        <label>Declaracao Agricultor:</label>
                        <input class="form-control-file" type="file" name="declaracao_agricultor" id="declaracao_agricultor" @error('declaracao_agricultor') is-invalid @enderror" value ="{{ old('declaracao_agricultor')}}"/>
                        @error('declaracao_agricultor')
                        <span class="invalid-feedback d-block" role="alert">
        		            <strong>{{$message}}</strong><br>
        	            </span>
                        @enderror

                    </div>
                </div>
                <input class="btn btn-primary float-right" type="submit" value="Cadastrar"/>
            </form>
        </div>
    </div>

@endsection
