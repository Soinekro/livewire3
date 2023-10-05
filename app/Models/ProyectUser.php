<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectUser extends Model
{
    use HasFactory;

    //protected $table = 'proyect_user';

    public function proyect()
    {
        return $this->belongsTo(Proyect::class);
    }
}
