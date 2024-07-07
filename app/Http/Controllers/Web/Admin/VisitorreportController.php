<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;
use App\Models\Property;

class VisitorreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visitors = Visitor::all();

        if ($request->start && $request->end) {
            $visitors = Visitor::whereBetween('created_at', [$request->start, $request->end])->get();
        }
        if ($request->start && $request->end && $request->customer) {
            $customerIds = Customer::where('name', 'LIKE', '%' . $request->customer . '%')->pluck('id')->toArray();
            $visitors = Visitor::whereBetween('created_at', [$request->start, $request->end])->WhereIn('customer_id', $customerIds)->get();
        }
        if ($request->customer) {
            $customerIds = Customer::where('name', 'LIKE', '%' . $request->customer . '%')->pluck('id')->toArray();
            $visitors = Visitor::WhereIn('customer_id', $customerIds)->get();
        }
        if ($request->property) {
            $propertyIds = Property::where('name', 'LIKE', '%' . $request->property . '%')->pluck('id')->toArray();
            $visitors = Visitor::WhereIn('property_id', $propertyIds)->get();
        }
        return view('admin.report.visitor', [
            'visitors' => $visitors,
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
