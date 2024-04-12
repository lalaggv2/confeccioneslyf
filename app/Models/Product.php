<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'stock',
        'type',
        'created_at', 
        'updated_at'
    ];

    // Relación con el modelo ProductDetail
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
