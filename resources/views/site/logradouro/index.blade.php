@extends('layouts.layout')
@push('script')
    <script src="{{url(mix('site/logradouro/js/logradouro.js'))}}"></script>
@endpush
@section("title","Listagem Endereços")
@section("title-content","Listagem De Endereço")
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
        @foreach($logradouro as $log)
            <tr>
                <td>{{$log->cep}}</td>
                <td>{{$log->nome_rua}}</td>
                <td>{{$log->numero}}</td>
                <td>{{$log->estado}}</td>
                <td>{{$log->cidade}}</td>
                <td>{{$log->bairro}}</td>
                <td>
                    <ul class="list-group d-flex flex-row justify-content-start">
                        <li class="list-group-item">
                            <a href="{{route("logradouro.view",$log->id)}}"> <i class="fa-solid fa-2x fa-newspaper"></i></a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route("logradouro.edit",$log->id)}}"> <i
                                    class="fa-solid fa-2x fa-pen-to-square text-warning"></i> </a>
                        </li>
                        <li class="list-group-item">
                            <a class="excluir_logradouro" style="cursor: pointer;" id="{{$log->id}}"><i
                                    class="fa-solid fa-2x fa-trash text-danger"></i> </a>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
        <tr>
            <td>{{ $logradouro->links() }}</td>
        </tr>

        </tbody>
    </table>

@endsection
