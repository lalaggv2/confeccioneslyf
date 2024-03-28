<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sale_orders';

    protected $fillable = [
        'customer_id',
        'code',
        'quantity',
        'total',
        'payment_method',
        'reference',
        'status'
    ];

    protected $dates = ['deleted_at'];
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
