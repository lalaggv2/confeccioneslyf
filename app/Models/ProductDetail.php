<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_details';

    protected $fillable = [
        'product_id',
        'sku',
        'barcode',
        'size',
        'color',
        'material',
        'location',
        'price',
        'stock',
        'date_manufactured',
        'notes'
    ];

    protected $dates = ['date_manufactured', 'deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
