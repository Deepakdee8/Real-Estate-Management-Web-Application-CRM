<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Property;
use App\Models\Schedule;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $visitors = Visitor::where('assignee_id', $userId)->get();
        if ($request->searchTerm) {
            $customerIds = Customer::where('name', 'LIKE', '%' . $request->searchTerm . '%')->pluck('id')->toArray();
            $propertyIds = Property::where('name', 'LIKE', '%' . $request->searchTerm . '%')->pluck('id')->toArray();
            $visitors = Visitor::Where('assignee_id', $userId)
            ->whereIn('customer_id', $customerIds)
            ->orwhereIn('property_id', $propertyIds)
                ->get();
        }
      

        return view('user.visits.index', [
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
