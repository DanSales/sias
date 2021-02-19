@extends('layouts.base')

@section('Title', 'Confirmar Inscrição')

@section('main')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gray-400">
                    <h4 class="mb-0 text-gray-900">Edital</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label>Programa:</label>
                            <p>{{$edital->programa->descricao}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Valor do benefício:</label>
                            <p>{{$edital->programa->valor_beneficio}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Data do edital:</label>
                            <p>{{$edital->data_edital}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Número:</label>
                            <p>{{$edital->numero_edital}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Arquivo:</label>
                            <p>{{$edital->arquivo_edital}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-header py-3 bg-gray-400">
                    <h4 class="mb-0 text-gray-900">Informações Pessoais</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label>Nome completo:</label>
                            <p>{{\Auth::user()->nome_completo}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Email:</label>
                            <p>{{\Auth::user()->email}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Email:</label>
                            <p>{{\Auth::user()->email}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>CPF:</label>
                            <p>{{\Auth::user()->cpf}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Data de Nascimento:</label>
                            <p>{{\Auth::user()->data_nascimento}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Endereço:</label>
                            <p>{{\Auth::user()->endereco}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Relato Familiar:</label>
                            <p>{{\Auth::user()->candidatos->relato_familiar}}</p>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Declaracão de rendimentos:</label>
                            <p>{{\Auth::user()->candidatos->declaracao_rendimento}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-header py-3 bg-gray-400">
                    <h4 class="mb-0 text-gray-900">Familiares</h4>
                </div>
                <div class="card-body">
                    @foreach(Auth::user()->familias as $f)
                        <hr>
                        <div class="row">
                            <div class="col-12 card-header py-3 bg-gray-400"><h5>Informações Gerais</h5></div>
                            <div class="col-12 col-md-4">
                                <label>Nome completo:</label>
                                <p>{{$f->nome}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>CPF:</label>
                                <p>{{$f->cpf}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Data de nascimento:</label>
                                <p>{{$f->data_nascimento}}</p>
                            </div>

                            @if($f->declaracao_autonomo != null)
                            <div class="col-12 col-md-4">
                                <label>Declaração de autônomo:</label>
                                <p>{{$f->declaracao_autonomo}}</p>
                            </div>
                            @endif

                            @if($f->declaracao_agricultor != null)
                            <div class="col-12 col-md-4">
                                <label>Declaração de agricultor:</label>
                                <p>{{$f->declaracao_agricultor}}</p>
                            </div>
                            @endif

                            <div class="col-12 col-md-4">
                                <label>Escolaridade:</label>
                                <p>{{$f->escolaridade}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Renda Mensal:</label>
                                <p>{{$f->renda_mensal}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Profissão:</label>
                                <p>{{$f->profissao}}</p>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12 card-header py-3 bg-gray-400"><h5>Saúde</h5></div>
                            <div class="col-12 col-md-4">
                                <label>Despesa mensal:</label>
                                <p>{{$f->saudes->despesa_mensal}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Plano de saúde:</label>
                                <p>{{$f->saudes->flag_plano ? "Sim" : "Não"}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Doença:</label>
                                <p>{{$f->saudes->flag_doenca ? "Sim" : "Não"}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Dificuldade:</label>
                                <p>{{$f->saudes->flag_dificuldade ? "Sim" : "Não"}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Deficiência:</label>
                                <p>{{$f->saudes->flag_deficiencia ? "Sim" : "Não"}}</p>
                            </div>

                            <div class="col-12 col-md-4">
                                <label>Valor do plano:</label>
                                <p>{{$f->saudes->valor_plano}}</p>
                            </div>
                        </div>
                        @if($f->outrasinfos != null)
                        <div class="row">
                            <div class="col-12 card-header py-3 bg-gray-400"><h5>Outras Informações</h5></div>
                            @foreach($f->outrasinfos as $o)
                            <div class="col-12 col-md-6">
                                <label>Atividade:</label>
                                <p>{{$o->atividade}}</p>
                            </div>

                            <div class="col-12 col-md-6">
                                <label>Renda:</label>
                                <p>{{$o->renda}}</p>
                            </div>

                            @endforeach

                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary float-right" href="{{route('finalizarInscricao', ['idEdital' => $edital->id])}}">Inscrever-se</a>
            <button class="btn btn-primary">Voltar ao início</button>

        </div>
    </div>
@endsection

@section('js')

@endsection
