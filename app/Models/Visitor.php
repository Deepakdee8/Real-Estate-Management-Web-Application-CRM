<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [

        'customer_id',
        'assignee_id',
        'property_id',
        'property_type',

    ];
    public function User($userId)
    {
        return User::withTrashed()->where('id', $userId)->first();
    }

    public function Property($propertyId)
    {
        return Property::where('id', $propertyId)->first();
    }
    public function Customer($customerId)
    {
        return Customer::withTrashed()->where('id', $customerId)->first();
    }
}
