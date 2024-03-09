<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    public $timestamps=false;



    use HasFactory;
    protected $table='empleados';
    protected $primarykey='id';
    protected $fillable=['id','nombre','direccion','telefono','cargo','salario','correo',];
    protected $guarded=[];
    
    
}
