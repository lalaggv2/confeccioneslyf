<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Suppliers';
    protected $fillable = ['document_type', 'document', 'name', 'address', 'phone', 'email'];

    protected $dates = ['deleted_at'];

    public function purchases()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
