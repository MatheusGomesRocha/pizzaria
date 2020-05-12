<htmL>
<head>
    <meta charset="utf-8">
    @section('title', 'Finalizar pedido')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src=
    "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/finish_order.css')}}" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>

</head>
<body>
@extends('layout.template')

@section('content')
    <div class="container" style="padding: 25px;">
        <div class="row">
            <div class="col-md-8" id="finishPedido">
                <div class="row" id="title">
                <span class="col-md-12" id="newTitle">
                    Finalize seu pedido
                </span>
                    <span class="col-md-12" id="text"> Confira seu pedido e finalize-o. </span>
                    <small class="col-md-12"> Ao efetuar seu pedido, você concorda com a Notificação de Privacidade e as
                        Condições
                        de Uso da Pizzaria.com.br
                    </small>
                </div>
                <div class="container row" id="content">
                    @if($row->forma_entrega == 'delivery')

                        <div class="col-md-6" style="width: 100%;">
                            <div class="col-md-12" id="adressDelivery"><strong> Endereço de entrega </strong>
                                <small>
                                    <a href="{{ asset('/custom_adress') }}" id="btnAlterar"> Alterar </a>
                                </small>
                            </div>
                            <div class="col-md-12" id="finishBairro">
                                <small>Bairro:<strong>{{$row->bairro}}</strong></small>
                            </div>
                            <div class="col-md-12" id="finishRua"><small> Rua:<strong> {{ $row->rua }}
                                        , {{ $row->complemento }} {{ $row->numero }}
                                    </strong></small></div>
                            <div class="col-md-12" id="finishComplemento"><small> Referência:
                                    <strong> {{ $row->referencia }} </strong></small></div>
                            <div class="col-md-12" id="finishCep"><small> CEP: <strong> {{ $row->cep }}</strong></small>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6" id="methodPayment">
                        <div class="col-md-12" id="adressDelivery"><strong> Método de pagamento </strong>
                            <small>
                                <a href="{{ asset('/payment') }}" id="btnAlterar"> Alterar </a>
                            </small>
                        </div>
                        <div class="col-md-12" id="adressCard"><small><strong>Endereço do cartão de
                                    crédito </strong></small></div>
                        <div class="col-md-12" id="finishBairro"><small> Matheus Gomes</small>
                        </div>
                        <div class="col-md-12" id="finishRua"><small> {{ $adress->rua }}, {{ $adress->numero }} </small>
                        </div>
                        <div class="col-md-12" id="finishComplemento"><small> {{ $adress->bairro }} </small></div>
                        <div class="col-md-12" id="finishCep"><small> Fortaleza - CE </small></div>
                        <div class="col-md-12" id="finishCep"><small> {{ $adress->cep }} </small></div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="infoPrice">
                <div class="row">
                    <h3 class="col-md-12"><strong> Resumo do Pedido </strong></h3>
                    <span class="col-md-6" align="left"> Quantidade: {{ $count }}</span>
                    <span class="col-md-6"
                          align="right"> R$ {{ number_format($subtotal, '2', ',', '.') }}</span>
                    <br>
                    @if($row->forma_entrega == 'delivery')
                        <span class="col-md-6" align="left"> Frete </span>
                        <span class="col-md-6" align="right"> R$ 5,00 </span>
                    @endif
                </div>
                <hr>
                <div class="row">
                    <span class="col-md-8" align="left" id="total"><strong> Total do pedido: </strong></span>
                    <span class="col-md-4" align="right"
                          id="total"><strong>
                            @if ($row->forma_entrega == 'delivery')
                                R$ {{ number_format($subtotal + 5, '2', ',', '.') /* PEDIDO TOTAL COM FRETE */}}
                            @endif
                            @if ($row->forma_entrega == 'restaurant')
                                R$ {{ number_format($subtotal, '2', ',', '.') }}
                            @endif
                        </strong></span>
                </div>
                <hr>
                <a href="#" class="btn btn-primary col-md-12" id="btn">Finalizar Pedido</a>

            </div>
        </div>
        @foreach($orders as $row)
            <div class="row">
                <div class="col-md-12" id="infoOrder">
                    <div class="col-md-12" id="product_name">
                        <strong>
                            {{ $row->type }}  {{ $row->size }}{{ $row->product_name }}
                        </strong>
                    </div>
                    <div class="col-md-12" id="product_price">
                        <span> R$ {{ number_format($row->product_price, '2', ',', '0') }}</span>
                    </div>
                    <div class="col-md-12" id="product_qtd">
                        <strong> quantidade: </strong>
                        <span> {{ $row->quantidade }}</span>
                        <a href="/quantidade/{{$row->order_id }}"> Alterar </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

@endsection
</body>
</htmL>
