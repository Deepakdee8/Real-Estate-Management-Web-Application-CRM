<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Customer;
use App\Models\Property;
use App\Models\ScheduleProperty;
use App\Helpers\Whatsapp;
use Illuminate\Support\Facades\DB;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scheduleproperty = []; // Define a default value for $scheduleproperty

        if ($request->searchTerm) {

            $customerIds = Customer::where('name', 'LIKE', '%' . $request->searchTerm . '%')->pluck('id')->toArray();
            $assigneeIds = User::where('name', 'LIKE',     '%' . $request->searchTerm . '%')->pluck('id')->toArray();
            $schedules = Schedule::whereIn('customer_id', $customerIds)
                ->orWhereIn('assignee_id', $assigneeIds)
                ->get();
        } else {
            // Define $schedules and $users here as well
            $schedules = Schedule::all();
            $users = User::all();
        }

        return view('admin.schedule.index', [
            'scheduleproperty' => $scheduleproperty,
            'schedules' => $schedules,
            'users' => $users ?? null, // Add null coalescing operator to avoid undefined variable error
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $users = User::all();
        $properties = Property::all();

        return view('admin.schedule.create', [
            'customers' => $customers,
            'properties' => $properties,
            'users' => $users,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'assignee_id' => 'required',
            'property_id' => 'required',
            'date_time' => 'required',
            'description' => 'sometimes',
            'reminder' => 'required',
        ]);

        $schedule = Schedule::create([
            'customer_id' => $request->customer_id,
            'assignee_id' => $request->assignee_id,
            'date_time' => $request->date_time,
            'description' => $request->description ?? 'Not entered any description',
            'reminder' => $request->reminder,
        ]);

        foreach ($request->property_id as $property_id) {
            $this->validate($request, [
                'property_id' => 'required',
                
            ]);

            ScheduleProperty::create([
                'schedule_id' => $schedule->id,
                'customer_id' => $request->customer_id,
                'property_id' => $property_id ,
            ]);
        }

        $phone = Customer::where('id', $request->customer_id)->pluck('phone')->first();
        $customerName = Customer::where('id', $request->customer_id)->pluck('name')->first();
        $scheduledate = Schedule::where('id', $schedule->id)->pluck('date_time')->first();
        $scheduledate = date('d-m-Y h:i A', strtotime($scheduledate));

        $propertylist = ScheduleProperty::where('schedule_id', $schedule->id)->pluck('property_id')->toArray();
        $propertynames = Property::whereIn('id', $propertylist)->pluck('name')->toArray();
        $propertynames = implode(",", $propertynames);
        $content = 'Dear ' . $customerName . ',\n\nWe are pleased to inform you that your upcoming property visit has been successfully scheduled. \n\nYou are scheduled to visit the following properties: ' . $propertynames . ' This visit is set for ' . $scheduledate . '\n\n If you have any inquiries or require further assistance, please reach out to us. \n\nThank you for choosing our services.\n\nBest regards,\n Samatha group';
        Whatsapp::sendMessage($phone, $content);

        return redirect()->back()->with('status', 'Schedule Created successfully');
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
        $schedule = Schedule::find($id);
        $scheduleproperties = ScheduleProperty::where('schedule_id', $id)->get();
        $customers = Customer::all();
        $properties = Property::all();
        $users = User::all();
        // dd($scheduleproperties);
        return view('admin.schedule.edit', [
            'schedule' => $schedule,
            'customers' => $customers,
            'properties' => $properties,
            'users' => $users,
            'scheduleproperties' => $scheduleproperties,
        ]);
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
        $scheduleID = $id;
        $this->validate($request, [
            'customer_id' => 'required',
            'assignee_id' => 'required',
            'property_id' => 'required',
            'date_time' => 'required',
            'description' => 'sometimes',
            'reminder' => 'required',
        ]);

        DB::table('notifications')
            ->where('data->id', $scheduleID)->delete();

        ScheduleProperty::where('schedule_id', $id)->delete();
        Schedule::where('id', $id)->delete();
        $schedule = Schedule::create([
            'customer_id' => $request->customer_id,
            'assignee_id' => $request->assignee_id,
            'date_time' => $request->date_time,
            'description' => $request->description ?? 'Not entered any description',
            'reminder' => $request->reminder,
        ]);


        foreach ($request->property_id as $property_id) {
            ScheduleProperty::create([
                'schedule_id' => $schedule->id,
                'customer_id' => $request->customer_id,
                'property_id' => $property_id,
            ]);
        }

        return redirect(url('/admin/schedule'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::where('id', $id)->delete();
        ScheduleProperty::where('schedule_id', $id)->delete();

        DB::table('notifications')
        ->where('data->id', $id)->delete();
        
        return redirect()->back()->with('status', 'Schedule Deleted');
    }
}
