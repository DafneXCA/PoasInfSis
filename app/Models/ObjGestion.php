<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjGestion extends Model
{
    use HasFactory;

public function gestion(): BelongsTo
{
    return $this->belongsTo(Gestion::class, 'gestion_id');
}

public function objetivosE(): HasMany
{
    return $this->hasMany(ObjEspecificos::class, 'obj_gestion_id');
}

}
