<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $connection = 'glamping';
    protected $table = 'bancos';
    protected $primaryKey = 'id_banco';
    public $timestamps = false;
    protected $fillable = ['nombre'];
}
