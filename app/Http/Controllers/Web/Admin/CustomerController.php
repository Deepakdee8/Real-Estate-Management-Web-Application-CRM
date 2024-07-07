<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\CustomerAttachment;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = Customer::all();
        if ($request->searchTerm) {
            $users = Customer::where('name', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('customer_id', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('email', 'LIKE', '%' . $request->searchTerm . '%')
                ->get();
        }

        return view('admin.customer.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
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
            'customer_id' => 'required|unique:users,customer_id',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
           
        ]);

        Customer::create([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            
        ]);

        return redirect()->back()->with('status', 'User Added successfully');
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
        $user = Customer::find($id);
        if (is_null($user)) {
            return redirect(url('/admin/customer'));
        } else {

            $data = compact('user');
            return view('admin.customer.edit')->with($data);
        }
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            
        ]);

        $user = Customer::find($id);

        $user->update([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);




        return redirect()->back()->with('status', 'User Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Customer::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        // User::where('id', $id)->delete();

        return redirect(url('/admin/customer'))->with('status', 'User Deleted successfully');
    }
    public function search(Request $request)
    {
        $users = array();
        /*
        if($request->username)
        {
            $result= User::where('name','LIKE','%'.$request->username.'%')->get();
        }
        if($request->username && $request->userid )
        {
            $result= User::where('name','LIKE','%'.$request->username.'%')
                           ->where('user_id','LIKE','%'.$request->userid.'%')
                           ->get();
        }
        dd($result);

        $data = compact('users','result');*/

        return view('admin.customer.index', [
            'users' => $users
        ]);
    }

    public function attachmentIndex(Request $request, $id)
    {
        $attachments = CustomerAttachment::where('customer_id', $id)->get();
        return view('admin.customer.attachment', [
            'attachments' => $attachments,
            'customerId' => $id,
        ]);
    }
    public function attachmentStore(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'name' => 'required',
            'attachment' => 'required',
        ]);

        // $propertyname= Property::select('name')->where('id', $request->property_id)->get();

        $attachmentFullURL = "";
        if ($attachment = $request->file('attachment')) {
            $attachmentOriginalName = $attachment->getClientOriginalName();
            $extension = pathinfo($attachmentOriginalName, PATHINFO_EXTENSION);
            $newattachmentName = rand() . '-' . $attachmentOriginalName;
            $attachmentFullURL = 'attachment-' . $newattachmentName;
            $attachment->storeAs('attachments/', $attachmentFullURL, ['disk' => 'public_uploads']);
        }

        CustomerAttachment::create([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'attachment' => $attachmentFullURL,
        ]);

        return redirect()->back()->with('status', 'Attachment Added successfully');
        
    }
    public function attachmentDelete($id)
    {
        CustomerAttachment::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Attachment Deleted');
    }
}
