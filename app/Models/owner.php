<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends Model
{
    use HasFactory;

    // This allows the Controller to save these specific fields
    protected $fillable = [
        'name',
        'surname'
    ];

    public function cars()
    {
        // Use the capitalized Class name
        return $this->hasMany(Car::class);
    }
}
