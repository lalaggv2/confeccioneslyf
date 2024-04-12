<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'supplier_id',
        'code',
        'quantity',
        'total',
        'payment_method',
        'reference',
        'status',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
