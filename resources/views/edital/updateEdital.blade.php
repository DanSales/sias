@extends('layouts.base')

@section('Title', "Atualizar Edital")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="hidden" name="id" id="id" value="{{$edital->id}}">
                        <label>Data: </label>
                        <input type="date" value="{{$edital->data_edital}}" class="form-control" name="data_edital" @error('data_edital') is-invalid @enderror" value ="{{ old('data_edital')}}" required autofocus><br>
                        @error('data_edital')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Início das inscrições: </label>
                        <input type="date" value="{{$edital->inicio_inscricao}}" class="form-control" name="inicio_inscricao" @error('inicio_inscricao') is-invalid @enderror" value ="{{ old('inicio_inscricao')}}" required autofocus><br>
                        @error('inicio_inscricao')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label>Fim das inscrições: </label>
                        <input type="date" value="{{$edital->fim_inscricao}}" class="form-control" name="fim_inscricao" @error('fim_inscricao') is-invalid @enderror" value ="{{ old('fim_inscricao')}}" required autofocus><br>
                        @error('fim_inscricao')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Número do Edital: </label>
                        <input type="text" class="form-control" value="{{$edital->numero_edital}}" name="numero_edital" @error('numero_edital') is-invalid @enderror" value ="{{ old('numero_edital')}}" required autofocus><br>
                        @error('numero_edital')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Arquivo: </label>
                        <input class="form-control-file" type="file" name="arquivo_edital" id="arquivo" @error('arquivo_edital') is-invalid @enderror" value ="{{ old('arquivo_edital')}}">
                        @error('arquivo_edital')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Programa: </label>
                        <select name="programa_id" class="form-control">
                            @foreach($programas as $p)
                                @if($p->id == $edital->programa->id)
                                    <option value="{{$p->id}}" selected>{{$p->descricao}} </option>
                                @else
                                    <option value="{{$p->id}}">{{$p->descricao}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <input class="btn btn-primary float-right mt-4" type="submit" value="Salvar">
            </form>

        </div>
    </div>


@endsection
