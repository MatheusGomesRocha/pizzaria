@extends('layout.template')
@section('title', 'Carrinho')

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



@section('content')
    <div class="container" id="divAllCart">
        <div class="row">
        <span class="col-md-12" id="titleCart">
            Carrinhos de compras
        </span>
            <span class="col-md-12" id="titleCart">
                Seu carrinho de compras possui {{ $count }} pedidos pendentes
            </span>
            <span class="col-md-12" id="text"> Confira seu pedido e altere a quantidade se necessário. </span>
            <small class="col-md-12"> Ao efetuar seu pedido, você concorda com a Notificação de Privacidade e as
                Condições
                de Uso da Pizzaria.com.br
            </small>
            <hr style="width: 100% ;">

            <div class="col-md-8 col-12" id="divTableCart">
                <table class="table table-responsive-sm" width="100%" id="tableCart">
                    <tr id="theadCart">
                        <span id="msgMobile"> Arraste a tabela para o lado para mais informações </span>
                        <th width="80"> Imagem</th>
                        <th> Pedido</th>
                        <th> Quantidade</th>
                        <th> Preço unitário</th>
                        <th> Preço total</th>
                        <th> #</th>
                    </tr>
                    @foreach($orders as $row)
                        <tr id="tbodyCart">
                            <td width="80"><img id="productImg" class="img-fluid"
                                                src='{{ url("storage/products/{$row->img}") }}'></td>
                            <td id="productNameCart"> {{ $row->type }} {{ $row->name }} - {{ $row->size }}</td>
                            <td id="productQtdCart"> {{ $row->quantidade }} </td>
                            <td> R$ {{ number_format($row->product_price, '2', ',', '0') }} </td>
                            <td>
                                R$ {{ number_format(intval($row->product_price * $row->quantidade), '2', ',', '0') }} </td>
                            <td>
                                <a class="btn btn-danger" href="{{ asset("/delete_order/{$row->order_id}") }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>


            <div class="col-md-4 col-12" id="divPriceCart">
                <form method="post" action="{{ route('cart_submit') }}" id="formCart">
                    {{ csrf_field() }}
                    <div class="col-md-12 col-12">
                        <strong>Frete: </strong> R$ 5,00
                    </div>
                    <div class="col-md-12 col-12">
                        <strong>Subtotal ({{ $count }}
                            itens): </strong> R$ {{ number_format($subtotal + 5, '2', ',', '0') }}
                    </div>
                    <div class="col-md-12 col-12">
                        <input type="submit" class="btn btn-success" value="Fechar pedido" id="cartInsert">
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

<script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
