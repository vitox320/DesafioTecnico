<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $fillable = ['nome_usuario', "email", "cpf", "id_perfil", "created_at"];

    public function perfil()
    {
        return $this->hasOne(Perfil::class, "id", "id_perfil");
    }

    public function logradouros()
    {
        return $this->belongsToMany(Logradouro::class, "logradouro_usuario", "id_usuario", "id_logradouro");
    }

    function limpaCPF_CNPJ($valor)
    {
        $valor = preg_replace('/[^0-9]/', '', $valor);
        return $valor;
    }
}
