
@extends('layouts.base')

@section('Title', "Bolsas")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Data de Pagamento</th>
                        <th>Programa</th>
                        <th>Valor</th>
                    </thead>
                    <tbody id="lista_estado_casos">
                        @foreach($bolsas as $b)
                            <tr >
                                <td>{{$b->data_pagamento}}</td>
                                <td>{{$b->programa_name}}</td>
                                <td>{{$b->valor_beneficio}} </td>
                            </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
