@extends('layouts.layout')
@push('script')
    <script src="{{url(mix('site/logradouro/js/logradouro.js'))}}"></script>
@endpush
@section("title","Cadastro Usuários")
@section("title-content","Cadastro De Endereço")
@section('content')

    @if(!is_null(session('msg')))
        @if(session('logradouroCreate'))
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
            {{$errors->first('cep')}}
        </div>
    @endif
    @if($errors->has('nome_rua'))
        <div class="alert alert-danger">
            {{$errors->first('nome_rua')}}
        </div>
    @endif
    @if($errors->has('numero'))
        <div class="alert alert-danger">
            {{$errors->first('numero')}}
        </div>
    @endif
    @if($errors->has('estado'))
        <div class="alert alert-danger">
            {{$errors->first('estado')}}
        </div>
    @endif
    @if($errors->has('cidade'))
        <div class="alert alert-danger">
            {{$errors->first('cidade')}}
        </div>
    @endif

    @if($errors->has('bairro'))
        <div class="alert alert-danger">
            {{$errors->first('bairro')}}
        </div>
    @endif

    <form action="{{route("logradouro.store")}}" method="post" id="form_logradouro">
        @csrf
        <div class="card mt-3">
            <div class="card-header">
                Endereço
            </div>
            <div class="card-body enderecos">
                <div class="row mb-3 shadow">
                    <div class="col-md-3">
                        <label for="cep">Cep</label>
                        <input type="text" name="cep" class="form-control cep_logradouro" id="cep"
                               placeholder="ex: 47986987">
                    </div>
                    <div class="col-md-6">
                        <label for="nome_rua">Logradouro</label>
                        <input type="text" name="nome_rua" class="form-control nome_rua_logradouro" id="nome_rua"
                               placeholder="ex: Travessa Fonseca">
                    </div>
                    <div class="col-md-3">
                        <label for="numero">Numero</label>
                        <input type="number" name="numero" class="form-control numero_logradouro" id="numero"
                               placeholder="ex: 35">
                    </div>

                    <div class="col-md-4">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" class="form-control estado_logradouro" id="estado">
                    </div>

                    <div class="col-md-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control cidade_logradouro" id="cidade">
                    </div>

                    <div class="col-md-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control bairro_logradouro" id="bairro">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="btn-lg btn-outline-primary cadastra_logradouro mt-4">Cadastrar</button>
        </div>
    </form>

@endsection
