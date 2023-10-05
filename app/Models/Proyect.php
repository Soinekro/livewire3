<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    use HasFactory;

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * relacion con ProyectUser
     */
    public function proyectUsers()
    {
        return $this->hasMany(ProyectUser::class);
    }

}
