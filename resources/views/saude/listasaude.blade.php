@extends('layouts.base')

@section('Title', "Saude")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('create', App\Models\Familia::class)
                @if (count($saudes) == 0) 
                    <a class="float-right btn btn-primary" href="{{route('adicionarSaudesView',['id' => $id])}}">Adicionar Informacoes de Saude</a>
                @endif
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Descrição</th>
                        <th></th>
                        <th></th>

                    </thead>
                    <tbody id="lista_estado_casos">
                        @foreach($saudes as $saude)
                            <tr>
                                <td>Informacao Saude</td>
                                <td class="text-center"><a class="btn btn-primary" >Atualizar Informacoes</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

