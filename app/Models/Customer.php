<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'document_type',
        'document',
        'name',
        'address',
        'phone',
    ];
}