<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $connection = 'glamping';
    protected $table = 'tarjetas';
    protected $primaryKey = 'id_tarjeta';
    public $timestamps = false;
    protected $fillable = ['numero_tarjeta', 'id_persona', 'id_tipo', 'id_banco'];
}
