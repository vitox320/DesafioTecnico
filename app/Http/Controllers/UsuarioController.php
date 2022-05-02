<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Endereco;
use App\Models\Logradouro;
use App\Models\Perfil;
use App\Models\Usuario;
use App\Util\UtilData;
use App\Util\UtilString;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    public function main()
    {
        return view("welcome");
    }

    public function index(Request $request)
    {

        $usuario = Usuario::with("perfil");
        $data_inicio = str_replace('/', '-', $request->dataInicio . " 00:00:00");
        $data_fim = str_replace('/', '-', $request->dataFim . " 00:00:00");


        if ($request->nome) {
            $usuario->where("nome_usuario", "LIKE", "%" . $request->nome . "%");
        }
        if ($request->cpf) {
            $usuario->where("cpf", "LIKE", "%" . UtilString::limpaCPF_CNPJ($request->cpf) . "%");
        }

        if ($request->dataInicio && $request->dataFim) {
            $usuario->whereBetween("created_at", [UtilData::toSqlDate($data_inicio), UtilData::toSqlDate($data_fim)]);
        }


        $usuarios = $usuario->paginate(10);
        return view("site.usuario.index")->with(["usuario" => $usuarios]);
    }


    public function create()
    {
        $perfil = Perfil::all();
        return view("site.usuario.create")->with(["perfil" => $perfil]);
    }


    public function store(StoreUsuarioRequest $request)
    {
        try {
            DB::beginTransaction();

            $usuario = new Usuario();
            $usuario->nome_usuario = $request->nome;
            $usuario->email = $request->email;
            $usuario->cpf = UtilString::limpaCPF_CNPJ($request->cpf);
            $usuario->id_perfil = $request->perfil;
            $usuario->save();

            $arrayCeps = $request->cep;

            for ($i = 0; $i < sizeof($arrayCeps); $i++) {
                $logradouro = Logradouro::where("cep", $arrayCeps[$i])->first();
                $endereco = new Endereco();
                $endereco->id_logradouro = $logradouro->id;
                $endereco->id_usuario = $usuario->id;
                $endereco->save();
            }

            DB::commit();
            return redirect()->route('usuario.create')->with(['usuarioCreate' => true, 'msg' => 'Usuario cadastrado com sucesso!']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with(['usuarioCreate' => false, 'msg' => $exception->getMessage()]);
        }

    }


    public function show($id)
    {
        $usuario = Usuario::with("perfil", "logradouros")->find($id);

        return view("site.usuario.view")->with(["usuario" => $usuario]);
    }


    public function edit($id)
    {
        $perfil = Perfil::all();
        $usuario = Usuario::with("perfil", "logradouros")->find($id);
        return view("site.usuario.edit")->with(["perfil" => $perfil, "usuario" => $usuario]);
    }


    public function update(UpdateUsuarioRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $usuario = Usuario::with("perfil", "logradouros")->find($id);

            $usuario->nome_usuario = $request->nome;
            $usuario->email = $request->email;
            $usuario->cpf = UtilString::limpaCPF_CNPJ($request->cpf);
            $usuario->id_perfil = $request->perfil;
            $usuario->save();
            
            $arrayCeps = $request->cep;

            $endereco = Endereco::where("id_usuario", $usuario->id)->get();

            for ($i = 0; $i < sizeof($endereco); $i++) {
                $logradouro = Logradouro::where("cep", $arrayCeps[$i])->first();
                $atualizaEndereco = Endereco::find($endereco[$i]->id);
                $atualizaEndereco->id_logradouro = $logradouro->id;
                $atualizaEndereco->save();
            }

            DB::commit();
            return redirect()->route('usuario.index')->with(['usuarioCreate' => true, 'msg' => 'Usuario atualizado com sucesso!']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with(['usuarioCreate' => false, 'msg' => $exception->getMessage()]);
        }

    }


    public function destroy($id)
    {
        try {
            $usuario = Usuario::find($id);
            $usuario->logradouros()->detach();
            $usuario->perfil()->delete();
            $usuario->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with(['logradouroDelete' => false, 'msg' => $exception->getMessage()]);
        }


    }
}
