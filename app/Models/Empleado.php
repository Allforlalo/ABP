<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $connection = 'glamping';
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false;
    protected $fillable = ['id_persona', 'id_cargo', 'id_horario'];
}
