<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $connection = 'glamping';
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;
    protected $fillable = ['id_cliente', 'id_empleado', 'fecha_hora'];
}
