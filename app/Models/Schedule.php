<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Schedule extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [

        'customer_id',
        'assignee_id',
        'date_time',
        'description',
        'reminder',

    ];
    public function User($userId)
    {
        return User::withTrashed()->where('id', $userId)->first();
    }

    public function Property($propertyId)
    {
        return Property::where('id', $propertyId)->first();
    }
    public function ScheduleProperty($scheduleId)
    {
        $propertyIds = ScheduleProperty::where('schedule_id', $scheduleId)->pluck('property_id')->toArray();
        return Property::whereIn('id', $propertyIds)->get();
    }
    public function Customer($customerId)
    {
        return Customer::withTrashed()->where('id', $customerId)->first();
    }
}
