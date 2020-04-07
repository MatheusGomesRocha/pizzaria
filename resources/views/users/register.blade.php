<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Cadastro')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/cadastro.css')}}">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

</head>
<body>
@extends('layout.template')

@section('content')
<div class="d-flex justify-content-center h-100">
    <div class="container-login100">
        <div class="d-flex justify-content-center form_container">
            <form method="post" action="{{ asset('/validation_register')}}" id="register">
                {{csrf_field()}}
                <span class="form-title d-flex justify-content-center" id="form-title">
						Cadastro
                </span>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="text" id="name" name="name" placeholder="Seu nome" class="form-control"
                                   autocomplete="off" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="text" id="user" name="user" placeholder="Usuário (Login)" class="form-control"
                                   autocomplete="off" value="{{old('user')}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control" autocomplete="off"
                                   value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="text" name="cpf" id="cpf" placeholder="CPF"
                                   class="form-control" autocomplete="off" value="{{old('cpf')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="text" name="cellphone" id="tel" placeholder="Contato (número do celular)"
                                   class="form-control" autocomplete="off" value="{{old('cellphone')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="password" name="password" placeholder="Senha" class="form-control"
                                   autocomplete="off" id="pass">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <input type="password" id="conPass" name="confirm_password" placeholder="Confirme sua senha"
                                   class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <button type="submit" name="submit" class="btn" id="btn">Finalizar Cadastro</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.3.1/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="{{asset('js/register.js')}}"></script>

@endsection
</body>
</html>
