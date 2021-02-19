@extends('layouts.base')

@section('Title', "Familias")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('create', App\Models\Familia::class)
                <a class="float-right btn btn-primary" href="{{route('adicionarFamiliaView', ['idEdital' => $idEdital])}}">Nova Familia</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Nome</th>
                        <th>Data Nascimento</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody id="lista_estado_casos">
                        @foreach($familias as $familia)
                            <tr>
                                <td>{{$familia->nome}}</td>
                                <td>{{$familia->data_nascimento}}</td>
                                <td class="text-center"><a class="btn btn-primary">Detalhes</a></td>
                                <td class="text-center"><a class="btn btn-primary" href="{{route('listaOutrasInfoFamiliar', ['idFamilia' => $familia->id, 'idEdital' => $idEdital])}}">Outras Informações</a></td>
                                <td class="text-center"><a class="btn btn-warning" href="{{route('atualizarFamiliaView', ['idFamilia' => $familia->id, 'idEdital' => $idEdital])}}">Atualizar</a></td>
                                <td class="text-center"><a class="btn btn-danger" href="{{route('removerFamilia', ['id' => $familia->id, 'idEdital' => $idEdital])}}">Deletar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a type="button" href="{{route('enviarArquivosView', ['idEdital'=>$idEdital])}}" id="btnProximo" class="btn btn-primary float-right mt-3">Próximo</a>
        </div>
    </div>
@endsection

