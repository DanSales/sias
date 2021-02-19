@extends('layouts.base')

@section('Title', 'Atualizar Outras Informações')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post">
                @csrf
                <div class="row">
                    <input type="hidden" id="idEdital" name="idEdital" value="{{$idEdital}}">
                    <input type="hidden" id="familia_id" name="familia_id" value="{{$idFamilia}}">
                    <input type="hidden" id="id" name="id", value="{{$outrasInfo->id}}">
                    <div class="col-12 col-md-6">
                        <label>Atividade: </label>
                        <input  id = "atividade" value="{{$outrasInfo->atividade}}" type="text"class="form-control @error('atividade') is-invalid @enderror" name="atividade" value ="{{ old('atividade')}}" required autofocus/> <br>
                        @error('atividade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Renda: </label>
                        <input id = "renda" value="{{$outrasInfo->renda}} "type="text"class="form-control @error('renda') is-invalid @enderror" name="renda" value ="{{ old('renda')}}"/> <br>
                        @error('renda')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                </div>
                <input class="btn btn-primary float-right" type="submit" value="Salvar"/>
            </form>
        </div>
    </div>

@endsection
