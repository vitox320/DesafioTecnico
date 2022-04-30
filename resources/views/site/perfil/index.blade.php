@extends('layouts.layout')
@push('script')
    <script src="{{url(mix('site/perfil/js/perfil.js'))}}"></script>
@endpush
@section("title","Lista perfil")
@section("title-content","Listagem De Perfis")
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Nome Perfil</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
        </thead>
        <tbody>
        @foreach($perfil as $pef)
            <tr>
                <td>{{$pef->nome_perfil}}</td>
                <td>{{$pef->descricao}}</td>
                <td>
                    <ul class="list-group d-flex flex-row justify-content-start">
                        <li class="list-group-item">
                            <a href="{{route("perfil.view",$pef->id)}}"> <i class="fa-solid fa-2x fa-newspaper"></i></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route("perfil.edit",$pef->id)}}"> <i
                                    class="fa-solid fa-2x fa-pen-to-square text-warning"></i> </a>
                        </li>
                        <li class="list-group-item">
                            <a class="excluir_perfil" style="cursor: pointer;" id="{{$pef->id}}"> <i
                                    class="fa-solid fa-2x fa-trash text-danger"></i> </a>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>{{ $perfil->links() }}</td>
        </tr>
        </tbody>
    </table>

@endsection
