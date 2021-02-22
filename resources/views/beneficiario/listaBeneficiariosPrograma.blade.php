

@extends('layouts.base')

@section('Title')
    Beneficiários - {{$programa->descricao}}
@endsection

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary float-right" href="#" data-toggle="modal" data-target="#gerarBolsaModal">
                Gerar Bolsas
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Nome Beneficiário</th>
                        <th>Ativo</th>
                        <th></th>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($datas as $data)
                        <tr>
                            <td class="text-center">{{$data->nome_completo}}</td>
                            <td class="text-center">{{$data->is_ativo ? 'Sim' : 'Não'}}</td>
                            @if($data->is_ativo)
                                <td class="text-center"><a class="btn btn-danger" href="{{route('removerBeneficiario', ['id' => $data->id, 'programa_id' => $programa->id])}}">Remover Beneficiario</a></td>
                            @else
                                <td class="text-center"> - </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="gerarBolsaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja gerar as bolsas do programa {{$programa->descricao}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form action="{{route('gerarBolsasBeneficiarios', ['programa_id' => $programa->id])}}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Sim</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Não</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
