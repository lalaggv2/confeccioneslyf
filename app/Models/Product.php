<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['name', 'description', 'stock', 'type'];

    protected $dates = ['deleted_at'];

    public function sales()
    {
        return $this->hasMany(SaleOrder::class);
    }

    public function purchases()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
