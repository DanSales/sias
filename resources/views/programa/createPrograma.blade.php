@extends('layouts.base')

@section('Title', "Novo Programa")
@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('createPrograma')}}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label>Descrição: </label>
                        <input type="text" class="form-control" name="descricao" @error('descricao') is-invalid @enderror" value ="{{ old('descricao')}}" required autofocus><br>
                        @error('descricao')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Valor do Benefício: </label>
                        <input type="text" class="form-control" name="valor_beneficio" @error('valor_beneficio') is-invalid @enderror" value ="{{ old('valor_beneficio')}}" required autofocus><br>
                        @error('valor_beneficio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                </div>

                <input class="btn btn-primary float-right" type="submit" value="Cadastrar">
            </form>

        </div>
    </div>


@endsection
