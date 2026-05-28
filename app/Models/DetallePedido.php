<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $connection = 'glamping';
    protected $table = 'detalles_pedido';
    protected $primaryKey = 'id_detalle';
    public $timestamps = false;
    protected $fillable = ['id_cliente', 'id_producto', 'cantidad'];
}
