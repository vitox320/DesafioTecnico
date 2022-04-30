<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogradouroRequest;
use App\Http\Requests\UpdateLogradouroRequest;
use App\Models\Logradouro;
use Illuminate\Support\Facades\DB;

class LogradouroController extends Controller
{

    public function index()
    {
        $lograduro = Logradouro::paginate(10);
        return view("site.logradouro.index")->with(["logradouro" => $lograduro]);
    }

    public function create()
    {
        return view("site.logradouro.create");
    }

    public function view($id)
    {
        $logradouro = Logradouro::find($id);
        return view("site.logradouro.view")->with(["logradouro" => $logradouro]);

    }


    public function store(StoreLogradouroRequest $request)
    {
        try {

            $logradouro = new Logradouro();
            $verificaSeExisteLogradouroComDeterminadoCep = Logradouro::where("cep", $request->cep)->count();
            if ($verificaSeExisteLogradouroComDeterminadoCep > 0) {
                throw new \Exception("Já existe um cadastro de endereço com o cep informado.");
            }
            $logradouro->cep = $request->cep;
            $logradouro->nome_rua = $request->nome_rua;
            $logradouro->numero = $request->numero;
            $logradouro->bairro = $request->bairro;
            $logradouro->cidade = $request->cidade;
            $logradouro->estado = $request->estado;
            $logradouro->save();
            return redirect()->route('logradouro.create')->with(['logradouroCreate' => true, 'msg' => 'Endereço cadastrado com sucesso!']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['logradouroCreate' => false, 'msg' => $exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $logradouro = Logradouro::find($id);

            return view("site.logradouro.edit")->with(["logradouro" => $logradouro]);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['logradouroCreate' => false, 'msg' => $exception->getMessage()]);
        }


    }

    public function update(UpdateLogradouroRequest $request, $id)
    {
        try {
            $logradouro = Logradouro::find($id);
            $logradouro->cep = $request->cep;
            $logradouro->nome_rua = $request->nome_rua;
            $logradouro->numero = $request->numero;
            $logradouro->bairro = $request->bairro;
            $logradouro->cidade = $request->cidade;
            $logradouro->estado = $request->estado;
            $logradouro->save();
            return redirect()->route("logradouro.index");
        } catch (\Exception $exception) {
            return redirect()->back()->with(['logradouroCreate' => false, 'msg' => $exception->getMessage()]);
        }
    }


    public function buscaLogradouroPorCep($cep)
    {
        try {
            $logradouro = Logradouro::where("cep", $cep)->first();

            return response()->json($logradouro);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $logradouro = Logradouro::find($id);
            $logradouro->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with(['logradouroDelete' => false, 'msg' => $exception->getMessage()]);
        }
    }
}
