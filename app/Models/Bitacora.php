<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacora';
    protected $fillable = ['user_id', 'busqueda', 'hostname', 'created_at', 'updated_at'];
    // protected $dates = ['fecha_ini', 'fecha_fin' ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    static public function adicionar($busqueda) {
        Bitacora::create([
            'user_id' => Auth::user()->id,
            'busqueda' => $busqueda,
            'hostname' => gethostname(),
        ]);
    }
}
