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
        <div class="row">
            <span class="col-md-12 " id="titleMyAccount"> Minha Conta </span>
        </div>
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
        <div id="infos">
            <div class="row" id="accountUser">
                <div class="col-md-11 col-10">
                    <span> <strong> Usuário: </strong> </span> <br>
                    <span> {{$user->user}}</span>
                </div>
                <div class="col-md-1 col-1">
                    <button id="btnAdd" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalExemplo"> Editar
                    </button>
                    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="modalForm">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="infos" class="container">
                                    <div id="accountLink">
                                        <a href="{{ route('account') }}"> Sua Conta </a> &nbsp; <i
                                            class="zmdi zmdi-chevron-right"></i> &nbsp;
                                        <span> Alterar usuário </span>
                                    </div>
                                    <h3> Edite seu Usuário </h3>
                                    <div class="row" id="editUser">
                                        <p class="col-md-12"> Lembre-se de clicar no botão "Salvar" para salvar sua
                                            alteração.</p>
                                        <form method="post" action="{{ asset('/edit_user_val') }}">
                                            {{ csrf_field() }}
                                            <div class="col-md-12" id="divUser">
                                                <label for="inputPass" class="d-flex justify-content-start">
                                                    <strong> Confirme sua
                                                        senha: </strong>
                                                </label>
                                                <input id="inputPass" name="inputPass" class="form-control"
                                                       type="password">

                                                <label for="inputUser" class="d-flex justify-content-start">
                                                    <strong>Novo
                                                        usuário: </strong></label>
                                                <input id="inputUser" name="inputUser" class="form-control"
                                                       type="text"
                                                       placeholder="{{ $user->user }}">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" id="btnModalEdit" class="btn btn-success"
                                                       name="submit" value="Salvar" id="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="accountName">
                <div class="col-md-11 col-10">
                    <span> <strong> Nome: </strong> </span> <br>
                    <span> {{$user->name}}</span>
                </div>
                <div class="col-md-1 col-1">
                    <button id="btnAdd" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalExemplo1"> Editar
                    </button>
                    <div class="modal fade" id="modalExemplo1" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="modalForm">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="infos" class="container">
                                    <div id="accountLink">
                                        <a href="{{ route('account') }}"> Sua Conta </a> &nbsp; <i
                                            class="zmdi zmdi-chevron-right"></i> &nbsp;
                                        <span> Alterar seu nome </span>
                                    </div>
                                    <h3> Edite seu nome </h3>
                                    <div class="row" id="editName">
                                        <p class="col-md-12"> Lembre-se de clicar no botão "Salvar" para salvar sua
                                            alteração.</p>
                                        <form method="post" action="{{ asset('/edit_name_val') }}">
                                            {{ csrf_field() }}
                                            <div class="col-md-12" id="divNome">
                                                <label for="inputPass" class="d-flex justify-content-start">
                                                    <strong> Digite sua
                                                        senha: </strong>
                                                </label>
                                                <input id="inputPass" name="inputPass" class="form-control"
                                                       type="password">
                                                <label for="inputName" class="d-flex justify-content-start">
                                                    <strong>Novo
                                                        nome: </strong></label>
                                                <input id="inputName" name="inputName" class="form-control"
                                                       type="text"
                                                       placeholder="{{ $user->name }}">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" id="btnModalEdit" class="btn btn-success"
                                                       name="submit" value="Salvar" id="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="accountEmail">
                <div class="col-md-11 col-10">
                    <span> <strong> Email: </strong> </span> <br>
                    <span> {{$user->email}}</span>
                </div>
                <div class="col-md-1 col-1">
                    <button id="btnAdd" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalExemplo2"> Editar
                    </button>
                    <div class="modal fade" id="modalExemplo2" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="modalForm">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="infos" class="container">
                                    <div id="accountLink">
                                        <a href="{{ route('account') }}"> Sua Conta </a> &nbsp; <i
                                            class="zmdi zmdi-chevron-right"></i> &nbsp;
                                        <span> Alterar mail </span>
                                    </div>
                                    <h3> Edite seu Email </h3>
                                    <div class="row" id="editEmail">
                                        <p class="col-md-12"> Lembre-se de clicar no botão "Salvar" para salvar sua
                                            alteração.</p>
                                        <form method="post" action="{{ asset('/edit_email_val') }}">
                                            {{ csrf_field() }}
                                            <div class="col-md-12" id="divEmail">
                                                <label for="inputPass" class="d-flex justify-content-start">
                                                    <strong> Confirme sua senha: </strong>
                                                </label>
                                                <input id="inputPass" name="inputPass" class="form-control"
                                                       type="password">
                                                <label for="inputEmail" class="d-flex justify-content-start">
                                                    <strong> Novo email: </strong>
                                                </label>
                                                <input id="inputEmail" name="inputEmail" class="form-control"
                                                       type="email"
                                                       placeholder="{{ $user->email }}">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" class="btn btn-success" name="submit"
                                                       value="Salvar" id="btnModalEdit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="accountPhone">
                <div class="col-md-11 col-10">
                    <span> <strong> Telefone celular: </strong> </span> <br>
                    <span> {{$user->telefone}}</span>
                </div>
                <div class="col-md-1 col-1">
                    <button id="btnAdd" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalExemplo3"> Editar
                    </button>
                    <div class="modal fade" id="modalExemplo3" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="modalForm">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="infos" class="container">
                                    <div id="accountLink">
                                        <a href="{{ route('account') }}"> Sua Conta </a> &nbsp; <i
                                            class="zmdi zmdi-chevron-right"></i> &nbsp;
                                        <span> Alterar seu telefone </span>
                                    </div>
                                    <h3> Edite seu número para contato </h3>
                                    <div class="row" id="editPhone">
                                        <p class="col-md-12"> Lembre-se de clicar no botão "Salvar" para salvar sua
                                            alteração.</p>
                                        <form method="post" action="{{ asset('/edit_phone_val') }}">
                                            {{ csrf_field() }}
                                            <div class="col-md-12" id="divPhone">
                                                <label for="inputPass" class="d-flex justify-content-start">
                                                    <strong> Digite sua senha: </strong>
                                                </label>
                                                <input id="inputPass" name="inputPass" class="form-control"
                                                       type="password">
                                                <label for="inputPhone" class="d-flex justify-content-start">
                                                    <strong> Novo número de contato: </strong>
                                                </label>
                                                <input id="inputPhone" name="inputPhone" class="form-control" type="tel"
                                                       placeholder="{{ $user->telefone }}">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" class="btn btn-success" name="submit"
                                                       value="Salvar" id="btnModalEdit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="accountPass">
                <div class="col-md-11 col-10">
                    <span> <strong> Senha: </strong> </span> <br>
                    <span> ******** </span>
                </div>
                <div class="col-md-1 col-1">
                    <button id="btnAdd" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalExemplo4"> Editar
                    </button>
                    <div class="modal fade" id="modalExemplo4" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="modalForm">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="infos" class="container">
                                    <div id="accountLink">
                                        <a href="{{ route('account') }}"> Sua Conta </a> &nbsp; <i
                                            class="zmdi zmdi-chevron-right"></i> &nbsp;
                                        <span> Alterar sua senha </span>
                                    </div>
                                    <h3> Edite sua senha </h3>
                                    <div class="row" id="editPass">
                                        <p class="col-md-12"> Lembre-se de clicar no botão "Salvar" para salvar sua
                                            alteração.</p>
                                        <form method="post" action="{{ asset('edit_pass_val')  }}">
                                            {{ csrf_field() }}
                                            <div class="col-md-12" id="divPass">
                                                <div id="pass">
                                                    <label for="inputPass" class="d-flex justify-content-start">
                                                        <strong>Senha atual: </strong>
                                                    </label>
                                                    <input id="inputPass" name="inputPass" class="form-control"
                                                           type="password">
                                                </div>
                                                <div id="newPass">
                                                    <label for="inputNewPass" class="d-flex justify-content-start">
                                                        <strong>Nova senha: </strong>
                                                    </label>
                                                </div>
                                                <input id="inputNewPass" name="inputNewPass" class="form-control"
                                                       type="password">
                                                <div id="conPass">
                                                    <label for="inputConPass" class="d-flex justify-content-start">
                                                        <strong>Confime a nova senha: </strong>
                                                    </label>
                                                    <input id="inputConPass" name="inputConPass" class="form-control"
                                                           type="password">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <input type="submit" class="btn btn-success" name="submit"
                                                       value="Salvar" id="btnModalEdit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

</body>
</html>
