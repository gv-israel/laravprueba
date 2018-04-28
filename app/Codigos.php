<?php

namespace PruebaHotel;

use Illuminate\Database\Eloquent\Model;

class Codigos extends Model
{

    protected $table  = "codigos";
    protected $fillable = [
       'idUsuario', 'codigo', 'canjeado'
    ];
    public $timestamps = false;
}
