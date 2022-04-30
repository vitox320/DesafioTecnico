@extends('layouts.layout')
@push('script')
    <script src="{{url(mix('site/usuario/js/usuario.js'))}}"></script>
@endpush
@section("title","Cadastro Usuários")
@section("title-content","Ediçao De Usuários")
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

    @if($errors->has('perfil'))
        <div class="alert alert-danger">
            {{$errors->first('cep')}}
        </div>
    @endif
    @if($errors->has('nome'))
        <div class="alert alert-danger">
            {{$errors->first('nome_rua')}}
        </div>
    @endif
    @if($errors->has('email'))
        <div class="alert alert-danger">
            {{$errors->first('numero')}}
        </div>
    @endif
    @if($errors->has('cpf'))
        <div class="alert alert-danger">
            {{$errors->first('estado')}}
        </div>
    @endif


    <form action="{{route("usuario.update",$usuario->id)}}" id="form-cadastro-usuario" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <label for="perfil">Perfil De Usuario</label>
                <select class="form-control perfil" name="perfil" id="perfil">
                    <option value="{{$usuario->perfil->id}}">{{$usuario->perfil->nome_perfil}}</option>
                    @foreach($perfil as $value)
                        <option value="{{$value->id}}">{{$value->nome_perfil}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control nome" id="nome" placeholder="Digite o nome"
                       value="{{$usuario->nome_usuario}}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control email" id="email" placeholder="nome@exemplo.com"
                       value="{{$usuario->email}}">
            </div>
            <div class="col-md-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control cpf" id="cpf" placeholder="000.000.000-00"
                       value="{{$usuario->cpf}}">
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Endereço
            </div>
            <div class="card-body enderecos">
                @foreach($usuario->logradouros as $logradouros)
                    <input type="hidden" name="id_logradouro[]" value="{{$logradouros->id}}">
                    <div class="row endereco_usuario mb-3 shadow">
                        <div class="col-md-3">
                            <label for="cep">Cep</label>
                            <input type="text" class="form-control cep" id="cep" placeholder="ex: 47986-987"
                                   value="{{$logradouros->cep}}">
                        </div>
                        <div class="col-md-6">
                            <label for="nome_rua">Logradouro</label>
                            <input type="text" class="form-control nome_rua" id="nome_rua"
                                   placeholder="ex: Travessa Fonseca" readonly value="{{$logradouros->nome_rua}}">
                        </div>
                        <div class="col-md-3">
                            <label for="numero">Numero</label>
                            <input type="text" class="form-control numero" id="numero" placeholder="ex: 35"
                                   readonly value="{{$logradouros->numero}}">
                        </div>

                        <div class="col-md-4">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control estado" id="estado" readonly
                                   value="{{$logradouros->estado}}">

                        </div>

                        <div class="col-md-4">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control cidade" id="cidade" readonly
                                   value="{{$logradouros->cidade}}">
                        </div>

                        <div class="col-md-4">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control bairro" id="bairro" readonly
                                   value="{{$logradouros->bairro}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center">
            <button class="btn-lg btn-outline-primary cadastrar mt-4">Atualizar</button>
        </div>
    </form>
@endsection
