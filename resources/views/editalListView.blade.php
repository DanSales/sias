@extends('layouts.welcome')

@section("Title", 'Editais')

@section('main')
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">EDITAIS {{$text}}</h6>
        </div>
        <div class="card-body">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    @foreach($editais as $e)
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <a class="m-0 font-weight-bold text-primary" href="{{route('editaisViewWelcome',['idEdital' => $e->id])}}">{{$e->numero_edital . ' - ' . $e->programa->descricao .' - '. $e->data_edital}}</a>
                        </div>
                    @endforeach
                <div>
        </div>
    </div>

@endsection



