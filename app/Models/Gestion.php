<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;

    public function objetivosG(): HasMany
    {
        return $this->hasMany(ObjGestion::class, 'gestion_id');
    }
}
