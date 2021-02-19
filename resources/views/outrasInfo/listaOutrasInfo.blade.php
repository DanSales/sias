@extends('layouts.base')

@section('Title', "Outras Informações")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('inscricao', App\Models\Candidato::class)
                <a class="float-right btn btn-primary" href="{{route('adicionarOutrasInfoView', ['idFamilia' => $idFamilia, 'idEdital' => $idEdital])}}">Adicionar Informações</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Descrição</th>
                        <th>Valor do Benefício</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($outrasInfo as $o)
                        <tr>
                            <td>{{$o->atividade}}</td>
                            <td>{{$o->renda}}</td>
                            <td class="text-center"><a class="btn btn-warning" href="{{route('atualizarOutrasInfoView', ['idOutraInfo' =>$o->id, 'idFamilia' => $idFamilia, 'idEdital' => $idEdital])}}">Atualizar</a></td>
                            <td class="text-center"><a class="btn btn-danger" href="{{route('deleteOutrasInfo', ['idOutraInfo' =>$o->id, 'idFamilia' => $idFamilia, 'idEdital' => $idEdital])}}">Deletar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
