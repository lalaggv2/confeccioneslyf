<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';
    
    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'product_id',
        'quantity',
        'price',
        'total'
    ];
    public function orderable()
    {
        return $this->morphTo();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
