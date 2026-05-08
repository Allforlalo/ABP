<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $connection = 'glamping';
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    public $timestamps = false;
    protected $fillable = ['nombre', 'apellido_paterno', 'apellido_materno', 'ine'];
}
