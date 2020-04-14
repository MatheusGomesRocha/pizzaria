<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Home')
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
@extends('layout.template')

@section('content')
    <div id="all">
        <div class="container-fluid" id="imgMark">

        </div>

        <div class="container-fluid">
            <div class="row" id="divResAcc">
                <div class="col-md-8" id="infoRes">
                    <div id="texts" class="d-flex justify-content-center animated" style="visibility: hidden;">
                        <div class="col-md-3" id="phone">
                            <i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;
                            <span> (00) 12345-6789</span> <br>
                        </div>
                        <div class="col-md-3" id="adress">
                            <i class="fas fa-road"></i>&nbsp;&nbsp;&nbsp;
                            <span> Avenida São Paulo, 66</span>
                        </div>
                        <div class="col-md-3" id="time">
                            <i class="fas fa-clock"></i>&nbsp;&nbsp;&nbsp;
                            <span> Aberto Segunda à Sexta</span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span align="center">8:00 - 22:00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" id="accounts">
                    <div class="d-flex justify-content-center animated" id="textSocial" style="visibility: hidden">
                        <div class="col-md-3" id="insta">
                            <a id="instagram">Intagram</a>
                        </div>
                        <div class="col-md-3">
                            <a>Facebook</a>
                        </div>
                        <div class="col-md-3">
                            <a>twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="all2">
        <div class="row" id="divImgText">
            <div class="col-md-6" id="divImgRestaurant">
                <img class="img-fluid" id="imgRestaurant" src="{{ asset('img/restaurante.jpg') }}">
            </div>
            <div class="col-md-6" id="divTextRestaurant">
                <h3 id="title" class="d-flex justify-content-center col-md-12 animated">WELCOME TO PIZZA A
                    RESTAURANT</h3>
                <span class="d-flex justify-content-center col-md-12 animated" id="textRestaurant">
                        On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</span>
            </div>
        </div>
    </div>

    <!-- ÁREA DE SERVIÇOS -->

    <div class="container-fluid" id="services">
        <div class="row">
            <h1 id="servTitle" class="col-md-12 d-flex justify-content-center animated"> Nossos Serviços </h1>
            <div id="servText" class="col-md-12 d-flex justify-content-center animated">Far far away, behind the word
                mountains,
                far from the countries Vokalia and Consonantia, there live the blind texts.
            </div>
            <div id="pizza" class="content1 col-md-4 d-flex justify-content-center animated">
                <div><i class="fas fa-pizza-slice" id="iPizza"> </i></div>
            </div>
            <div id="chips" class="content1 col-md-4 d-flex justify-content-center animated">
                <div><i class="fas fa-hamburger" id="iChips"> </i></div>
            </div>
            <div id="drink" class="content1 col-md-4 d-flex justify-content-center animated">
                <div><i class="fas fa-cocktail" id="iDrink"> </i></div>
            </div>

            <div id="pizzaTitle" class="content1 col-md-4 d-flex justify-content-center animated">
                <h2> A melhor pizza da região </h2>
            </div>
            <div id="chipsTitle" class="content1 col-md-4 d-flex justify-content-center animated">
                <h2> Salgados variados </h2>
            </div>
            <div id="drinkTitle" class="content1 col-md-4 d-flex justify-content-center animated">
                <h2> Bebidas </h2>
            </div>

            <div id="pizzaText" class="content1 col-md-4 d-flex justify-content-center animated">
                <p> Even the all-powerful Pointing has no control about the blind texts it is an almost
                    unorthographic. </p>
            </div>
            <div id="chipsText" class="content1 col-md-4 d-flex justify-content-center animated">
                <div> Even the all-powerful Pointing has no control about the blind texts it is an almost
                    unorthographic.
                </div>
            </div>
            <div id="drinkText" class="content1 col-md-4 d-flex justify-content-center animated">
                <div> Even the all-powerful Pointing has no control about the blind texts it is an almost
                    unorthographic.
                </div>
            </div>
        </div>
    </div>

    <!-- ÁREA DE PRODUTOS -->

    <div id="all3" class="container-fluid">

        <h1 id="menuTitle" class="col-md-12 d-flex justify-content-center animated"> HOT PIZZA MEALS </h1>
        <div id="menuText" class="col-md-12 d-flex justify-content-center animated">Far far away, behind the word
            mountains, far
            from the countries Vokalia and Consonantia, there live the blind texts.
        </div>

        <div id="menu" class="row animated">
            @foreach($products as $row)
                <div class="row col-md-4">
                    <div class="col-md-6" id="divImg">
                        <img src="{{ url("storage/products/{$row->img}") }}" id="imgProduct">
                    </div>
                    <div class="col-md-6" id="productText">
                        <span class="col-md-12" id="productName">{{ $row->type }} {{ $row->name }}</span>
                        <p class="col-md-12" id="productComment">Far far away, behind the word mountains, far from the
                            countries Vokalia
                            and
                            Consonantia</p>
                        <div class="col-md-12">
                            <span class="col-md-6" id="productPrice"> R$ {{ $row->price_md }}</span>
                            <button class="btn col-md-6" id="btnPedir"> Pedir</button>
                        </div>
                    </div>
                </div>
            @endforeach
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
<script src="{{ asset('js/style.js') }}" type="text/javascript"></script>
</body>
</html>
