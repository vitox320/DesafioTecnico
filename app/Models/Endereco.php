<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'logradouro_usuario';
    protected $fillable = ['id_logradouro','id_usuario'];

    public $timestamps = false;
}
