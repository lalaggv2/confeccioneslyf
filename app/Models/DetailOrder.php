<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'product_id',
        'quantity',
        'price',
        'total',
        // Agrega aquí otros campos necesarios
    ];

    // Relación polimórfica con el modelo Orderable
    public function orderable()
    {
        return $this->morphTo();
    }

    // Relación con el modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
