    @extends('layouts.base')

    @section('Title', "Programas")

    @section('main')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a class="float-right btn btn-primary" href="{{route('createPrograma')}}">Novo Programa</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr class="text-center">
                            <th>Descrição</th>
                            <th>Valor do Benefício</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody id="lista_estado_casos">
                        @foreach($programas as $p)
                            <tr>
                                <td >{{$p->descricao}}</td>
                                <td>{{$p->valor_beneficio}}</td>
                                <td class="text-center"><a class="btn btn-primary" href="{{route('listAnexos', ['id' => $p->id])}}">Anexos</a></td>
                                <td class="text-center"><a class="btn btn-primary" href="{{route('listBolsaPrograma', ['idPrograma' =>$p->id])}}">Bolsas</a></td>
                                <td class="text-center"><a class="btn btn-primary" href="{{route('listEdital', ['idPrograma' =>$p->id])}}">Editais</a></td>
                                <td class="text-center"><a class="btn btn-warning">Atualizar</a></td>
                                <td class="text-center"><a class="btn btn-danger" href="{{route('deletePrograma', ['id' =>$p->id])}}">Deletar</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
