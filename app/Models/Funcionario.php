<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionario';

    protected $fillable = ['nro', 'ci', 'nombres', 'apellidos', 'cargo', 'edificio', 'tipo', 'responsable', 'telresponsable', 'gestion_id', 'estado'];

    public function gestion () {
        return $this->belongsTo(Gestion::class);
    }

    public function getDetalleAttribute() {
        return "{$this->nombres} {$this->apellidos}";
    }

    public function getUltimaEntregaAttribute(){
        return Entrega::where('funcionario_id', $this->id)->orderBy('created_at', 'desc')->first();
    }
}
