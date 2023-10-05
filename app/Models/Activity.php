<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function proyect()
    {
        return $this->belongsTo(Proyect::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
