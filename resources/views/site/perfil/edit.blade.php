@extends('layouts.layout')
@push('script')
    <script src="{{url(mix('site/perfil/js/perfil.js'))}}"></script>
@endpush
@section("title","Editar Perfil")
@section("title-content","Edição De Perfil")
@section('content')

    @if(!is_null(session('msg')))
        @if(session('perfilCreate'))
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
        @else
            <div class="alert alert-danger">
                {{session('msg')}}
            </div>
        @endif
    @endif

    @if($errors->has('cep'))
        <div class="alert alert-danger">
            {{$errors->first('nome_perfil')}}
        </div>
    @endif
    @if($errors->has('nome_rua'))
        <div class="alert alert-danger">
            {{$errors->first('descricão')}}
        </div>
    @endif


    <form action="{{route("perfil.update",$perfil->id)}}" method="post" id="form_perfil">
        @method('PUT')
        @csrf
        <div class="card mt-3">
            <div class="card-body enderecos">
                <div class="row mb-3 shadow">
                    <div class="col-md-6">
                        <label for="perfil">Nome Perfil</label>
                        <input type="text" name="nome_perfil" class="form-control nome_perfil" id="perfil"
                               placeholder="ex: Administrador" value="{{$perfil->nome_perfil}}">
                    </div>
                    <div class="col-md-6">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" class="form-control descricao" id="descricao"
                               placeholder="ex: Perfil com todas as permissões" value="{{$perfil->descricao}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="btn-lg btn-outline-primary cadastra_perfil mt-4">Atualiza Perfil</button>
        </div>
    </form>

@endsection
