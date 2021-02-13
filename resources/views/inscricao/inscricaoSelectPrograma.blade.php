@extends('layouts.base')

@section('Title', 'Inscrição')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="class="h3 mb-0"">Selecione um programa</h3>
        </div>
        <div class="card-body">
            <form method="">
                <select class="form-control" id="selectPrograma">
                    <option value="0">SELECIONE</option>
                    @foreach($programas as $p)
                        <option value="{{route('selecionarEditalInscricao', ['idPrograma'=>$p->id])}}">{{$p->descricao}}</option>
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
                alert('Selecione um programa!');
            }else {
                location.href = selectPrograma.val();
            }
        });
    </script>
@endsection
