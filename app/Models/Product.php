<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'stock',
        'type',
        // Agrega aquí otros campos necesarios
    ];

    // Relación con el modelo ProductDetail
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
