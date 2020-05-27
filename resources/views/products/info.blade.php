<htmL>
<head>
    <meta charset="utf-8">
    @section('title', 'Produto')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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
    <div class="container-fluid" id="body">
    <div class="container" id="divAllProduct">
        <div class="row">
            <div id="left" class="col-md-9">
                <div class="row" id="divImgInfo">
                    <div class="col-md-8 col-12" id="imagem">
                        <img id="imgBD" class="img-fluid" src='{{ url("storage/products/{$products->img}") }}'>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="col-md-12" id="info">
                            <span> {{ $products->type }}</span>
                            <span> {{ $products->name }}</span>
                        </div>
                        <div class="col-md-12 col-12" id="infoDescription">
                            <span> {{ $products->description }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div id="right" class="col-md-3 col-12">
                <div class="row">
                    <div class="col-md-12 col-12" id="form">
                        <form id="formCart" method="post" action="{{ route('insert_cart') }}">
                            {{ csrf_field() }}
                            @if(Auth::check())
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endif
                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                            <input type="hidden" name="product_name" value="{{ $products->name }}">
                            <input type="hidden" name="type" value="{{ $products->type }}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="errors">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <span class="col-md-12 col-12" id="textTamanho"> Escolha um tamanho </span>
                            <br>
                            <div class="btn-group col-md-12 col-12" id="btn">
                                @if($products->sm)
                                    <label for="p" class="btn btn-default" id="labelP" data-toggle="tooltip"
                                           data-placement="top" title="(4 pedaços)"> P </label>
                                    <input type="radio" id="p" name="size" value="P">
                                @endif
                                @if($products->md)
                                    <label for="m" class="btn btn-default" id="labelM" data-toggle="tooltip"
                                           data-placement="top" title="(6 pedaços)"> M </label>
                                    <input type="radio" id="m" name="size" value="M" checked>
                                @endif
                                @if($products->lg)
                                    <label for="g" class="btn btn-default" id="labelG" data-toggle="tooltip"
                                           data-placement="top" title="(8 pedaços)"> G </label>
                                    <input type="radio" id="g" name="size" value="G">
                                @endif
                            </div>

                            <hr>
                            <span class="col-md-12" id="qtdSpan"> Escolha a quantidade </span>
                            <div class="col-md-12" id="qtdDiv">
                                <button data-action="decrease" id="qtdLess" class="btn btn-info"> -</button>
                                <input type="text" value="1" placeholder="1" id="qtd" disabled>
                                <input type="hidden" name="qtd_hidden" value="1" id="qtdHidden">
                                <button data-action="increase" id="qtdPlus" class="btn btn-info"> +</button>
                            </div>
                            <div class="col-md-12" id="priceDiv">
                                @if($products->price_md)
                                    <input type="text" placeholder="R$ {{ number_format($products->price_md, '2', ',', '0') }} + frete"
                                           name="textPrice"
                                           id="textPrice" disabled>
                                    <input type="hidden" name="price" id="price" value="{{ $products->price_md }}">
                                @elseif($products->price_sm)
                                    <input type="text" placeholder="R$ {{ number_format($products->price_sm, '2', ',', '0') }} + frete"
                                           name="textPrice"
                                           id="textPrice" disabled>
                                    <input type="hidden" name="price" id="price" value="{{ $products->price_sm }}">
                                @elseif($products->price_lg)
                                    <input type="text" placeholder="R$ {{ number_format($products->price_lg, '2', ',', '0') }} + frete"
                                           name="textPrice"
                                           id="textPrice" disabled>
                                    <input type="hidden" name="price" id="price" value="{{ $products->price_lg }}">
                                @elseif($products->price)
                                    <input type="text" placeholder="R$ {{ number_format($products->price, '2', ',', '0') }}} + frete" name="textPrice"
                                           id="textPrice" disabled>
                                    <input type="hidden" name="price" id="price" value="{{ $products->price }}">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <input type="submit" id="btnFinish" class="btn" value="Comprar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        /* SCRIPT PARA QUANDO O USUÁRIO SELECIONAR UM TAMANHO */
        /* BUTTON SELECIONADO IRÁ RECEBER UM BACKGROUND-COLOR PARA QUE SEJA DIFERENCIADO DOS OUTROS */
        /* OS OUTROS BUTTON FICAM DA COR INICIAL */
        /* O INPUT DE NAME "PRICE" IRÁ RECEBER O VALOR DO TAMANHO SELECIONADO */
        /* O PLACEHOLDER DO INPUT DISABLED (QUE É O VALOR QUE É MOSTRADO PARA O USUÁRIO IRÁ RECEBER O VALOR DO TAMANHO SELECIONADO */

        $('#btn').click(function () {
            if ($('#p').prop('checked')) {
                $('#labelP').css('background-color', '#d7dadd');
                $('#labelM').css('background-color', '#f6f9fc');
                $('#labelG').css('background-color', '#f6f9fc');
                $('#price').val({{ $products->price_sm }})
                $('#textPrice').attr({placeholder: 'R$ {{ number_format($products->price_sm, '2', ',', '0') }} + frete'})
            }

            if ($('#m').prop('checked')) {
                $('#labelM').css('background-color', '#d7dadd');
                $('#labelP').css('background-color', '#f6f9fc');
                $('#labelG').css('background-color', '#f6f9fc');
                $('#price').val({{ $products->price_md }})
                $('#textPrice').attr({placeholder: 'R$ {{ number_format($products->price_md, '2', ',', '0') }} + frete'})
            }

            if ($('#g').prop('checked')) {
                $('#labelG').css('background-color', '#d7dadd');
                $('#labelP').css('background-color', '#f6f9fc');
                $('#labelM').css('background-color', '#f6f9fc');
                $('#price').val({{ $products->price_lg }})
                $('#textPrice').attr({placeholder: 'R$ {{ number_format($products->price_lg, '2', ',', '0') }} + frete'})
            }
        });
    </script>
    <script src="{{ asset('js/product_info.js') }}" type="text/javascript"></script>
@endsection

</body>
</htmL>

