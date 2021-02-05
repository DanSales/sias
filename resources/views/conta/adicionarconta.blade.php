@extends('layouts.base')

@section('Title', 'Adicionar Conta')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label>Agencia: </label>
                        <input id = "agencia" type="text"class="form-control @error('agencia') is-invalid @enderror" name="agencia" value ="{{ old('agencia')}}" required autofocus/> <br>
                        @error('agencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>


                    <div class="col-12 col-md-4">
                        <label>Banco:</label>
                        <input id="banco" type="text" class="form-control @error('banco') is-invalid @enderror" name="banco" value ="{{ old('banco')}}" required autofocus/> <br>
                        @error('banco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror

                    </div>


                    <div class="col-12 col-md-4">
                        <label>Codigo do Banco:</label>
                        <input id="codigo_banco" type="text" class="form-control @error('codigo_banco') is-invalid @enderror" name="codigo_banco" value ="{{ old('codigo_banco')}}" required autofocus/> <br>
                        @error('codigo_banco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Tipo de Conta: </label>
                        <input id="tipo_conta" type="text" class="form-control @error('tipo_conta') is-invalid @enderror" name="tipo_conta" value ="{{ old('tipo_conta')}}" required autofocus/> <br>
                        @error('tipo_conta')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Numero da Conta:</label>
                        <input id="numero_conta" type="text" class="form-control @error('numero_conta') is-invalid @enderror" name="numero_conta" value ="{{ old('numero_conta')}}" required autofocus/><br>
                        @error('numero_conta')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="ativa">Ativa</label>
                        <select name="ativa" id="Ativa" class="form-control @error('ativa') is-invalid @enderror">
                            @if(old('ativa') == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif(old('ativa')=="FALSE")
                                <option value="TRUE">Sim</option>
                                <option value="FALSE" selected='selected'>Nao</option>
                            @else
                                <option value="TRUE">Sim</option>
                                <option value="FALSE">Nao</option>
                            @endif
                        </select> <br>
                        @error('ativa')
                        <span class="invalid-feedback" role="alert">
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
