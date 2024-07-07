<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\RoutesNotifications;
use Illuminate\Notifications;
use App\Models\Property;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use App\Models\Schedule;
use App\Notifications\ScheduleNotification;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $propertyCount = Property::count();
        $visitorCount = Visitor::count();
        $scheduleCount = Schedule::where('assignee_id', $userId)->count();


        $notifications = DB::table('notifications')
            ->where('notifiable_id', 1)
            ->where('data->assignee_id', $userId)->get();

        $data = Schedule::select('id', 'customer_id', 'assignee_id', 'date_time', 'reminder')->get();
        $recentNotifications = [];
        foreach ($data as $schedule) {

            $scheduleDateTime = Carbon::parse($schedule->date_time);

            $currentTime = Carbon::now();

            $diffHours = $scheduleDateTime->diffInHours($currentTime);

            if ($diffHours  < 24) {
                $startDateTime = $startDateTime = $scheduleDateTime->copy()->subHours(24);
                $endDateTime = $scheduleDateTime;

                $recentNotifications = Schedule::where('assignee_id', $userId)
                    ->whereBetween('date_time', [$startDateTime, $endDateTime])->get();
            }
        }

        return view('home', [
            'propertyCount' => $propertyCount,
            'visitorCount' => $visitorCount,
            'scheduleCount' => $scheduleCount,
            'notifications' => $notifications,
            'recentNotifications' => $recentNotifications,
            'property' => Property::first(),
            'customer' => Customer::first(),
            'user' => User::first(),
        ]);
    }
    public function notifyuser()
    {
        $userId = Auth::user()->id;
        $propertyCount = Property::count();
        $visitorCount = Visitor::count();
        $scheduleCount = Schedule::where('assignee_id', $userId)->count();

        $notifications = DB::table('notifications')
            ->where('notifiable_id', 1)
            ->where('data->assignee_id', $userId)->get();

        $data = Schedule::select('id', 'customer_id', 'assignee_id', 'date_time', 'reminder')->get();
        $recentNotifications = [];
        foreach ($data as $schedule) {

            $scheduleDateTime = Carbon::parse($schedule->date_time);

            $currentTime = Carbon::now();

            $diffHours = $scheduleDateTime->diffInHours($currentTime);

            if ($diffHours  < 24) {
                $startDateTime = $startDateTime = $scheduleDateTime->copy()->subHours(24);
                $endDateTime = $scheduleDateTime;

                $recentNotifications = Schedule::where('assignee_id', $userId)
                    ->whereBetween('date_time', [$startDateTime, $endDateTime])->get();
            }
        }
        return view('home', [
            'propertyCount' => $propertyCount,
            'visitorCount' => $visitorCount,
            'scheduleCount' => $scheduleCount,
            'notifications' => $notifications,
            'recentNotifications' => $recentNotifications,
            'property' => Property::first(),
            'customer' => Customer::first(),
            'user' => User::first(),
        ]);
    }
    public function markasreaduser($id)
    {
        if ($id) {
            auth()->user()->unreadNotifications->where('id', $id)->markasreaduser();
        }
        return back();
    }
}
