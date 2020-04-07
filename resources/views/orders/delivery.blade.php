<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Pedidos entregues')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="{{asset('css/users.css')}}">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">


</head>
<body>
@extends('layout.template')

@section('content')
    <div class="container" id="divAll">
        <table class="table table-striped " id="tableUsers">
            <tr id="th">
                <th class="text-danger"> Nº pedido</th>
                <th class="text-danger"> Tipo</th>
                <th class="text-danger"> Produto</th>
                <th class="text-danger"> Tamanho</th>
                <th class="text-danger"> Fração</th>
                <th class="text-danger"> Quantidade</th>
                <th class="text-danger"> Preço</th>
                <th class="text-danger"> Entrega</th>
                <th class="text-danger"> Pagamento</th>
                <th class="text-danger"> Status</th>
            </tr>
            @foreach($query as $row)

                <tr id="td">
                    <td>{{ $row->order_id }}</td>
                    <td>{{ $row->type }}</td>
                    <td>{{ $row->product_name }}</td>
                    <td>{{ $row->size }}</td>
                    <td>{{ $row->fraction }}</td>
                    <td>{{ $row->quantidade }}</td>
                    <td>R$ {{ number_format($row->price, '2', '.', '0') }}</td>
                    <td>
                        <button class="btn btn-primary"> Endereço </button>
                    </td>
                    @if($row->forma_pagamento == 0)
                        <td class="text-warning"> Pendente </td>
                    @endif
                    @if($row->forma_pagamento == 1)
                        <td class="text-success"> Confirmado </td>
                    @endif
                    @if($row->entregue == 0)
                        <td class="text-warning"> Pendente </td>
                    @endif
                    @if($row->entregue == 1)
                        <td class="text-success"> Entregue </td>
                    @endif
                </tr>
            @endforeach

        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

</body>
</html>
