<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Carrinho')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{asset('css/cart.css')}}" rel="stylesheet">
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
    <div class="row container-fluid" id="fatherDiv">
                <span class="col-md-12" id="newTitle">
                    Carrinhos de compras
                </span>
        <span class="col-md-12" id="text"> Confira seu pedido e altere a quantidade se necessário. </span>
        <small class="col-md-12"> Ao efetuar seu pedido, você concorda com a Notificação de Privacidade e as
            Condições
            de Uso da Pizzaria.com.br
        </small>
        <div class="col-md-8" align="left" id="left">
            <form method="post" action="" id="qtdCart">

            <table class="table">
                <thead>
                <tr id="title">
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Entrega</th>
                    <th>Total</th>
                    <th>#</th>
                </tr>
                </thead>
                @foreach($orders as $row)
                    <tbody>
                    <tr id="body">
                        <td> {{ $row->type }} {{ $row->product_name }}
                            <br><small><strong>Tamanho: {{$row->size}}</strong></small>
                            <br><small><strong>Fração: {{$row->fraction}}</strong></small>
                            @if($row->borda)
                                <br><small><strong>Borda: {{$row->borda}}</strong></small>
                            @endif
                        </td>
                            <td> {{ $row->quantidade }} </td>
                            <td> R$ {{ $row->price }}</td>
                            <td> Calcular com CEP</td>
                            <td>
                                R$ {{ $valor = number_format(intval($row->price) * $row->quantidade, '2', ',', '0') }}</td>
                            <td>
                                <a class="btn btn-danger" href="/delete_order/{{$row->order_id}}"> Remover</a>
                            </td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3" id="rightDiv">
            <div class="row">
                <h2 class="col-md-12"><strong> Resumo do Pedido </strong></h2>
                <span class="col-md-6" align="left"> Produtos: {{ $count }}</span>
                <span class="col-md-6" align="right"> R$ {{ number_format($subtotal, '2', ',', '.') }} </span>
                <br>
                <span class="col-md-6" align="left"> Frete </span>
                <span class="col-md-6" align="right"> R$ 5,00 </span>
            </div>
            <hr>
            <div class="row">
                <span class="col-md-6" align="left" id="total"><strong> Total </strong></span>
                <span class="col-md-6" align="right" id="total">
                <strong> R$ {{ number_format($subtotal + 5, '2', ',', '0') }} </strong>
            </span>
            </div>
            <hr>
            <a href="{{asset('/custom_adress')}}" class="btn btn-success col-md-12" id="btn"><img
                    src="{{ asset('img/supermarket.png')}}"> &nbsp;Continuar
            </a>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
@endsection

</body>
</html>
