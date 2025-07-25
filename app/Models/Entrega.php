<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $table = 'entrega';
    protected $fillable = ['user_id', 'funcionario_id', 'descripcion', 'img', 'estado'];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function funcionario () {
        return $this->belongsTo(Funcionario::class);
    }
}
