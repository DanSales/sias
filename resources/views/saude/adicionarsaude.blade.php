@extends('layouts.base')

@section('Title', 'Adicionar Conta')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{$familia_id}}" name="familia_id">
                    <div class="col-12 col-md-4">
                        <label>Despesa Mensal: </label>
                        <input id = "despesa_mensal" type="text"class="form-control @error('despesa_mensal') is-invalid @enderror" name="despesa_mensal" value ="{{ old('despesa_mensal')}}"/> <br>
                        @error('despesa_mensal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>


                    <div class="col-12 col-md-4">
                        <label>Valor Plano:</label>
                        <input id="valor_plano" type="text" class="form-control @error('valor_plano') is-invalid @enderror" name="valor_plano" value ="{{ old('valor_plano')}}"/> <br>
                        @error('valor_plano')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror

                    </div>
                    <div class="col-12 col-md-4">
                        <label for="flag_doenca">Doença</label>
                        <select name="flag_doenca" id="flag_doenca" class="form-control @error('flag_doenca') is-invalid @enderror">
                            @if(old('flag_doenca') == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif(old('flag_doenca')=="FALSE")
                                <option value="TRUE">Sim</option>
                                <option value="FALSE" selected='selected'>Nao</option>
                            @else
                                <option value="TRUE">Sim</option>
                                <option value="FALSE">Nao</option>
                            @endif
                        </select> <br>
                        @error('flag_doenca')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="flag_plano">Plano</label>
                        <select name="flag_plano" id="flag_plano" class="form-control @error('flag_plano') is-invalid @enderror">
                            @if(old('flag_plano') == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif(old('flag_plano')=="FALSE")
                                <option value="TRUE">Sim</option>
                                <option value="FALSE" selected='selected'>Nao</option>
                            @else
                                <option value="TRUE">Sim</option>
                                <option value="FALSE">Nao</option>
                            @endif
                        </select> <br>
                        @error('flag_plano')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="flag_dificuldade">Dificuldade</label>
                        <select name="flag_dificuldade" id="flag_dificuldade" class="form-control @error('flag_dificuldade') is-invalid @enderror">
                            @if(old('flag_dificuldade') == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif(old('flag_dificuldade')=="FALSE")
                                <option value="TRUE">Sim</option>
                                <option value="FALSE" selected='selected'>Nao</option>
                            @else
                                <option value="TRUE">Sim</option>
                                <option value="FALSE">Nao</option>
                            @endif
                        </select> <br>
                        @error('flag_dificuldade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="flag_deficiencia">Deficiencia</label>
                        <select name="flag_deficiencia" id="flag_deficiencia" class="form-control @error('flag_deficiencia') is-invalid @enderror">
                            @if(old('flag_deficiencia') == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif(old('flag_deficiencia')=="FALSE")
                                <option value="TRUE">Sim</option>
                                <option value="FALSE" selected='selected'>Nao</option>
                            @else
                                <option value="TRUE">Sim</option>
                                <option value="FALSE">Nao</option>
                            @endif
                        </select> <br>
                        @error('flag_deficiencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                </div>
                <input class="btn btn-primary float-right" type="submit" value="Cadastrar"/>
            </form>
        </div>
    </div>

@endsection
