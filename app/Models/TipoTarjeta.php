<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTarjeta extends Model
{
    protected $connection = 'glamping';
    protected $table = 'tipos_tarjeta';
    protected $primaryKey = 'id_tipo';
    public $timestamps = false;
    protected $fillable = ['tipo'];
}
