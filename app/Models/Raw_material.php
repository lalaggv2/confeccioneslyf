<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raw_material extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'raw_material';

    protected $fillable = [
        'id',
        'user_id',
        'document_type',
        'document',
        'address',
        'start_date',
        'phone',
        'eps',
        'rh',
        'gender',
        'position',
        'dob',
        'salary',
        'status',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
