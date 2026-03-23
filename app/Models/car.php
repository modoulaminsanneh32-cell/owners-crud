<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_number',
        'brand',
        'model',
        'owner_id' // This is already here in your photo, keep it!
    ];

    public function owner()
    {
        // Use the capitalized Class name
        return $this->belongsTo(Owner::class);
    }
}
