<htmL>
<head>
    <meta charset="utf-8">
    @section('title', 'Método de pagamento')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript" src=
    "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/payment.css')}}" rel="stylesheet">

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
        <span class="col-md-12 d-flex justify-content-left" id="newTitle">
            Escolha um método de pagamento
        </span>
            <span class="col-md-12 col-12"
                  id="text"> Escolha o método que você irá pagar, Cartão de crédito, débito ou dinheiro.</span>
            <small class="col-md-12 col-12"> Ao efetuar seu pedido, você concorda com a Notificação de Privacidade e as
                Condições
                de Uso da Pizzaria.com.br</small>
            <hr style="width: 100% ;">

            <div class="col-md-12 col-12">
                <table class="table table-responsive" id="tableCard">
                    <span id="msgMobile"> Arraste a tabela para o lado para mais informações </span>
                    <form action="{{ route('pay_post') }}" method="post">
                        <tr>
                            <th>Cartão</th>
                            <th>Parcelas</th>
                            <th>Nome no cartão</th>
                            <th>Data vencimento</th>
                            <th> #</th>
                        </tr>
                        {{ csrf_field() }}
                        @foreach($cards as $row)
                            <tr>
                                <td>
                                    <img src="{{ asset('img/icons8-mastercard-48.png') }}">(Crédito)
                                    <strong>MasterCard</strong> {{ $row->card_number }} <br>
                                </td>
                                <td>
                                    <select class="btn btn-info">
                                        <option> 1 x R$ 1118,59 sem juros</option>
                                        <option> 1 x R$ 1118,59 sem juros</option>
                                        <option> 1 x R$ 1118,59 sem juros</option>
                                        <option> 1 x R$ 1118,59 sem juros</option>
                                        <option> 1 x R$ 1118,59 sem juros</option>
                                    </select>
                                </td>
                                <td>{{ $row->card_name }}</td>
                                <td>{{ $row->card_date }}</td>

                                <input type="hidden" name="forma_pagamento" value="card">
                                <td><input type="submit" value="Pagar" class="btn btn-success"></td>
                            </tr>
                        @endforeach
                    </form>
                </table>
            </div>

            <div class="col-md-8 col-12" id="divForm">
                <div class="col-md-12 col-12">
                    <h3>Opções de pagamento</h3>
                </div>

                <form class="row" id="formCard" method="post" action="{{ asset('/add_card') }}">
                    {{ csrf_field() }}
                    <div class="col-md-12 col-12">
                        <h4> Adicionar cartão de crédito <img src="{{ asset('img/icons8-mastercard-48.png') }}"></h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger col-md-12 col-12">
                            <ul class="errors">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-6 col-12" id="divCardNumber">
                        <label for="cardNumber" class="col-md-12 col-12"> Número do cartão </label>
                        <input name="card_number" type="text" class="form-control" id="cardNumber">
                    </div>
                    <div class="col-md-3 col-12" id="divCardCCV">
                        <label for="cardCCV" class="col-md-12 col-12"> Código de 3 dígitos </label>
                        <input name="card_ccv" type="text" class="form-control" id="cardCCV">
                    </div>

                    <div class="col-md-3 col-12" id="divCardDate">
                        <label for="selectVencimento" class="col-md-12"> Vencimento </label>
                        <select id="selectVencimento" class="btn btn-info" name="card_date_month">
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                            <option value="11"> 11</option>
                            <option value="12"> 12</option>
                        </select>
                        <select class="btn btn-info" name="card_date_year">
                            <option value="2020"> 2020</option>
                            <option value="2021"> 2021</option>
                            <option value="2022"> 2022</option>
                            <option value="2023"> 2023</option>
                            <option value="2024"> 2024</option>
                            <option value="2025"> 2025</option>
                            <option value="2026"> 2026</option>
                            <option value="2027"> 2027</option>
                            <option value="2028"> 2028</option>
                            <option value="2029"> 2029</option>
                            <option value="2030"> 2030</option>
                            <option value="2031"> 2031</option>
                            <option value="2032"> 2032</option>
                            <option value="2033"> 2033</option>
                            <option value="2034"> 2034</option>
                            <option value="2035"> 2035</option>
                            <option value="2036"> 2036</option>
                            <option value="2037"> 2037</option>
                            <option value="2038"> 2038</option>
                            <option value="2039"> 2039</option>
                            <option value="2040"> 2040</option>
                            <option value="2041"> 2041</option>
                            <option value="2042"> 2042</option>
                            <option value="2043"> 2043</option>
                            <option value="2044"> 2044</option>
                            <option value="2045"> 2045</option>
                            <option value="2046"> 2046</option>
                            <option value="2047"> 2047</option>
                            <option value="2048"> 2048</option>
                            <option value="2049"> 2049</option>
                            <option value="2050"> 2050</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-12" id="divCardName">
                        <label for="cardName" class="col-md-12"> Nome do titular do cartão </label>
                        <input name="card_name" type="text" class="form-control" id="cardName">
                    </div>
                    <div class="col-md-6 col-12">
                        <button type="submit" class="btn" id="btnAdd"> Adicionar Cartão</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset('js/login.js') }}" type="text/javascript"></script>
@endsection
</body>
</htmL>
