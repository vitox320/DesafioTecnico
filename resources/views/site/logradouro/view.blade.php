@extends('layouts.layout')

@section("title","Cadastro Usuários")
@section("title-content","Endereço")
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Cep</th>
            <th>Logradouro</th>
            <th>Numero</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Opções</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$logradouro->cep}}</td>
            <td>{{$logradouro->nome_rua}}</td>
            <td>{{$logradouro->numero}}</td>
            <td>{{$logradouro->estado}}</td>
            <td>{{$logradouro->cidade}}</td>
            <td>{{$logradouro->bairro}}</td>

        </tr>
        </tbody>
    </table>

@endsection
