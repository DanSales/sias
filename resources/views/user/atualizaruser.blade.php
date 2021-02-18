@extends('layouts.base')

@section('Title', 'Atualizar Informacoes')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post">
                @csrf

                            <div class="form-group row">

                                <div class="col-md-12">
                                    <label for="nome_completo" class="text-md-right">{{ __('Nome Completo:') }}</label>
                                    <input id="nome_completo" type="text" class="form-control form-control-user @error('nome_completo') is-invalid @enderror" name="nome_completo" value="{{ $user->nome_completo }}" required autocomplete="nome_completo" autofocus>

                                    @error('nome_completo')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">


                                <div class="col-md-12">
                                    <label for="cpf" class="text-md-right">{{ __('CPF:') }}</label>
                                    <input id="cpf" type="text" class="form-control form-control-user @error('cpf') is-invalid @enderror" name="cpf" value="{{$user->cpf}}" required autocomplete="cpf" autofocus>

                                    @error('cpf')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-12">
                                    <label for="data_nascimento" class="text-md-right">{{ __('Data de Nascimento:') }}</label>
                                    <input id="data_nascimento" type="date" class="form-control form-control-user @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ $user->data_nascimento}}" required autocomplete="data_nascimento" autofocus>

                                    @error('data_nascimento')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="endereco" class="text-md-right">{{ __('Endereco:') }}</label>
                                    <input id="endereco" type="text" class="form-control form-control-user @error('data_nascimento') is-invalid @enderror" name="endereco" value="{{$user->endereco}}" required autocomplete="endereco" autofocus>

                                    @error('endereco')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="text-md-right">{{ __('E-Mail Address:') }}</label>
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                <input class="btn btn-primary float-right" type="submit" value="Atualizar"/>
            </form>
        </div>
    </div>

@endsection
