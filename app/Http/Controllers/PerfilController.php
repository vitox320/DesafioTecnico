<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\UpdatePerfilRequest;
use App\Models\Perfil;

class PerfilController extends Controller
{

    public function index()
    {
        $perfil = Perfil::paginate(10);
        return view("site.perfil.index")->with(["perfil" => $perfil]);
    }


    public function create()
    {
        return view("site.perfil.create");
    }


    public function store(StorePerfilRequest $request)
    {
        try {

            $perfil = new Perfil();
            $perfil->nome_perfil = $request->nome_perfil;
            $perfil->descricao = $request->descricao;
            $perfil->save();
            return redirect()->route('perfil.create')->with(['perfilCreate' => true, 'msg' => 'Perfil cadastrado com sucesso!']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['perfilCreate' => false, 'msg' => 'Erro Requisiçao']);
        }
    }


    public function show($id)
    {
        $perfil = Perfil::find($id);
        return view("site.perfil.view")->with(["perfil" => $perfil]);
    }


    public function edit($id)
    {
        try {
            $perfil = Perfil::find($id);
            return view("site.perfil.edit")->with(["perfil" => $perfil]);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['perfilCreate' => false, 'msg' => $exception->getMessage()]);
        }

    }


    public function update(UpdatePerfilRequest $request, $id)
    {
        try {
            $perfil = Perfil::find($id);
            $perfil->nome_perfil = $request->nome_perfil;
            $perfil->descricao = $request->descricao;
            $perfil->save();

            return redirect()->route("perfil.index");
        } catch (\Exception $exception) {
            return redirect()->back()->with(['perfilCreate' => false, 'msg' => $exception->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $logradouro = Perfil::find($id);
            $logradouro->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with(['perfilDelete' => false, 'msg' => $exception->getMessage()]);
        }
    }
}
