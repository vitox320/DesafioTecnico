<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model
{
    use HasFactory;

    protected $table = 'logradouros';
    protected $fillable = ["cep", "nome_rua", "numero", "bairro", "cidade", "estado"];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, "logradouro_usuario", "id_usuario", "id_logradouro");
    }
}
