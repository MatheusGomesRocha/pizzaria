<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Conta')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link href="{{asset('css/edit.css')}}" rel="stylesheet">
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
    <div class="container" id="edit">
        <div id="infos">
            <div id="accountLink">
                <a href="{{ route('account') }}"> Sua Conta </a> &nbsp; <i class="zmdi zmdi-chevron-right"></i> &nbsp;
                <span> Alterar mail </span>
            </div>
            <h3> Edite seu Email </h3>
            <div class="row" id="editEmail">
                <p class="col-md-12"> Lembre-se de clicar no botão "Salvar" para salvar sua alteração.</p>
                <form method="post" action="{{ asset('/edit_email_val') }}">
                    {{ csrf_field() }}
                    <div class="col-md-12" id="divEmail">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
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
                        <label for="inputPass" class="d-flex justify-content-start"> <strong> Digite sua
                                senha: </strong>
                        </label>
                        <input id="inputPass" name="inputPass" class="form-control" type="password">
                        <label for="inputEmail" class="d-flex justify-content-start"> <strong>Novo
                                email: </strong></label>
                        <input id="inputEmail" name="inputEmail" class="form-control" type="email"
                               placeholder="{{ $user->email }}">
                    </div>
                    <div class="col-md-1">
                        <input type="submit" class="btn btn-success" name="submit" value="Salvar" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

</body>
</html>
