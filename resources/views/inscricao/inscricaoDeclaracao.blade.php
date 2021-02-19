@extends('layouts.base')

@section('Title', 'Enviar Arquivos')

@section('main')
    @extends('layouts.base')

@section('Title', "Novo Edital")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label>Relato Familiar: </label>
                        <input class="form-control-file" type="file" name="relato_familiar" id="relato_familiar" @error('relato_familiar') is-invalid @enderror" value ="{{ old('relato_familiar')}}" required>
                        @error('relato_familiar')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label>Declaracao de Rendimento: </label>
                        <input class="form-control-file" type="file" name="declaracao_rendimento" id="declaracao_rendimento" @error('declaracao_rendimento') is-invalid @enderror" value ="{{ old('declaracao_rendimento')}}" required>
                        @error('declaracao_rendimento')
                        <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong><br>
                            </span>
                        @enderror
                    </div>
                </div>

                <input class="btn btn-primary float-right mt-4" type="submit" value="Próximo">
            </form>

        </div>
    </div>


@endsection

@endsection

@section('js')

@endsection
