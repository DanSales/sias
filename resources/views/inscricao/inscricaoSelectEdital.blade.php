@extends('layouts.base')

@section('Title', 'Inscrição')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="class="h3 mb-0"">Selecione um Edital</h3>
        </div>
        <div class="card-body">
            <form method="get">
                <select class="form-control" id="selectPrograma">
                    <option value="0">SELECIONE</option>
                    @foreach($editais as $e)
                        <option value="{{route('listaFamilias', ['idEdital'=>$e->id])}}">{{$e->programa->descricao. ' - ' .$e->numero_edital}}</option>
                    @endforeach
                </select>
                <input type="button" id="btnProximo" class="btn btn-primary float-right mt-3" value="Próximo">
            </form>
        </div>

    </div>
@endsection

@section('js')
    <script>
        let selectPrograma = $("#selectPrograma");
        let buttonProximo = $("#btnProximo");

        buttonProximo.click(function (){
            if (selectPrograma.val() == "0"){
                alert('Selecione um Edital!');
            }else {
                location.href = selectPrograma.val();
            }
        });
    </script>
@endsection
