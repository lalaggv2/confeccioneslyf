<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    protected $table = 'empleados';

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'telefono',
        'cargo',
        'salario',
        'correo'
    ];
    protected $guarded = [];


}
