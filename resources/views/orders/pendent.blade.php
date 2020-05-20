<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Pedidos pendentes')
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
        <table class="table table-responsive table-striped" id="tableUsers">
            <tr id="th">
                <th class="text-danger"> ID usuário </th>
                <th class="text-danger"> Nº pedido </th>
                <th class="text-danger"> Pedido </th>
                <th class="text-danger"> Preço </th>
                <th class="text-danger"> Endereço </th>
                <th class="text-danger"> Status </th>
            </tr>
            @foreach($query as $row)

                <tr id="td">
                    <td>{{ $row->order_user_id }}</td>
                    <td>{{ $row->num_pedido }}</td>
                    <td>{{ $row->order_name }}</td>
                    <td>R$ {{ number_format($row->order_price, '2', ',', '.') }}</td>
                    <td>
                        @if($row->forma_entrega == 'delivery')
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo{{$row->adress}}">
                                Endereço
                            </button>
                            <div class="modal fade" id="modalExemplo{{$row->adress}}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-body" style="text-align: left">
                                                <strong class="col-md-12"> Cep: </strong> {{ $row->cep }} <br>
                                                <strong class="col-md-12"> Bairro: </strong> {{ $row->bairro }} <br>
                                                <strong class="col-md-12"> Rua: </strong> {{ $row->rua }} <br>
                                                <strong class="col-md-12"> Número: </strong> {{ $row->numero }} <br>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($row->forma_entrega == 'restaurant')
                            Restaurante
                        @endif
                    </td>
                    @if($row->status == 'pendente')
                        <td class="text-warning"> Pendente </td>
                    @elseif($row->status == 'confirmado')
                        <td class="text-success"> Confirmado </td>
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
