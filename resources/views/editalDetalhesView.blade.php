@extends('layouts.welcome')

@section("Title")
    {{$edital->numero_edital . ' - ' . $edital->programa->descricao .' - '. $edital->data_edital}}
@endsection

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gray-400">
                    <h4 class="mb-0 text-gray-900">Edital</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label>Programa:</label>
                            <p>{{$edital->programa->descricao}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Valor do benefício:</label>
                            <p>{{$edital->programa->valor_beneficio}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Data do edital:</label>
                            <p>{{$edital->data_edital}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Número:</label>
                            <p>{{$edital->numero_edital}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Arquivo:</label>
                            <p><a href="{{asset('storage/'.$edital->arquivo_edital)}}">Documento</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
