<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $connection = 'glamping';
    protected $table = 'cargos';
    protected $primaryKey = 'id_cargo';
    public $timestamps = false;
    protected $fillable = ['nombre'];
}
