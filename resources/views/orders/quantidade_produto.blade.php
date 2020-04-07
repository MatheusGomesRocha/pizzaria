<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Quantidade')
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
                    Alteração de quantidade
                </span>
        <span class="col-md-12" id="text"> Altere aqui a quantidade de produtos do seu pedido </span>
        <small class="col-md-12"> Ao efetuar seu pedido, você concorda com a Notificação de Privacidade e as
            Condições
            de Uso da Pizzaria.com.br
        </small>
        <div class="col-md-12" align="left" id="left">
            <form method="post" action="{{ asset('/alterarQtd') }}" id="qtdCart">
                {{ csrf_field() }}
                <input type="hidden" name="order_id" value="{{ $row->order_id }}">
                <table class="table">
                    <thead>
                    <tr id="title">
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Entrega</th>
                        <th>Alterar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="body">
                        <td> {{ $row->type }} {{ $row->product_name }}
                            <br><small><strong>Tamanho: {{$row->size}}</strong></small>
                            <br><small><strong>Fração: {{$row->fraction}}</strong></small>
                            @if($row->borda)
                                <br><small><strong>Borda: {{$row->borda}}</strong></small>
                            @endif
                        </td>
                        <td>
                            <button data-action="decrease" id="qtdLess" class="btn btn-info">-</button>
                            <input type="text" value="{{ $row->quantidade }}" placeholder="{{$row->quantidade }}"
                                   id="qtdEdit" disabled>
                            <input type="hidden" value="{{ $row->quantidade }}" name="qtdValue" id="qtdValue">
                            <button data-action="increase" id="qtdMore" class="btn btn-info">+</button>
                        </td>
                        <td> R$ {{ $row->price }}</td>
                        <td> Calcular com CEP</td>
                        <td><input type="submit" class="btn btn-success" value="Finalizar alteração"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
@endsection

</body>
</html>
