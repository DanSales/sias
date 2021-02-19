@extends('layouts.base')

@section('Title', "Atualizar Programa")
@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('updatePrograma')}}" >
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="hidden" name="id" id="id" value="{{$programa->id}}">
                        <label>Descrição: </label>
                        <input type="text" value="{{$programa->descricao}}" class="form-control" name="descricao" @error('descricao') is-invalid @enderror" value ="{{ old('descricao')}}" required autofocus><br>
                        @error('descricao')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Valor do Benefício: </label>
                        <input type="text" class="form-control" value="{{$programa->valor_beneficio}}" name="valor_beneficio" @error('valor_beneficio') is-invalid @enderror" value ="{{ old('valor_beneficio')}}" required autofocus><br>
                        @error('valor_beneficio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                </div>

                <input class="btn btn-primary float-right" type="submit" value="Salvar">
            </form>

        </div>
    </div>


@endsection
