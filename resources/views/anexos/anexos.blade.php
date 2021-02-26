@extends('layouts.base')

@section('Title', "Anexos - $programa->descricao")

@section('main')
    @can('create', \App\Models\Anexo::class)
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('createAnexo', ['id' => $programa->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{$programa->id}}" name="programa_id">
                    <div class="col-12">
                        <input class="form-control-file" type="file" name="caminho_arquivo" id="arquivo" @error('caminho_arquivo') is-invalid @enderror" value ="{{ old('caminho_arquivo')}}" required autofocus>
                        @error('caminho_arquivo')
                        <span class="invalid-feedback d-block" role="alert">
        		            <strong>{{$message}}</strong><br>
        	            </span>
                        @enderror

                    </div>
                </div>

                <input class="btn btn-primary float-right mt-4" type="submit" value="Cadastrar">
            </form>


        </div>
    </div>
    @endcan


    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Caminho do arquivo</th>
                        @can('create', \App\Models\Anexo::class)
                        <th></th>
                        @endcan
                    </thead>
                    <tbody id="lista_estado_casos">

                    @foreach($anexos as $a)
                        <tr >
                            <td><a href="{{ asset('storage/'.$a->caminho_arquivo) }}">Documento</a></td>
                            @can('create', \App\Models\Anexo::class)
                            <td class="text-center"><a class="text-center"><a class="btn btn-danger" href="{{route('deleteAnexo',['id'=>$programa->id, 'idAnexo' => $a->id])}}">Deletar</a></td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


