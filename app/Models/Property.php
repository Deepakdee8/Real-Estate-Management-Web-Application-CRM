<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'name',
        'size',
        'facing',
        'type',
        'description',
        'budget',
        'photos',
        'location',
        'status',
    ];
    public function Property($propertyId)
    {
        return Property::where('id', $propertyId)->first();
    }
}
