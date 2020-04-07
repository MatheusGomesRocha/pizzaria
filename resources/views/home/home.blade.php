<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Home')
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
                        <div class="col-md-3">
                            <a>Intagram</a>
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
