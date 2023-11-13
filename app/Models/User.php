<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function proyectos()
    {
        return $this->hasMany(OpProyectos::class, 'user_id');
    }

    public function archivos()
    {
        return $this->hasManyThrough(Archivos::class, OpProyectos::class,'user_id','op_proyectos_id');
    }
}
