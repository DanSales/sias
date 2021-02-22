@extends('layouts.base')

@section("Title", 'Editais')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('create', App\Models\Edital::class)
                <a class="float-right btn btn-primary" href="{{route('createEdital')}}">Novo Edital</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Data</th>
                        <th>Número</th>
                        <th>Arquivo</th>
                        <th>Programa</th>
                        @can('create', App\Models\Edital::class)
                            <th></th>
                            <th></th>
                            <th></th>
                        @endcan
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($editais as $e)
                        <tr>
                            <td>{{$e->data_edital}}</td>
                            <td>{{$e->numero_edital}}</td>
                            <td>{{$e->arquivo_edital}}</td>
                            <td>{{$e->programa->descricao}}</td>
                            @can('create', App\Models\Edital::class)
                                <td><a class="btn btn-primary" href="{{route('listaInscritos', ['idEdital' => $e->id])}}">Inscrições</a></td>
                                <td><a class="btn btn-warning" href="{{route('updateEditalView', ['idEdital' => $e->id])}}">Atualizar</a></td>
                                <td><a class="btn btn-danger" href="{{route('deleteEdital', ['idEdital' => $e->id])}}">Deletar</a></td>
                            @endcan
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
