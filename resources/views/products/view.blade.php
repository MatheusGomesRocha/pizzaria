<html>
<head>
    <meta charset="utf-8">
    @section('title', 'Produtos no estoque')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="stylesheet" href="{{asset('css/products_ing.css')}}">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
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

</head>
<body>
@extends('layout.template')

@section('content')
    <div class="container " id="divAll">
        <button id="btnAdd" class="btn btn-success" data-toggle="modal"
                data-target="#modalExemplo"> + Adicionar Produtos
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
                    <form method="post" action="{{ asset('admin/validation_product_register')}}"
                          id="formRegisterProduct"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <span class="form-title d-flex justify-content-center">Cadastro de Produtos</span>
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
                            <div class="col-md-12 mb-2" id="tamanho" style="display: none;">
                                <div class="input-group mb-2">
                                    <input type="text" name="name"
                                           placeholder="Nome ou Sabor do produto (ex: Água, Calabresa, À Moda etc...)"
                                           class="form-control" autocomplete="no">
                                </div>
                            </div>

                            <div class="col-md-12 mb-2" id="divDescription" style="display: none">
                                <div class="input-group mb-2">
                                    <input type="text" name="description" id="description"
                                           placeholder="Adicione uma pequena descrição" class="form-control"
                                           autocomplete="no">
                                </div>
                            </div>
                            <div class="col-md-12 mb-2" style="margin-left: 5px; display: none;" id="labelImg">

                            </div>
                            <div class="col-md-12 mb-2" id="image" style="display: none">
                                <div id="fileDiv" class="input-group mb-2">
                                    <label for="fileImg" style="padding: 5px">
                                        Nunca esqueça de cortar a imagem para ficar apenas o produto
                                        (deixamos alguns exemplo de cada para você no Cardápio e na Home)
                                    </label>

                                    <input id="uploadFile" placeholder="Escolha um arquivo" disabled="disabled"/>
                                    <div class="fileUpload btn btn-primary">
                                        <span>Enviar</span>
                                        <input type="file" id="fileImg" name="img">
                                    </div>
                                </div>
                            </div>

                            <!-- TAMANHO TEM QUE SER CHECKBOX PARA P, M E G -->
                            <div class="col-md-12 mb-2" style="margin-left: 5px; display: none;" id="tamanhoLabel">
                                <label> Marque os tamanhos de pizza disponíveis </label>
                            </div>
                            <div class="col-md-12 mb-2" style="margin-left: 5px; display: none" id="tamanho1">
                                <div class="form-check form-check-inline col-md-4" onchange="verify_sm()">
                                    <input class="form-check-input" type="checkbox" name="sm" id="inlineRadio1"
                                           value="1">
                                    <label class="form-check-label" for="inlineRadio1" id="small1">Pequena (4
                                        fatias)</label>
                                </div>
                                <div class="form-check form-check-inline col-md-4" onchange="verify_md()">
                                    <input class="form-check-input" type="checkbox" name="md" id="inlineRadio2"
                                           value="1">
                                    <label class="form-check-label" for="inlineRadio2" id="small2">Média (6
                                        fatias)</label>
                                </div>
                                <div class="form-check form-check-inline col-md-3" onchange="verify_lg()">
                                    <input class="form-check-input" type="checkbox" name="lg" id="inlineRadio3"
                                           value="1">
                                    <label class="form-check-label" for="inlineRadio3" id="small3">Grande (8
                                        fatias)</label>
                                </div>
                            </div>
                            <div class="col-md-4" id="tamanho2" style="display: none">
                                <div class="input-group mb-2">
                                    <input type="text" name="price_sm" disabled id="price_sm"
                                           placeholder="Preço Pequena"
                                           class="form-control" autocomplete="no">
                                </div>
                            </div>
                            <div class="col-md-4" id="tamanho3" style="display: none">
                                <div class="input-group mb-2">
                                    <input type="text" name="price_md" disabled id="price_md" placeholder="Preço Média"
                                           class="form-control" autocomplete="no">
                                </div>
                            </div>
                            <div class="col-md-4" id="tamanho4" style="display: none">
                                <div class="input-group mb-2">
                                    <input type="text" name="price_lg" disabled id="price_lg" placeholder="Preço Grande"
                                           class="form-control" autocomplete="no">
                                </div>
                            </div>
                            <div class="col-md-12" id="tamanho5" style="display: none">
                                <div class="input-group mb-2">
                                    <input type="text" name="price" id="price" placeholder="Preço" disabled
                                           class="form-control" autocomplete="no">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="input-group mb-2">
                                <select class="form-control" autocomplete="off" name="type" id="select"
                                        onchange="verify_select()">
                                    <!-- DEPENDENDO DO QUE FOR SELECIONADO, DEIXAR ALGUNS INPUTS DISABLED -->
                                    <option disabled selected> Escolha o tipo do produto...</option>
                                    <option value="pizza"> Pizza</option>
                                    <option value="sanduiche"> Sanduíche</option>
                                    <option value="bebida"> Bebida</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group mb-2">
                                <input type="submit" name="submit" class="btn" id="btnFormSubmit"
                                       value="Finalizar Cadastro">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped " id="tableUsers">
            <tr id="th">
                <th class="text-danger"> ID</th>
                <th class="text-danger"> Nome</th>
                <th class="text-danger"> Tipo</th>
                <th class="text-danger"> Tamanhos</th>
                <th class="text-danger"> Preço_P</th>
                <th class="text-danger"> Preço_M</th>
                <th class="text-danger"> Preço_G</th>
                <th class="text-danger"> Preço</th>
                <th class="text-danger"> #</th>
            </tr>
            @foreach($query as $row)
                    <tr id="td">
                        <td> {{ $row->id }}</td>
                        <td> {{ $row->name }}</td>
                        <td> {{ $row->type }}</td>

                        <td class="text-success">
                            @if($row->sm) P -  @endif
                            @if($row->md) M -  @endif
                            @if($row->lg) G @endif
                        </td>
                        @if($row->price_sm)
                            <td class="text-success"> R$ {{ $row->price_sm }}</td>
                        @else
                            <td class="text-danger"> #</td>
                        @endif

                        @if($row->price_md)
                            <td class="text-success"> R$ {{ $row->price_md }}</td>
                        @else
                            <td class="text-danger"> #</td>
                        @endif

                        @if($row->price_lg)
                            <td class="text-success"> R$ {{ $row->price_lg }}</td>
                        @else
                            <td class="text-danger"> #</td>
                        @endif

                        @if($row->price)
                            <td class="text-success"> R$ {{ $row->price }}</td>
                        @else
                            <td class="text-danger"> #</td>
                        @endif

                        <td><a href="/admin/delete_product/{{ $row->id }}" class="btn btn-danger"><i
                                    class="fas fa-trash"></i> </a></td>
                    </tr>
            @endforeach
        </table>
        {{ $query->links() }}

    </div>

    <script src="{{ asset('js/register_product.js')}}" type="text/javascript"></script>

@endsection

</body>
</html>
