<htmL>
<head>
    <meta charset="utf-8">
    @section('title', 'Endereço')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/adress.css')}}" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>

</head>
<body>
@extends('layout.template')

@section('content')
    <div class="container">
        <div class="row" id="adressUser">
        <span class="col-md-12 col-12 d-flex justify-content-left" id="newTitle">
						Selecionar um endereço para envio
                    </span>
            <span class="col-md-12 col-12" id="text"> Selecione algum desses endereços já cadastrados por você para receber o pedido, caso o endereço
                        certo não esteja aqui, cadastre-o mais abaixo.</span>
            <hr style="width: 100% ;">
            @foreach ($query as $row)
                <div class="col-md-4 col-12" id="infos">
                    <div class="col-md-12 col-12" id="bairro"><small>
                            Bairro:<strong> {{ $row->bairro }} </strong></small></div>
                    <div class="col-md-12 col-12" id="rua">
                        <small> Rua:<strong> {{ $row->rua }}
                                , {{ $row->complemento }} {{ $row->numero }}</strong></small>
                    </div>
                    @if($row->referencia)
                        <div class="col-md-12 col-12" id="complemento">
                            <small> Referência:<strong> {{ $row->referencia }} </strong></small>
                        </div>
                    @elseif($row->referencia == false)
                        <div class="col-md-12 col-12" id="complemento">
                            <small> Referência:<strong> Não inserido* </strong></small>
                        </div>
                    @endif
                    <div class="col-md-12 col-12" id="cep"><small> CEP: <strong> {{ $row->cep }}</strong></small></div>
                    <form method="post" action="{{asset('/update_adress')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_adress" value="{{ $row->id }}">
                        <input type="hidden" name="bairro" value="{{ $row->bairro }}">
                        <input type="hidden" name="rua" value="{{ $row->rua }}">
                        <input type="hidden" name="complemento" value="{{ $row->complemento }}">
                        <input type="hidden" name="numero" value="{{ $row->numero }}">
                        <input type="hidden" name="referencia" value="{{ $row->referencia }}">
                        <input type="hidden" name="cep" value="{{ $row->cep }}">
                        <input type="submit" id="sendAdress" class="col-md-7 btn btn-primary"
                               value="Enviar para este endereço">
                        <a href="/delete_adress/{{ $row->id }}" class="col-md-2 btn btn-danger" id="deleteAdress"> <i
                                class="zmdi zmdi-delete"></i></a>
                    </form>
                </div>
            @endforeach
            <div class="col-md-4 col-12" id="infos">
                <div class="col-md-12 col-12" id="bairro"><small> Endereço: <strong> Restaurante </strong></small></div>
                <div class="col-md-12 col-12" id="bairro"><small> Bairro:<strong> Parangaba </strong></small></div>
                <div class="col-md-12 col-12" id="rua"><small> Rua:<strong> Não sei
                            , 118
                        </strong></small></div>
                <div class="col-md-12 col-12" id="complemento"><small> Referência:
                        <strong> Perto da caixa d'água </strong></small></div>
                <form method="post" action="{{asset('/store')}}">
                    {{ csrf_field() }}
                    <input type="submit" id="sendAdress" class="col-md-7 btn btn-primary"
                           value="Retirar no restaurante">
                </form>
            </div>
        </div>
        <hr style="width: 100% ;">


        <div class="d-flex justify-content-left h-100">
            <div class="container-login100">
                <div class="d-flex justify-content-center form_container">
                    <form method="post" id="addAdress" action="{{ asset('/add_adress')}}">
                        {{csrf_field()}}
                        <span class="form-title d-flex justify-content-center">
						Cadastrar novo endereço
                    </span>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="errors">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="input-group mb-2">
                                <input type="text" id="cepInput" name="cep" placeholder="CEP" class="form-control"
                                       autocomplete="off">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" name="bairro" id="bairroInput" placeholder="Bairro"
                                       class="form-control"
                                       autocomplete="off">
                                <input type="hidden" name="bairroHidden" id="bairroHidden" placeholder="Bairro"
                                       class="form-control"
                                       autocomplete="off">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" id="ruaInput" name="rua" placeholder="Rua" class="form-control"
                                       autocomplete="off">
                                <input type="hidden" id="ruaHidden" name="ruaHidden" placeholder="Rua"
                                       class="form-control"
                                       autocomplete="off">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" id="numberInput" name="number" placeholder="Número"
                                       class="form-control"
                                       autocomplete="off">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" id="complementoInput" name="complemento"
                                       placeholder="Complemento (opcional)"
                                       class="form-control" autocomplete="off">
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" id="referenciaInput" name="referencia"
                                       placeholder="Ponto de referência (opcional)"
                                       class="form-control" autocomplete="off">
                            </div>
                            <div class="input-group mb-2">
                                <button type="submit" name="submit" class="btn" id="btn">Finalizar cadastro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{ asset('js/adress.js') }}" type="text/javascript"></script>

</body>
</htmL>
