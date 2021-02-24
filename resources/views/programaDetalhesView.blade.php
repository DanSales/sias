@extends('layouts.welcome')

@section("Title", "Programa")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gray-400">
                    <h4 class="mb-0 text-gray-900">Programa</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label>Programa:</label>
                            <p>{{$programa->descricao}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Valor do benefício:</label>
                            <p>{{$programa->valor_beneficio}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
