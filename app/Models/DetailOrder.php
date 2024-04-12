<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

   

    

    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'product_id',
        'quantity',
        'price',
        'total',
    ];

    // Relación polimórfica con el modelo relacionado
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
