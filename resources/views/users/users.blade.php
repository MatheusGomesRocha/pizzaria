<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Usuários')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="{{asset('css/users.css')}}">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">


</head>
<body>
@extends('layout.template')

@section('content')
    <div class="container" id="divAll">
        <table class="table table-striped " id="tableUsers">
            <tr id="th">
                <th class="text-danger"> Nome</th>
                <th class="text-danger"> Email</th>
                <th class="text-danger"> CPF</th>
                <th class="text-danger"> Telefone</th>
                <th class="text-danger"> Nível</th>
                <th class="text-danger"> #</th>
                <th class="text-danger"> #</th>
            </tr>
            @foreach($query as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->cpf }}</td>
                    <td>{{ $row->telefone }}</td>
                    <td class="text-success"> Usuário</td>
                    <td>
                        <button id="btnEditUser" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalExemplo{{$row->id}}"><i class="nav-icon fas fa-edit"></i></button>
                        <div class="modal fade" id="modalExemplo{{$row->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Usuário: {{ $row->user }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="{{ route('edit_nivel_user') }}">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <label for="inputPass" class="d-flex justify-content-start"> <strong> Confirme sua
                                                    senha: </strong>
                                            </label>
                                            <input id="inputPass" name="inputPass" class="form-control" type="password">
                                            <br>
                                            <label for="selectUser" class="d-flex justify-content-start"> Escolha o nível do usuário </label>
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            <select class="form-control" id="selectUser" name="nivelUser">
                                                <option value="1"> 1</option>
                                                <option value="2"> 2</option>
                                                <option value="3"> 3</option>
                                                <option value="4"> 4</option>
                                                <option value="5"> 5</option>
                                                <option value="6"> 6</option>
                                                <option value="7"> 7</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar
                                            </button>
                                            <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="delete_user/{{$row->id}}"><i class="nav-icon fas fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach

        </table>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection

</body>
</html>
