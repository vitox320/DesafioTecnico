@extends('layouts.layout')
@push('script')
    <script src="{{url(mix('site/usuario/js/usuario.js'))}}"></script>
@endpush
@section("title","Listagem Usuários")
@section("title-content","Listagem De Usuários")
@section('content')
    @if(!is_null(session('msg')))
        @if(session('usuarioCreate'))
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
        @else
            <div class="alert alert-danger">
                {{session('msg')}}
            </div>
        @endif
    @endif


    <form action="{{route("usuario.index")}}" method="GET">
        <table class="table">

            <thead>
            <tr>
                <td>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control nome" id="nome" placeholder="Digite o nome">

                </td>
                <td>
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control cpf" id="cpf" placeholder="Digite o cpf">
                </td>
                <td>
                    <label for="dataInicio">Cadastrado de </label>
                    <input class="form-control" type="text" name="dataInicio" id="dataInicio"
                           placeholder="ex: 15/04/2022">
                </td>
                <td>
                    <label for="dataFim">Ate </label>
                    <input class="form-control" type="text" name="dataFim" id="dataFim" placeholder="ex: 15/04/2025">
                </td>

                <td>
                    <button type="submit" class="btn btn-outline-primary  mt-4"><i
                            class="fa-solid fa-magnifying-glass"></i>
                        Pesquisar
                    </button>
                </td>
            </tr>

            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Perfil</th>
                <th>Opções</th>
            </tr>
            </thead>

            <tbody>


            @foreach($usuario as $usu)

                <tr>
                    <td>{{$usu->nome_usuario}}</td>
                    <td>{{$usu->email}}</td>
                    <td>{{$usu->cpf}}</td>
                    <td>{{$usu->perfil->nome_perfil}}</td>

                    <td>
                        <ul class="list-group d-flex flex-row justify-content-start">
                            <li class="list-group-item">
                                <a href="{{route("usuario.view",$usu->id)}}"> <i
                                        class="fa-solid fa-2x fa-newspaper"></i></a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route("usuario.edit",$usu->id)}}"> <i
                                        class="fa-solid fa-2x fa-pen-to-square text-warning"></i> </a>
                            </li>
                            <li class="list-group-item">
                                <a class="excluir_usuario" style="cursor: pointer;" id="{{$usu->id}}"><i
                                        class="fa-solid fa-2x fa-trash text-danger"></i> </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </form>
@endsection
