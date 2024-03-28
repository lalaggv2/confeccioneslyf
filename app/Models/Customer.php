<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';
    protected $fillable = ['document_type', 'document', 'name', 'address', 'phone'];

    protected $dates = ['deleted_at'];

    public function sales()
    {
        return $this->hasMany(SaleOrder::class);
    }

}
