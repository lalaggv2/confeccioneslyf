<?php

    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;
    
    class product extends Model
    {
        protected $fillable = [
            'name',
            'description',
            'stock',
            'type',
            'created_at',
            'updated_at',
        ];
    }
    
     
 
