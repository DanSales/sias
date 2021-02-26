@extends('layouts.base')

@section('Title', 'Atualizar Familia')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" id="idEdital" name="idEdital" value="{{$idEdital}}">
                    <div class="col-12 col-md-4">
                        <label>Nome: </label>
                        <input  id = "nome" type="text"class="form-control @error('nome') is-invalid @enderror" name="nome" value ="{{$familia->nome}}" required autofocus/> <br>
                        @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>CPF: </label>
                        <input id = "cpf" type="text"class="form-control @error('cpf') is-invalid @enderror" name="cpf" value ="{{$familia->cpf}}"/> <br>
                        @error('cpf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>


                    <div class="col-12 col-md-4">
                        <label>Data de Nascimento:</label>
                        <input id="data_nascimento" type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value ="{{$familia->data_nascimento}}" required autofocus/> <br>
                        @error('data_nascimento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror

                    </div>
                    <div class="col-12 col-md-4">
                        <label>Escolaridade:</label>
                        <input id="escolaridade" type="text" class="form-control @error('escolaridade') is-invalid @enderror" name="escolaridade" value ="{{ $familia->escolaridade}}" required autofocus/> <br>
                        @error('escolaridade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Renda Mensal: </label>
                        <input id="renda_mensal" type="text" class="form-control @error('renda_mensal') is-invalid @enderror" name="renda_mensal" value ="{{ $familia->renda_mensal}}" required autofocus/> <br>
                        @error('renda_mensal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Profissao:</label>
                        <input id="profissao" type="text" class="form-control @error('profissao') is-invalid @enderror" name="profissao" value ="{{$familia->profissao}}" required autofocus/><br>
                        @error('profissao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label>Declaracao Autonomo:</label>
                        <input class="form-control-file" type="file" name="declaracao_autonomo" id="arquivo" @error('declaracao_autonomo') is-invalid @enderror" value ="{{$familia->declaracao_autonomo}}"/>
                        <a href="{{asset('storage/'.$familia->declaracao_autonomo)}}">Documento</a>
                        @error('declaracao_autonomo')
                        <span class="invalid-feedback d-block" role="alert">
        		            <strong>{{$message}}</strong><br>
        	            </span>
                        @enderror

                    </div>
                    <div class="col-12 col-md-4">
                        <label>Declaracao Agricultor:</label>
                        <input class="form-control-file" type="file" name="declaracao_agricultor" id="declaracao_agricultor" @error('declaracao_agricultor') is-invalid @enderror" value ="{{ $familia->declaracao_agricultor}}"/><br/>
                        <a href="{{asset('storage/'.$familia->declaracao_agricultor)}}">Documento</a>
                        @error('declaracao_agricultor')
                        <span class="invalid-feedback d-block" role="alert">
        		            <strong>{{$message}}</strong><br>
        	            </span>
                        @enderror
                    </div>
                     <div class="col-12 col-md-4">
                        <label>Despesa Mensal: </label>
                        <input id = "despesa_mensal" type="text"class="form-control @error('despesa_mensal') is-invalid @enderror" name="despesa_mensal" value ="{{$saude->despesa_mensal}}"/> <br>
                        @error('despesa_mensal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror
                    </div>


                    <div class="col-12 col-md-4">
                        <label>Valor Plano:</label>
                        <input id="valor_plano" type="text" class="form-control @error('valor_plano') is-invalid @enderror" name="valor_plano" value ="{{$saude->valor_plano}}"/> <br>
                        @error('valor_plano')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong><br>
                        </span>
                        @enderror

                    </div>
                    <div class="col-12 col-md-4">
                        <label for="flag_doenca">Doença</label>
                        <select name="flag_doenca" id="flag_doenca" class="form-control @error('flag_doenca') is-invalid @enderror">
                            @if($saude->flag_doenca == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif($saude->flag_doenca=="FALSE")
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
                            @if($saude->flag_plano == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif($saude->flag_plano=="FALSE")
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
                            @if($saude->flag_dificuldade == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif($saude->flag_dificuldade=="FALSE")
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
                            @if($saude->flag_deficiencia == "TRUE")
                                <option value="TRUE" selected='selected'>Sim</option>
                                <option value="FALSE">Nao</option>
                            @elseif($saude->flag_deficiencia=="FALSE")
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
                <input class="btn btn-primary float-right" type="submit" value="Atualizar"/>
            </form>
        </div>
    </div>

@endsection
