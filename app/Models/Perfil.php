<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfils';
    protected $fillable = ["nome_perfil","descricao"];

    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }
}
