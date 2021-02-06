@extends('layouts.base')

@section('Title', "Familias")

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @can('create', App\Models\Familia::class)
                <a class="float-right btn btn-primary" href="{{route('adicionarFamiliaView')}}">Nova Familia</a>
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

                    </thead>
                    <tbody id="lista_estado_casos">
                        @foreach($familias as $familia)
                            <tr>
                                <td>{{$familia->data_nascimento}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

