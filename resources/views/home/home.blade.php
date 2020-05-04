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

        </div>

        <div class="container-fluid">
            <div class="row" id="divResAcc">
                <div class="col-md-8 col-12" id="infoRes">
                    <div id="texts" class="d-flex justify-content-center animated" style="visibility: hidden;">
                        <div class="col-md-3 col-4" id="phone">
                            <i class="fas fa-phone" id="iPhone"></i>&nbsp;&nbsp;&nbsp;
                            <span> (11) 11111-1111 </span>
                        </div>
                        <div class="col-md-3 col-4" id="adress">
                            <i class="fas fa-road" id="iAdress"></i>&nbsp;&nbsp;&nbsp;
                            <span> Avenida São Paulo, 66</span>
                        </div>
                        <div class="col-md-3 col-4" id="time">
                            <i class="fas fa-clock" id="iTime"></i>&nbsp;&nbsp;&nbsp;
                            <span> Segunda à Sexta</span><br>
                            <span id="horarioTime">8:00 - 22:00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12" id="accounts">
                    <div class="d-flex justify-content-center animated" id="textSocial" style="visibility: hidden">
                        <div class="col-md-3 col-3" id="insta">
                            <a id="instagram">Intagram</a>
                        </div>
                        <div class="col-md-3 col-3">
                            <a>Facebook</a>
                        </div>
                        <div class="col-md-3 col-3">
                            <a>twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="allHome2">
        <div class="row" id="divImgText">
            <div class="col-md-6 col-12" id="divImgRestaurant">
                <img class="img-fluid" id="imgRestaurant" src="{{ asset('img/restaurante.jpg') }}">
            </div>
            <div class="col-md-6" id="divTextRestaurant">
                <h3 id="title" class="d-flex justify-content-center col-md-12 animated">WELCOME TO PIZZA A
                    RESTAURANT</h3>
                <span class="d-flex justify-content-center col-md-12 animated" id="textRestaurant">
                        On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.
                </span>
            </div>
        </div>
    </div>

    <!-- ÁREA DE SERVIÇOS -->

    <div class="container-fluid" id="services">
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

    <!-- ÁREA DE UM PEQUENO CARDÁPIO MOSTRANDO AS PIZZAS -->

    <div id="allHome3" class="container-fluid">

        <h1 id="home3Title" class="col-md-12 col-12 d-flex justify-content-center animated"> PIZZAS MAIS PEDIDAS </h1>
        <div id="home3Text" class="col-md-12 col-12 d-flex justify-content-center animated">Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. Vivamus varius.
        </div>

        <div id="cardapio" class="row animated">
            @foreach($products as $row)
                @if($row->type == 'pizza')
                    <div class="col-md-2 col-6" id="divImgCardapio">
                        <img class="img-fluid" src="{{ url("storage/products/{$row->img}") }}" id="imgCardapio">
                    </div>
                    <div class="col-md-2 col-6" id="cardapioText">
                        <span class="col-md-12" id="cardapioName">{{ $row->type }} {{ $row->name }}</span>
                        <p class="col-md-12" id="cardapioDescription">{{ $row->description }}</p>
                        <div class="col-md-12">
                            <span class="col-md-6" id="cardapioPrice"> R$
                                @if($row->price_md)
                                    {{ $row->price_md }}
                                @endif
                                @if($row->price_md == false)
                                    @if($row->price_sm)
                                        {{ $row->price_sm }}
                                    @endif
                                    @if($row->price_sm == false)
                                        {{ $row->price_lg }}
                                    @endif
                                @endif
                            </span>
                            <a class="btn col-md-6" id="btnPedir" href="{{ asset("/product_info/{$row->id}") }}">
                                Pedir</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- ÁREA DO MENU -->

    <div id="allHome4" class="container-fluid">
        <div class="row">
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
                               href="{{ asset("product_info/{$row->id}") }}">
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
                               href="{{ asset("product_info/{$row->id}") }}">
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
                               href="{{ asset("product_info/{$row->id}") }}">
                                Pedir
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

<script src="{{ asset('js/style.js') }}" type="text/javascript"></script>


