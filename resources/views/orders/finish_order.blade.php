@section('title', 'Finalizar pedido')

<link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{ asset('css/finish_order.css')}}" rel="stylesheet">
<link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{ asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layout.template')

@section('content')

    <div class="container" id="allFinishOrder">
        <div class="row" id="insideFinishOrder">
            <span class="col-md-12 col-12" id="newTitleOrder">
                    Finalize seu pedido
                </span>
            <span class="col-md-12 col-12" id="textOrder"> Confira seu pedido e finalize-o. </span>
            <small class="col-md-12 col-12">
                Ao efetuar seu pedido, você concorda com a Notificação de Privacidade e as Condições
                de Uso da Pizzaria.com.br
            </small>
        </div>

        <div class="row">
            <div class="col-md-7" id="content">
                <div class="col-md-6" style="float: left" id="infoAdress">
                    <div class="col-md-12">
                        <strong> Endereço de entrega</strong>
                    </div>
                    <div class="col-md-12">
                        <span> Bairro: </span><strong> {{ $order->bairro }}</strong>
                    </div>
                    <div class="col-md-12">
                        <span> Rua: </span><strong> {{ $order->rua }}, {{ $order->numero }}</strong>
                    </div>
                    <div class="col-md-12">
                        <span> Referência: </span><strong> {{ $order->referencia }}</strong>
                    </div>
                    <div class="col-md-12">
                        <span> CEP: </span><strong> {{ $order->cep }}</strong>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('adress') }}"> Alterar </a>
                    </div>
                </div>

                <div class="col-md-6" style="float: right" id="infoCard">
                    <div class="col-md-12">
                        <strong> Método de pagamento </strong> <br>
                        <img src="{{ asset('img/icons8-mastercard-48.png') }}">(Crédito)
                        <strong>MasterCard</strong>
                    </div>
                    <div class="col-md-12">
                        <span> Nome cartão </span><strong> Matheus Gomes </strong>
                    </div>
                    <div class="col-md-12">
                        <span> Número cartão </span><strong> 1234 5678 9014 7896 </strong>
                    </div>
                    <div class="col-md-12">
                        <span> Validade </span><strong> 09/26 </strong>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('payment') }}"> Alterar </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12" id="infoPriceDesk">
                <div class="col-md-12">
                    <h3><strong> Resumo do Pedido </strong></h3>
                </div>
                <div class="col-md-12" id="orderCount">
                    <span id="qtd" style="float: left; width: auto"> Quantidade: {{ $count }} </span>
                    <span id="subtotal" style="float: right"> R$ {{ number_format($subtotal, '2', ',', '0') }} </span>
                </div>
                <br>
                <div class="col-md-12" id="orderFrete">
                    <span id="frete"> Frete: </span>
                    <span id="freteValue"> R$ 5,00 </span>
                </div>
                <br>
                <div class="col-md-12" id="orderPrice">
                    <strong id="orderTotal"> Total do pedido: </strong>
                    <span
                        id="orderValue"> <strong> R$ {{ number_format($subtotal + 5, '2', ',', '0') }} </strong></span>
                </div>
                <div class="col-md-12" id="divSubmitOrder">
                    <input type="submit" id="submitOrder" class="col-md-12 btn btn-primary" value="Finalizar Pedido">
                </div>
            </div>

            @foreach($query as $row)
                <div class="col-md-12" id="infoOrder">
                    <div class="col-md-12" id="productName">
                        <strong> {{ $row->type }} {{ $row->size }} {{ $row->name }}</strong>
                    </div>
                    <div class="col-md-12" id="productPrice">
                        <span> R$ {{ number_format($row->product_price, '2', ',', '0') }}</span>
                    </div>
                    <div class="col-md-12" id="qtdAlterar">
                        <strong> Quantidade: {{ $row->quantidade }} </strong>
                        <a href="{{ route('cart') }}"> Alterar </a>
                    </div>
                </div>
            @endforeach

            <div class="col-md-4 col-12" id="infoPriceMobile">
                <div class="col-md-12">
                    <h3><strong> Resumo do Pedido </strong></h3>
                </div>
                <div class="col-md-12" id="orderCount">
                    <span id="qtd" style="float: left; width: auto"> Quantidade: {{ $count }} </span>
                    <span id="subtotal" style="float: right"> R$ {{ number_format($subtotal, '2', ',', '0') }} </span>
                </div>
                <br>
                <div class="col-md-12" id="orderFrete">
                    <span id="frete"> Frete: </span>
                    <span id="freteValue"> R$ 5,00 </span>
                </div>
                <br>
                <div class="col-md-12" id="orderPrice">
                    <strong id="orderTotal"> Total do pedido: </strong>
                    <span
                        id="orderValue"> <strong> R$ {{ number_format($subtotal + 5, '2', ',', '0') }} </strong></span>
                </div>
                <div class="col-md-12" id="divSubmitOrder">
                    <input type="submit" id="submitOrder" class="col-md-12 btn btn-primary" value="Finalizar Pedido">
                </div>
            </div>
        </div>
    </div>

@endsection

