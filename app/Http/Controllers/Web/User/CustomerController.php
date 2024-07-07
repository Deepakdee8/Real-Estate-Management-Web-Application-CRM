<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\CustomerAttachment;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $customerIds = Customer::all();
        $customers = Schedule::where('assignee_id', $userId)->get();

        if ($request->searchTerm) {
            $customerIds = Customer::Where('name', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('phone', 'LIKE', '%' . $request->searchTerm . '%')
                ->pluck('id')->toArray();

            $customers = Schedule::Where('assignee_id', $userId)
                ->whereIn('customer_id', $customerIds)
                ->get();
        }

        // Assuming $customerIds is an array of customer IDs

        return view('user.customer.index', [
            'customers' => $customers,
        ]);
    }

    public function attachmentIndex(Request $request, $id)
    {
        $attachments = CustomerAttachment::where('customer_id', $id)->get();
        return view('user.customer.attachment', [
            'attachments' => $attachments,
            'customerId' => $id,
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
