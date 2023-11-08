<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpProyectos extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the OpProyectos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function objetivoE(): BelongsTo
    {
        return $this->belongsTo(ObjEspecificos::class, 'obj_especifico_id');
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function archivos(): HasMany
    {
        return $this->hasMany(Archivos::class, 'op_proyectos_id');
    }
}
