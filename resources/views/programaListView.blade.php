@extends('layouts.welcome')

@section("Title", 'Programas')

@section('main')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Programas</h6>
        </div>
        <div class="card-body">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    @foreach($programas as $p)
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <a class="m-0 font-weight-bold text-primary" href="{{route('programasViewWelcome',['idPrograma' => $p->id])}}">{{$p->valor_beneficio . ' - ' . $p->descricao }}</a>
                        </div>
                    @endforeach
                <div>
        </div>
    </div>

@endsection
