@extends('layouts.layout')

@section("title","Cadastro Usuários")
@section("title-content","CRUD Usuários")
@section('content')

    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h3>Criar um projeto em PHP com um CRUD que atenda as seguintes especificações:</h3>
                <ul class="list-group">
                    <li class="list-group-item">Tela de cadastro contendo os campos nome, e-mail, CPF, perfil e
                        endereços.
                    </li>
                    <li class="list-group-item">Tela de listagem de usuários com possibilidade de pesquisa contendo os
                        filtros de
                        Nome, CPF e Período de cadastro.
                    </li>
                    <li class="list-group-item">Tela de alterar/excluir.</li>
                    <li class="list-group-item">Tela de detalhar.</li>
                    <li class="list-group-item">Um usuário só pode ser vinculado a um perfil.</li>
                    <li class="list-group-item"> Um usuário pode ter mais de um endereço, e um mesmo endereço pode
                        pertencer a
                        mais de um usuário.
                    </li>
                    <li class="list-group-item">MVC.</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-3 mb-3">
                <h4>Caso usuário não tenha rodado o seeder ou queira seguir o fluxo completo do sistema seguir o fluxo
                    abaixo:</h4>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-3 shadow-lg p-3">
                    <h4>Cadastrar Perfil</h4>
                    <p>Todo usuário precisa de ser vinculado a um perfil, logo para que um usuário seja criado, se faz
                        necessário a criação de perfil. </p>
                    <p>Principais funcionalidades:</p>
                    <ul>
                        <li>Listagem de perfils</li>
                        <li>Edição de perfils</li>
                        <li>Deleção de perfils</li>
                    </ul>

                    <p><a class="btn btn-outline-primary" href="{{route("perfil.create")}}" role="button">Cadastrar
                            Perfil</a></p>

                </div>
                <div class="col-md-1  align-items-center text-center m-auto">
                    <i class="fa-solid fa-2x fa-circle-arrow-right"></i>
                </div>
                <div class="col-md-3 shadow-lg p-3">
                    <h4>Cadastrar Endereços</h4>
                    <p>Todo usuário precisa de ser vinculado a um endereço, logo para que um usuário seja criado, se faz
                        necessário a criação de endereços. </p>
                    <p>Principais funcionalidades:</p>
                    <ul>

                        <li>Listagem de Endereços</li>
                        <li>Edição de Endereços</li>
                        <li>Deleção de Endereços</li>
                    </ul>
                    <p><a class="btn btn-outline-primary" href="{{route("logradouro.create")}}" role="button">Cadastrar
                            Endereços</a></p>
                </div>
                <div class="col-md-1  align-items-center text-center m-auto">
                    <i class="fa-solid fa-2x fa-circle-arrow-right"></i>
                </div>
                <div class="col-md-3 shadow-lg p-3">
                    <h4>Cadastrar Usuários</h4>
                    <p>Cadastro de usuários.</p>
                    <p>Principais funcionalidades:</p>
                    <ul>

                        <li>Listagem de usuários</li>
                        <li>Edição de usuários</li>
                        <li>Deleção de usuários</li>
                    </ul>
                    <p><a class="btn btn-outline-primary" href="{{route("usuario.create")}}" role="button">Cadastro de
                            usuário</a></p>
                </div>
            </div>

            <hr>

        </div> <!-- /container -->

    </main>

@endsection
