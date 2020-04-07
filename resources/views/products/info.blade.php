<htmL>
<head>
    <meta charset="utf-8">
    @section('title', 'Produto')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <link href="{{asset('css/product_info.css')}}" rel="stylesheet">
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
    <div class="container">
        <div class="row">
            <div id="left" class="col-md-9">
                <div class="row">
                    <div class="col-md-12" id="imagem">
                        <img id="imgBD" class="img-fluid" src='{{ url("storage/products/{$products->img}") }}'>
                    </div>
                </div>
            </div>
            <div id="right" class="col-md-3">
                <div class="row">
                    <div class="col-md-12" id="info">
                        <span> {{ $products->type }}</span>
                        <span> {{ $products->name }}</span>
                    </div>
                    @if($products->type == 'pizza')
                        <div class="col-md-12" id="form">
                            <form id="formCart" method="post" action="{{ asset('/insert_cart') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                <input type="hidden" name="product_name" value="{{ $products->name }}">
                                <input type="hidden" name="type" value="{{ $products->type }}">
                                <span class="col-md-12"> Escolha um tamanho </span>
                                <br>
                                <div class="btn-group col-md-12" id="btn">
                                    @if($products->sm)
                                        <label for="p" class="btn btn-default" id="labelP" data-toggle="tooltip"
                                               data-placement="top" title="(4 pedaços)"> P </label>
                                        <input type="radio" id="p" name="size" value="P">
                                    @endif
                                    @if($products->md)
                                        <label for="m" class="btn btn-default" id="labelM" data-toggle="tooltip"
                                               data-placement="top" title="(6 pedaços)"> M </label>
                                        <input type="radio" id="m" name="size" value="M">
                                    @endif
                                    @if($products->lg)
                                        <label for="g" class="btn btn-default" id="labelG" data-toggle="tooltip"
                                               data-placement="top" title="(8 pedaços)"> G </label>
                                        <input type="radio" id="g" name="size" value="G">
                                    @endif
                                </div>
                                <span class="col-md-12"> Escolha a fração </span>
                                <br>
                                <div class="btn-group col-md-12" id="btnFraction">
                                    <label for="meia" class="btn btn-default" id="labelMeia"> Meia </label>
                                    <input type="radio" id="meia" name="fraction" value="meia">
                                    <label for="inteira" class="btn btn-default" id="labelInteira"> Inteira </label>
                                    <input type="radio" id="inteira" name="fraction" value="inteira">
                                </div>
                                <span class="col-md-12"> Escolha a quantidade </span>
                                <br>
                                <div class="col-md-12" id="qtdDiv">
                                    <button data-action="decrease" id="qtdLess" class="btn btn-info"> -</button>
                                    <input type="text" value="1" placeholder="1" id="qtd" disabled>
                                    <input type="hidden" name="qtd_hidden" value="1" id="qtdHidden">
                                    <button data-action="increase" id="qtdPlus" class="btn btn-info"> +</button>
                                </div>
                                <div class="col-md-12" id="priceDiv">
                                    <span id="price_sm" style="display: none">R$ {{ $products->price_sm }} +frete</span>
                                    <span id="price_md"> R$ {{ $products->price_md }} + frete</span>
                                    <span id="price_lg" style="display: none">R$ {{ $products->price_lg }} +frete</span>
                                    <input type="hidden" name="price" id="input_sm" disabled value="{{ $products->price_sm }}">
                                    <input type="hidden" name="price" id="input_md" value="{{ $products->price_md }}">
                                    <input type="hidden" name="price" id="input_lg" disabled value="{{ $products->price_lg }}">
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-2">
                                        <input type="submit" id="btnFinish" class="btn" value="Comprar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/product_info.js') }}" type="text/javascript"></script>
@endsection

</body>
</htmL>

