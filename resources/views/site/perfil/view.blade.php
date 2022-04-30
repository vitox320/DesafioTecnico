@extends('layouts.layout')
@push('script')
    <script src="{{url(mix('site/logradouro/js/logradouro.js'))}}"></script>
@endpush
@section("title","Lista perfil")
@section("title-content","Visualizaçao De Perfil")
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Nome Perfil</th>
            <th>Descrição</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$perfil->nome_perfil}}</td>
            <td>{{$perfil->descricao}}</td>
        </tr>
        </tbody>
    </table>

@endsection
