<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjEspecificos extends Model
{
    use HasFactory;


    public function objetivoG(): BelongsTo
    {
        return $this->belongsTo(ObjGestion::class, 'obj_gestion_id');
    }


    public function operaciones(): HasMany
    {
        return $this->hasMany(OpProyectos::class, 'obj_especifico_id');
    }
}
