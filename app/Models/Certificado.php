<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Certificado
 *
 * @property $tipo_certificado
 * @property $id_empleado
 * @property $cargo
 * @property $salario
 *
 * @property Empleado $empleado
 * @property Solicitude[] $solicitudes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Certificado extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_certificado', 'id_empleado', 'cargo', 'salario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empleado()
    {
        return $this->belongsTo(\App\Models\Empleado::class, 'id_empleado', 'id_empleado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitudes()
    {
        return $this->hasMany(\App\Models\Solicitude::class, 'tipo_certificado', 'tipo_certificado');
    }
    

}
