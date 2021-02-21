@extends('layouts.base')

@section('Title', "Programas")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('create', App\Models\Conta::class)
                <a class="float-right btn btn-primary" href="{{route('adicionarContaView')}}">Nova Conta</a>
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
                        <th></th>

                    </thead>
                    <tbody id="lista_estado_casos">
                        @foreach($contas as $conta)
                            <tr>
                                <td>{{$conta->banco}}</td>
                                <td class="text-center"><a class="btn btn-primary" href="{{route('listBolsaBeneficiario', ['idConta'=>$conta->id])}}"> Bolsas</a></td>
                                <td class="text-center"><a class="btn btn-primary" href="{{route('atualizarContaView', ['id' => $conta->id])}}">Atualizar Conta</a></td>
                                <td class="text-center"><a class="btn btn-danger" href="{{route('removerConta', ['id' => $conta->id])}}">Remover Conta</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

