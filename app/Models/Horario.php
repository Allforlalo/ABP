<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $connection = 'glamping';
    protected $table = 'horarios';
    protected $primaryKey = 'id_horario';
    public $timestamps = false;
    protected $fillable = ['hora_entrada', 'hora_salida'];
}
