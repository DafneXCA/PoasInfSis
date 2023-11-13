<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjEspecificos extends Model
{
    use HasFactory;


    public function objetivoG()
    {
        return $this->belongsTo(ObjGestion::class, 'obj_gestion_id');
    }


    public function operaciones()
    {
        return $this->hasMany(OpProyectos::class, 'obj_especifico_id');
    }
}
