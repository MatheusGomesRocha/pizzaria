@extends('layout.template')

@section('title', 'Home')

<link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
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




@section('content')
    <div id="allHome">
        <div class="container-fluid" id="imgMark">
            <img id="imgPromo" class="img-fluid" src="{{ asset('img/promoção1.jpg') }}">
        </div>
    </div>

    <div class="container-fluid" id="allHome2">
        <div class="container">
            <div class="row" id="divImgText">
                <div class="col-md-6 col-12" id="divImgRestaurant">
                    <img class="img-fluid d-flex justify-content-center" id="imgRestaurant"
                         src="{{ asset('img/restaurante.jpg') }}">
                </div>
                <div class="col-md-6" id="divTextRestaurant">
                    <h3 id="title" class="d-flex justify-content-center col-md-12 animated" style="visibility: hidden;">
                        WELCOME TO PIZZA A
                        RESTAURANT</h3>
                    <span class="d-flex justify-content-center col-md-12 animated" id="textRestaurant"
                          style="visibility: hidden;">
                        On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would
                        be the word "and" and the Little Blind Text should turn around and return to its own, safe
                        country. But nothing the copy said could convince her and so it didn’t take long until a few
                        insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into
                        their agency, where they abused her for their.
                    </span>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <!-- ÁREA DE SERVIÇOS -->

    <div class="container-fluid" id="services">
        <div class="container">
            <div class="row">
                <h1 id="servTitle" class="col-md-12 d-flex justify-content-center animated"> Nossos Serviços </h1>
                <div id="servText" class="col-md-12 d-flex justify-content-center animated">Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Vivamus varius.
                </div>
                <div class="col-md-4">
                    <div id="pizza" class="content1 col-md-12 d-flex justify-content-center animated">
                        <div><i class="fas fa-pizza-slice" id="iPizza"> </i></div>
                    </div>
                    <div id="pizzaTitle" class="content1 col-md-12 d-flex justify-content-center animated">
                        <h2> A melhor pizza da região </h2>
                    </div>
                    <div id="pizzaText" class="content1 col-md-12 d-flex justify-content-center animated">
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus varius. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="chips" class="content1 col-md-12 d-flex justify-content-center animated">
                        <div><i class="fas fa-hamburger" id="iChips"> </i></div>
                    </div>
                    <div id="chipsTitle" class="content1 col-md-12 d-flex justify-content-center animated">
                        <h2> Sanduíches variados </h2>
                    </div>
                    <div id="chipsText" class="content1 col-md-12 d-flex justify-content-center animated">
                        <div> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus varius.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="drink" class="content1 col-md-12 d-flex justify-content-center animated">
                        <div><i class="fas fa-cocktail" id="iDrink"> </i></div>
                    </div>
                    <div id="drinkTitle" class="content1 col-md-12 d-flex justify-content-center animated">
                        <h2> Bebidas </h2>
                    </div>
                    <div id="drinkText" class="content1 col-md-12 d-flex justify-content-center animated">
                        <div> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus varius.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ÁREA DE UM PEQUENO CARDÁPIO MOSTRANDO AS PIZZAS -->

    <div id="allHome3" class="container-fluid">
        <hr>
        <h1 id="home3Title" class="col-md-12 col-12 d-flex justify-content-center animated"> PRODUTOS MAIS
            PEDIDOS </h1>
        <div id="home3Text" class="col-md-12 col-12 d-flex justify-content-center animated">Lorem ipsum dolor sit
            amet,
            consectetur adipiscing elit. Vivamus varius.
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <a class="btn" id="btnCardapio" href="{{ route('cardapio') }}"> Ver cardápio</a>
        </div>

        <div class="row" id="divAllChild">
            <div id="btns">
                <button class="btn" id="btnPizza" onclick="pizza()"> Pizza</button>
                <button class="btn" id="btnBurger" onclick="burger()"> Burger</button>
                <button class="btn" id="btnDrink" onclick="drink()"> Drink</button>
            </div>

            <div class="col-md-12" id="divPizza">
                @foreach($pizza_limit as $row)
                    <div class="col-md-3" id="divFilhaPizza">
                        <img class="img-fluid col-md-12 d-flex justify-content-center"
                             src="{{ url("storage/products/{$row->img}") }}" id="imgPizza">
                        <div class="col-md-12 d-flex justify-content-center" id="nameProduct">
                            {{ $row->name }}
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="descriptionProduct">
                            <div class="col-md-6">{{ $row->description }}</div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="priceProduct">
                            R$ {{ $row->price_md }}
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="btnProduct">
                            <a id="btnPedir" style="margin-top: 20px" class="btn"
                               href="{{ asset("product/id={$row->id}") }}">
                                Pedir
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-12" id="divBurger">
                @foreach($burger_limit as $row)
                    <div class="col-md-3" id="divFilhaBurger">
                        <img class="img-fluid col-md-12 d-flex justify-content-center"
                             src="{{ url("storage/products/{$row->img}") }}" id="imgBurger">
                        <div class="col-md-12 d-flex justify-content-center" id="nameProduct1">
                            {{ $row->name }}
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="descriptionProduct1">
                            <div class="col-md-6">{{ $row->description }}</div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="priceProduct1">
                            R$ {{ $row->price }}
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="btnProduct">
                            <a id="btnPedir" style="margin-top: 20px" class="btn"
                               href="{{ asset("product/id={$row->id}") }}">
                                Pedir
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-12" id="divDrink">
                @foreach($drink_limit as $row)
                    <div class="col-md-3" id="divFilhaDrink">
                        <img class="img-fluid col-md-12 d-flex justify-content-center"
                             src="{{ url("storage/products/{$row->img}") }}" id="imgDrink">
                        <div class="col-md-12 d-flex justify-content-center" id="nameProduct1">
                            {{ $row->name }}
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="descriptionProduct1">
                            <div class="col-md-6">{{ $row->description }}</div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="priceProduct1">
                            R$ {{ $row->price }}
                        </div>
                        <div class="col-md-12 d-flex justify-content-center" id="btnProduct">
                            <a id="btnPedir" style="margin-top: 20px" class="btn"
                               href="{{ asset("product/id={$row->id}") }}">
                                Pedir
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>





    <div id="allHome4" class="container-fluid">

    </div>

@endsection

<script src="{{ asset('js/style.js') }}" type="text/javascript"></script>


