<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Pedidos')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{asset('css/orders_user.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
@extends('layout.template')

@section('content')
    <div class="container row " id="wrapperOrders">
        <span class="col-md-12" id="titleMyOrders"> Meus Pedidos </span>
        @forelse($query as $row)
            <div id="ordersUser" class="col-md-12 col-12">
                <div id="contentTop" class="col-md-12 col-12">
                    <div class="row" id="contentTopIn">
                        <div id="inline" class="col-md-2 col-4">
                            <span id="order"><strong>Pedido realizado: </strong></span><br>
                            <span id="userDate">{{ date('d/m/Y H:i', strtotime($row->created_at)) }}</span>
                        </div>
                        <div id="inline" class="col-md-2 col-4">
                            <span id="price"><strong>Total: </strong></span><br>
                            <span
                                id="userPrice"> R$ {{ number_format(intval($row->product_price) * $row->quantidade + 5, '2', ',', '.') }}</span>
                        </div>
                        <div id="inline" class="col-md-2 col-4">
                            <span id="send"><strong>Enviado para: </strong></span><br>
                            <span id="userName">{{ $user->name }}</span>
                        </div>
                        <div id="inline" class="col-md-2 col-4">
                            <span id="orderID"><strong>Pedido Nº: </strong> {{ $row->order_id }}</span>
                        </div>
                        <div id="inline" class="col-md-2 col-4">
                            <span id="stats"><strong>Situação: </strong></span> <br>
                            @if($row->status == 'pendente')
                                <span class="text text-yellow">{{ $row->status }}</span>
                            @elseif($row->status == 'confirmado')
                                <span class="text text-success">{{ $row->status }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="contentBottom">
                    <div class="row" id="contentBottomIn">
                        @if($row->status == 'entregue')
                            <div class="col-md-12 " id="inline">
                                <span id="entregue" class="col-md-12">
                                    Entregue {{ date('d/m/Y H:i', strtotime($row->updated_at)) }}
                                </span>
                            </div>
                        @endif
                        <div class="col-md-12" id="infoOrder">
                            <div class="col-md-12" id="product_name">
                                <strong> Tipo: </strong> {{ $row->type }} <br>
                                <strong> Tamanho: </strong> {{ $row->size }} <br>
                                <strong> Sabor: </strong> {{ $row->name }} <br>
                            </div>
                            <div class="col-md-12" id="product_name">
                                <strong> Valor unitário:</strong>
                                <span
                                    id="product_price"> R$ {{ number_format($row->product_price, '2', ',', '0') }}</span><br>
                                <strong> Quantidade: </strong> {{ $row->quantidade }}

                            </div>
                            @if($row->status == 'pendente')
                                <div class="col-md-12" id="btnBuyDiv">
                                    <a href="{{ route('cart') }}" id="btnBuyLink"
                                       class="btn btn-primary"> Finalizar compra </a>
                                </div>
                            @elseif($row->status == 'confirmado')
                                <div class="col-md-12" id="btnBuyDiv">
                                    <a href="{{ asset("/product/id={$row->product_id}") }}" id="btnBuyLink"
                                       class="btn btn-primary"> Comprar novamente </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div id="ordersUser" class="col-md-12">
                <h1> Você ainda não confirmou nenhum pedido </h1>
                <div id="contentTop" class="col-md-12">
                    <div class="row" id="contentTopIn">
                        <div id="inline" class="col-md-4">
                            <span id="order"><strong>Pedido realizado: </strong></span><br>
                            <span id="userDate"></span>
                        </div>
                        <div id="inline" class="col-md-4">
                            <span id="price"><strong>Total: </strong></span><br>
                            <span id="userPrice"></span>
                        </div>
                        <div id="inline" class="col-md-4">
                            <span id="send"><strong>Enviado para: </strong></span><br>
                            <span id="userName"></span>
                        </div>
                        <div id="inline" class="col-md-4">
                            <span id="orderID"><strong>Pedido Nº: </strong></span>
                        </div>
                        <div id="inline" class="col-md-4">
                            <span id="stats"><strong>Situação: </strong></span> <br>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="contentBottom">
                    <div class="row" id="contentBottomIn">
                        <div class="col-md-12 " id="inline">
                        <span id="entregue"
                              class="col-md-12"> </span>
                        </div>
                        <div class="col-md-12" id="infoOrder">
                            <div class="col-md-12" id="product_name">
                                <strong> Tipo: </strong> <br>
                                <strong> Tamanho: </strong> <br>
                                <strong> Sabor: </strong> <br>
                            </div>
                            <div class="col-md-12" id="product_name">
                                <strong> Valor unitário:</strong>
                                <span id="product_price"> </span><br>
                                <strong> Quantidade: </strong>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="col-md-12 mt-4">{{ $query->links() }}</div>
    </div>
@endsection
</body>
</html>
