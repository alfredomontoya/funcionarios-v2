<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;

    protected $table = 'gestion';
    protected $fillable = ['user_id', 'year', 'titulo', 'descripcion', 'count_funcionarios', 'url_file', 'procesado', 'estado'];

    public function user () {
        return $this->belongsTo(User::class);
    }

    static public function activas() {
        return Gestion::where('estado', 1)->get();
    }

    // public function getCountFuncionariosAttribute() {
    //     return Funcionario::where('gestion_id', $this->id)->get()->count();
    // }
}
