<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleProperty extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_id',
        'customer_id',
        'property_id',
    ];

    public function Property()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
}
