@extends('layouts.base')

@section('Title', "Adicionar Beneficiário")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary"> Gerar Bolsas</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Nome Candidato</th>
                        <th></th>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($datas as $data)
                        <tr>
                            <td class="text-center">{{$data->nome_completo}}</td>
                            <td class="text-center"><a class="btn btn-primary" href="{{route('adicionarBeneficiario', ['id' => $data->id])}}">Tornar Beneficiario</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
