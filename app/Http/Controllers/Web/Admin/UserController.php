<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\CustomerAttachment;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        $admins = Admin::all();
        if ($request->searchTerm) {
            $users = User::where('name', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('user_id', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('email', 'LIKE', '%' . $request->searchTerm . '%')
                ->get();
        }

        return view('admin.executive.index', [
            'users' => $users,
            'admins' => $admins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.executive.create');
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
            'role' => 'required',
            'password' => 'required',
        ]);

        if ($request->role == 'Executive') {
            User::create([
                'customer_id' => $request->customer_id,
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
        } elseif ($request->role == 'Admin') {
            Admin::create([
                'customer_id' => $request->customer_id,
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
        } else {
            dd($request->role);
        }
        return redirect()->back()->with('status', 'User Created successfully');
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
    public function editUser($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $data = compact('user');
            return view('admin.executive.edit')->with($data);
        }

        return redirect(url('/admin/executive'));
    }

    public function editAdmin($id)
    {
        $admin = Admin::find($id);
        if (!is_null($admin)) {
            $data = compact('admin');
            return view('admin.executive.edit')->with($data);
        }

        return redirect(url('/admin/executive'));
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
            'role' => 'required',
            'password' => 'sometimes',
        ]);

        $role = $request->role;

        // Find the user or admin based on role
        if ($role == 'Executive') {
            $editable = User::find($id);
        } elseif ($role == 'Admin') {
            $editable = Admin::find($id);
        } else {
            return redirect(url('/admin/executive'))->with('error', 'Invalid role');
        }

        if (is_null($editable)) {
            return redirect(url('/admin/executive'))->with('error', 'User/Admin not found');
        }

        $editable->update([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        if ($request->password) {
            $editable->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect(url('/admin/executive'))->with('status', 'User/Admin Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $admin = Admin::find($id);

        if (!is_null($user)) {
            $user->delete();
            return redirect(url('/admin/executive'))->with('status', 'User Deleted successfully');
        } elseif (!is_null($admin)) {
            $admin->delete();
            return redirect(url('/admin/executive'))->with('status', 'Admin Deleted successfully');
        } else {
            return redirect(url('/admin/executive'))->with('error', 'User/Admin not found');
        }
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

        return view('admin.executive.index', [
            'users' => $users
        ]);
    }
}
