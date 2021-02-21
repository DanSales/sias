@extends('layouts.base')

@section('Title', "Inscrições")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Programa - Edital</th>
                        <th></th>
                    </thead>
                    <tbody id="lista_estado_casos">
                    @foreach($inscricoes as $i)
                        <tr>
                            <td>{{$i->editais->programa->descricao. ' - '. $i->editais->numero_edital}}</td>
                            <td class="text-center"><a class="btn btn-warning" href="{{route('detalharInscricao', ['idInscricao' => $i->id])}}">Detalhar</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
