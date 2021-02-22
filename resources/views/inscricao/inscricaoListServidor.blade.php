@extends('layouts.base')

@section('Title')
    Inscritos Edital - {{$edital->numero_edital}}
@endsection

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Pendentes
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Nome Completo</th>
                        <th></th>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($editalUser as $es)
                        @if(!$es->is_beneficiario)
                        <tr>
                            <td>{{$es->users->nome_completo}}</td>
                            <td class="text-center"><a href="{{route('detalharInscricao', ['idEdital' => $edital->id, 'idInscricao' => $es->id])}}" class="btn btn-primary">Detalhar</a></td>
                        </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Aceitas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Nome Completo</th>
                        <th></th>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($editalUser as $es)
                        @if($es->is_beneficiario)
                        <tr>
                            <td>{{$es->users->nome_completo}}</td>
                            <td class="text-center"><a href="{{route('detalharEditalInscricao', ['idEdital' => $edital->id, 'idInscricao' => $es->id])}}" class="btn btn-primary">Detalhar</a></td>
                        </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
