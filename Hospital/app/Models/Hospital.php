<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public $timestamps = false;

        protected $fillable = [
        'nombre',
        'ciudad',
        'fecha_inauguracion',
        'camas_disponibles',
    ];
}
