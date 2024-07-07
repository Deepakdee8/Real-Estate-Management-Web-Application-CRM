<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleProperty;
use App\Models\User;
use App\Models\Customer;
use App\Models\Property;

class SchedulereportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schedules = Schedule::all();
        $scheduleproperty = ScheduleProperty::all();
        if ($request->date) {
            $schedules = Schedule::WhereDate('date_time', $request->date)->get();
            $scheduleproperty = ScheduleProperty::all();
        }

        if ($request->customer) {
            $customerIds = Customer::where('name', 'LIKE', '%' . $request->customer . '%')->pluck('id')->toArray();
            $schedules = Schedule::whereIn('customer_id', $customerIds)->get();
            $scheduleproperty = ScheduleProperty::all();
        }

        if ($request->property) {
            $propertyIds = Property::where('name', 'LIKE', '%' . $request->property . '%')->pluck('id')->toArray();
            $schedules = Schedule::whereIn('customer_id', $propertyIds)->get();
            $scheduleproperty = ScheduleProperty::all();
        }
        if ($request->date && $request->customer) {
            $customerIds = Customer::where('name', 'LIKE', '%' . $request->customer . '%')->pluck('id')->toArray();
            $schedules = Schedule::whereDate('date_time', $request->date)->WhereIn('customer_id', $customerIds)->get();
            $scheduleproperty = ScheduleProperty::all();
        }
        if ($request->property && $request->customer) {
            $customerIds = Customer::where('name', 'LIKE', '%' . $request->customer . '%')->pluck('id')->toArray();
            $propertyIds = Property::where('name', 'LIKE', '%' . $request->property . '%')->pluck('id')->toArray();

            $schedules = Schedule::whereIn('customer_id', $customerIds)->whereIn('customer_id', $propertyIds)->get();
            $scheduleproperty = ScheduleProperty::all();
        }

        return view('admin.report.schedule', [
            'schedules' => $schedules,
            'scheduleproperty'=> $scheduleproperty
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
