
@extends('layouts.base')

@section('Title', "Bolsas")

@section('main')
    @foreach( $programasBolsas as $key => $value)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{$key}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Data de Pagamento</th>
                        <th>Valor</th>
                    </thead>
                    <tbody id="lista_estado_casos">
                            @foreach($value as $b)
                            <tr >
                                <td>{{$b->data_pagamento}}</td>
                                <td>{{$b->valor_beneficio}} </td>
                            </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
@endsection
