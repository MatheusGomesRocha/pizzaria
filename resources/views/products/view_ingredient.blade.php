<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Ingredientes no estoque')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="{{asset('css/products_ing.css')}}">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">


</head>
<body>
@extends('layout.template')

@section('content')
    <div class="container" id="divAll">
        <button id="btnAdd" class="btn btn-success" data-toggle="modal"
                data-target="#modalExemplo"> + Adicionar Ingredients
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
                    <form method="post" action="{{asset('admin/validation_ingredient_register')}}" ajax="true" id="ingRegister">
                        {{csrf_field()}}
                        <span class="form-title d-flex justify-content-center ">
						Cadastro de Ingredientes
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
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <input type="text" name="ingredient" placeholder="Ingredientes" class="form-control" autocomplete="no">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <button type="submit" name="submit" class="btn" id="btn">Finalizar Cadastro</button>
                                </div>
                            </div>
                            <div id="resp"></div>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped " id="tableUsers">
            <tr id="th">
                <th class="text-danger"> Nome</th>
                <th class="text-danger"> #</th>
            </tr>

            @foreach($query as $row)
                <tr id="td">
                    <td> {{ $row->ingredients }}</td>
                    <td>
                    <a class="btn btn-danger" href="/admin/delete_ing/{{$row->id}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.3.1/jquery.maskedinput.min.js"></script>
    <script src="{{asset('js/register_product.js')}}" type="text/javascript"></script>

@endsection

</body>
</html>
