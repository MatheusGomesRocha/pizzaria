<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Login')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
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
    <div class="d-flex justify-content-center h-100">
        <div class="container-login100" id="container-login100">
            <div class="d-flex justify-content-center form_container">
                <form method="post" action="{{ asset('/validation_login')}}" id="formLogin">
                    {{csrf_field()}}
                    <span class="form-title d-flex justify-content-center ">
						Login
                </span>
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" name="user" placeholder="Usuário" class="form-control" id="userLogin" autocomplete="off">
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" name="password" placeholder="Senha" class="form-control" id="userPass"
                               autocomplete="off">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn" id="btn1">Login</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="forgot" class="btn" id="btn">Esqueci a senha</button>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12" id="btnCadastro">
                            <span id="cadastro"> Ainda não é cadastrado? </span><a href="{{route('register')}}">Cadastre-se</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
