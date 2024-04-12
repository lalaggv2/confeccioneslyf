<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleOrder extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'code',
        'quantity',
        'total',
        'payment_method',
        'reference',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'integer',
        'total' => 'decimal:2',
    ];

    /**
     * Get the customer that owns the sale order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
