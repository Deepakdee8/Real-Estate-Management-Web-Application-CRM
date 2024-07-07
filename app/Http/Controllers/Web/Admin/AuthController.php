<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Property;
use App\Models\User;
use App\Models\Admin;
use App\Models\Visitor;
use App\Notifications\ScheduleNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;


class AuthController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function loginHandle(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('webadmin')->attempt($request->only(['email', 'password']))) {
            session(['adminName' => Auth::guard('webadmin')->user()->name]);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.dashboard');
    }
    public function logout()
    {
        Auth::guard('webadmin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $propertyCount = Property::count();
        $visitorCount = Visitor::count();
        $scheduleCount = Schedule::count();

        $data = Schedule::select('id', 'customer_id', 'assignee_id', 'date_time', 'reminder')->get();
        $recentNotifications = [];
        foreach ($data as $schedule) {

            $scheduleDateTime = Carbon::parse($schedule->date_time);

            $currentTime = Carbon::now();

            $diffHours = $scheduleDateTime->diffInHours($currentTime);

            if ($diffHours  < 24) {
                $startDateTime = $startDateTime = $scheduleDateTime->copy()->subHours(24);
                $endDateTime = $scheduleDateTime;

                $recentNotifications = Schedule::whereBetween('date_time', [$startDateTime, $endDateTime])->get();
            }
        }
        return view('admin.dashboard', [
            'propertyCount' => $propertyCount,
            'recentNotifications' => $recentNotifications,
            'visitorCount' => $visitorCount,
            'scheduleCount' => $scheduleCount,
            'property' => Property::first(),
            'customer' => Customer::first(),
            'user' => User::first(),

        ]);
    }

    public function notify()
    {
        if (auth()->user()) {
            $data = Schedule::select('id', 'customer_id', 'assignee_id', 'date_time', 'reminder')->get();
            foreach ($data as $schedule) {

                $scheduleDateTime = date('Y-m-d H:i:s', strtotime($schedule->date_time));
                $reminderDateTime = date('Y-m-d H:i:s', strtotime($schedule->reminder));
                $currentDateTime = date('Y-m-d H:i:s');

                if ($currentDateTime >= $reminderDateTime && $currentDateTime <= $scheduleDateTime) {
                    $notificationExists = DB::table('notifications')
                        ->where('data', json_encode($schedule))
                        ->exists();
                    if (!$notificationExists) {
                        $admins = Admin::all();
                        Notification::send($admins, new ScheduleNotification($schedule));
                        // auth()->user()->notify(new ScheduleNotification($schedule));
                    }
                }
            }
        }

        // $recentdata = Schedule::select('id', 'customer_id', 'assignee_id', 'date_time', 'reminder')->get();
        // $recentNotifications= [];
        // foreach ($recentdata as $recentschedule) {

        //     $scheduleDateTime = Carbon::parse($recentschedule->date_time);

        //     $currentTime = Carbon::now();

        //     $diffHours = $scheduleDateTime->diffInHours($currentTime);

        //     if ($diffHours  < 24) {
        //         $startDateTime = $startDateTime = $scheduleDateTime->copy()->subHours(24); 
        //         $endDateTime = $scheduleDateTime; 

        //         $recentNotifications = Schedule::whereBetween('date_time', [$startDateTime, $endDateTime])->get();
        //     }
        // }
        return redirect(url("/admin/dashboard"));
    }
    public function markasread($id)
    {
        if ($id) {
            auth()->user()->unreadNotifications->where('id', $id)->markasread();
        }
        return back();
    }
}
