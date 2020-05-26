@extends('layout.template')

@section('title', 'Cardapio')

<link href="{{ asset('css/cardapio.css')}}" rel="stylesheet">
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

    <div class="container-fluid" id="divCardapioAll">
        <div id="cardapio" class="row animated">
            <h1 id="titleCardapio" class="col-md-12 col-12 d-flex justify-content-center"> Cardápio </h1>
            <div id="btnsCardapio">
                <button class="btn" id="btnPizzaCardapio" onclick="pizza()"> Pizza</button>
                <button class="btn" id="btnBurgerCardapio" onclick="burger()"> Burger</button>
                <button class="btn" id="btnDrinkCardapio" onclick="drink()"> Drink</button>
            </div>

            <div class="col-md-12 col-12" id="divPaiCardapio">
                @foreach($pizza as $row)
                    <div class="col-md-3 col-12" id="divFilhaCardapio">
                        <div class="col-md-6 col-6" id="divImgCardapio" style="float: left">
                            <img class="img-fluid" src="{{ url("storage/products/{$row->img}") }}" id="imgCardapio">
                        </div>
                        <div class="col-md-6 col-6" id="cardapioText" style="float: right">
                            <span class="col-md-12 col-12" id="cardapioName"> {{ $row->name }}</span>
                            <p class="col-md-12 col-12" id="cardapioDescription">{{ $row->description }}</p>
                            <div class="col-md-12 col-12">
                            <span class="col-md-6 col-12" id="cardapioPrice"> R$
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
                                <a class="btn col-md-6 col-12" id="btnPedir0" href="{{ asset("/product/id={$row->id}") }}">
                                    Pedir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-12" id="divPaiCardapio1">
                @foreach($burguer as $row)
                    <div class="col-md-3" id="divFilhaCardapio1">
                        <div class="col-md-6 col-6" id="divImgCardapio1" style="float: left">
                            <img class="img-fluid" src="{{ url("storage/products/{$row->img}") }}" id="imgCardapio">
                        </div>
                        <div class="col-md-6 col-6" id="cardapioText1">
                            <span class="col-md-12 col-12" id="cardapioName1"> {{ $row->name }}</span>
                            <p class="col-md-12 col-12" id="cardapioDescription1">{{ $row->description }}</p>
                            <div class="col-md-12 col-12">
                            <span class="col-md-6 col-12" id="cardapioPrice1"> R$
                                @if($row->price)
                                    {{ $row->price }}
                                @endif
                            </span>
                                <a class="btn col-md-6 col-12" id="btnPedir1" href="{{ asset("/product/id={$row->id}") }}">
                                    Pedir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-12" id="divPaiCardapio2">
                @foreach($drink as $row)
                    <div class="col-md-3" id="divFilhaCardapio2">
                        <div class="col-md-6 col-6" id="divImgCardapio2" style="float: left">
                            <img class="img-fluid" src="{{ url("storage/products/{$row->img}") }}" id="imgCardapio">
                        </div>
                        <div class="col-md-6 col-6" id="cardapioText2">
                            <span class="col-md-12 col-12" id="cardapioName2"> {{ $row->name }}</span>
                            <p class="col-md-12 col-12" id="cardapioDescription2">{{ $row->description }}</p>
                            <div class="col-md-12 col-12">
                            <span class="col-md-6 col-12" id="cardapioPrice2"> R$
                                @if($row->price)
                                    {{ $row->price }}
                                @endif
                            </span>
                                <a class="btn col-md-6 col-12" id="btnPedir2" href="{{ asset("/product/id={$row->id}") }}">
                                    Pedir</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

<script src="{{ asset('js/cardapio.js') }}" type="text/javascript"></script>
