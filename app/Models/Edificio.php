<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    use HasFactory;

    protected $table = 'edificio';
    protected $fillable = ['nombre', 'encargado', 'gestion', 'estado'];
    //protected $dates = ['fecha_ini', 'fecha_fin' ];

    public function getDecodeEstadoAttribute(){
        switch ($this->estado) {
            case 0:
                # code...
                return json_encode(["estado" => "ANULADO", "color" =>"danger"]);
                break;
            case 1:
                # code...
                return json_encode(["estado" => "ACTIVO", "color" =>"success"]);
                break;
        }
    }
}
