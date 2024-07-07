<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use App\Models\Property;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Helpers\Whatsapp;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->searchTerm) {
            $propertyIds = Property::where('name', 'LIKE', '%' . $request->searchTerm . '%')->pluck('id')->toArray();
            $customerIds = User::where('name', 'LIKE', '%' . $request->searchTerm . '%')->pluck('id')->toArray();
            $visitors = Visitor::where('property_type', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhereIn('property_id', $propertyIds)
                ->orWhereIn('customer_id', $customerIds)
                ->get();
        } else {
            $visitors = Visitor::all();
            $users = User::all();
        }
        return view('admin.visitor.index', [
            'visitors' => $visitors,
            'user' => User::first(),
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
        $properties = Property::all();
        $users = User::all();

        return view('admin.visitor.create', [
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
            'property_type' => 'required',

        ]);

        Visitor::create([
            'customer_id' => $request->customer_id,
            'assignee_id' => $request->assignee_id,
            'property_id' => $request->property_id,
            'property_type' => $request->property_type,

        ]);

        $phone = Customer::where('id', $request->customer_id)->pluck('phone')->first();
        $content = "Thank you for visiting our property at Samatha Group! We hope you found it interesting. If you have any questions or need further assistance, feel free to reach out anytime.";
        Whatsapp::sendMessage($phone, $content);

        return redirect()->back()->with('status', 'Visitor Added successfully');
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
        $visitor = Visitor::find($id);
        $customers = Customer::all();
        $properties = Property::all();
        $users = User::all();
        return view('admin.visitor.edit', [
            'visitor' => $visitor,
            'customers' => $customers,
            'properties' => $properties,
            'users' => $users,
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
        $this->validate($request, [
            'customer_id' => 'required',
            'assignee_id' => 'required',
            'property_id' => 'required',
            'property_type' => 'required',
        ]);

        $visitors = Visitor::find($id);

        $visitors->update([
            'customer_id' => $request->customer_id,
            'assignee_id' => $request->assignee_id,
            'property_id' => $request->property_id,
            'property_type' => $request->property_type,
        ]);

        return redirect()->back()->with('status', 'Visitor Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visitor::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Visitor Deleted');
    }

    public function propertytypeSearch(Request $request)
    {

        return Property::select('type')->where('id', $request->property_id)->get();
    }
}
