<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Conta')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{asset('css/account.css')}}" rel="stylesheet">
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
<div class="container" id="accountAll">
    <div id="infos">
        <div class="row" id="accountUser">
            <div class="col-md-11">
                <span> <strong> Usuário: </strong> </span> <br>
                <span> {{$user->user}}</span>
            </div>
            <div class="col-md-1">
                <a href="{{ route('edit_user') }}" class="btn btn-primary" id="btnEdit"> Editar </a>
            </div>
        </div>
        <div class="row" id="accountName">
            <div class="col-md-11">
                <span> <strong> Nome: </strong> </span> <br>
                <span> {{$user->name}}</span>
            </div>
            <div class="col-md-1">
                <a href="{{ route('edit_name') }}" class="btn btn-primary" id="btnEdit"> Editar </a>
            </div>
        </div>
        <div class="row" id="accountEmail">
            <div class="col-md-11">
                <span> <strong> Email: </strong> </span> <br>
                <span> {{$user->email}}</span>
            </div>
            <div class="col-md-1">
                <a href="{{ route('edit_email') }}" class="btn btn-primary" id="btnEdit"> Editar </a>
            </div>
        </div>
        <div class="row" id="accountPhone">
            <div class="col-md-11">
                <span> <strong> Telefone celular: </strong> </span> <br>
                <span> {{$user->telefone}}</span>
            </div>
            <div class="col-md-1">
                <a href="{{ route('edit_phone') }}" class="btn btn-primary" id="btnEdit"> Editar </a>
            </div>
        </div>
        <div class="row" id="accountPass">
            <div class="col-md-11">
                <span> <strong> Senha: </strong> </span> <br>
                <span> ******** </span>
            </div>
            <div class="col-md-1">
                <a href="{{ route('edit_pass') }}" class="btn btn-primary" id="btnEdit"> Editar </a>
            </div>
        </div>

    </div>
</div>
@endsection

</body>
</html>
