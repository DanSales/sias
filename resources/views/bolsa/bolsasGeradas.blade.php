@extends('layouts.base')

@section('Title', "Bolsas")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{$programa->descricao}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Beneficiario</th>
                        <th>Status</th>
                        <th>Mensagem</th>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($beneficiarios as $b)
                        @if($b['gerada'])
                            <tr class="bg-gradient-success text-gray-900">
                                <td>{{$b['nome_completo']}}</td>
                                <td>{{$b['gerada'] ? 'Sim' : 'Não'}}</td>
                                <td>{{$b['mensagem']? $b['mensagem'] : "-" }}</td>
                            </tr >
                        @else
                            <tr class="bg-gradient-danger text-gray-900">
                                <td>{{$b['nome_completo']}}</td>
                                <td>{{$b['gerada'] ? 'Sim' : 'Não'}}</td>
                                <td>{{$b['mensagem'] ? $b['mensagem'] : "-" }}</td>
                            </tr >
                        @endif
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

