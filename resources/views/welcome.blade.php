@extends('layouts.welcome')

@section("Title", "SIAS - UFAPE")

@section('main')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">EDITAIS ABERTOS</h6>
        </div>
        <div class="card-body">
            @foreach($editais as $e)
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{$e->numero_edital . ' - ' . $e->programa->descricao .' - '. $e->data_edital}}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div>
                            <h6 class="font-weight-bold text-primary text-center mb-3"></h6>

                            <p class="text-justify"></p>
                        </div>
                        <div class="mt-4 float-right">
                            <a class="btn btn-primary" href="">Inscreva-se</a>
                        </div>
                    </div>

                </div>

            @endforeach
        </div>
    </div>

@endsection



