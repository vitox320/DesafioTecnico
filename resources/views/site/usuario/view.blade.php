@extends('layouts.layout')

@section("title","index")
@section("title-content","Visualizar Usuario")
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informaçes Usuario</h5>
                    <div class="row">
                        <div class="col-md-3">Nome: {{$usuario->nome_usuario}}</div>
                        <div class="col-md-3">Email: {{$usuario->email}}</div>
                        <div class="col-md-3">CPF: {{$usuario->cpf}}</div>
                        <div class="col-md-3">Perfil: {{$usuario->perfil->nome_perfil}}</div>

                    </div>

                </div>
                <div class="card-footer">
                    <h5>Endereço</h5>
                    <div class="row">
                        @foreach($usuario->logradouros as $logradouros)
                            <div class="col-md-6 mt-2">
                                <div><strong>Cep:</strong> {{$logradouros->cep}} </div>
                                <div><strong> Logradouro:</strong> {{$logradouros->nome_rua}} </div>
                                <div><strong>Numero:</strong> {{$logradouros->numero}} </div>
                                <div><strong> Bairro:</strong> {{$logradouros->bairro}} </div>
                                <div><strong> Cidade:</strong> {{$logradouros->cidade}} </div>
                                <div><strong>Estado:</strong> {{$logradouros->estado}} </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
