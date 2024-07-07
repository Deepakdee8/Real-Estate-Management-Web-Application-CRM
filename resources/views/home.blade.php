@extends('layouts.app')

@section('content')
<div class="py-5" style=" text-align: center;">
    <img src="{{ asset('assets/theme/images/Samatha-Group-logo.png') }}" alt="Logo" width="350" height="60px">
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa-solid la-building"></i></span>
                <div class="dash-widget-info">
                    <a href="{{ route('user.property.index') }}">
                        <h3>{{ $propertyCount }}</h3>
                        <span>Property</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa-solid la la-users"></i></span>
                <div class="dash-widget-info">
                    <a href="{{ route('user.visits.index') }}">
                        <h3>{{ $visitorCount }}</h3>
                        <span>Visitors</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card dash-widget">
            <div class="card-body">
                <span class="dash-widget-icon"><i class="fa-solid la-history"></i></span>
                <div class="dash-widget-info">
                    <a href="{{ route('user.schedule.index') }}">
                        <h3>{{ $scheduleCount }}</h3>
                        <span>Schedules</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    @foreach($recentNotifications as $key => $notification)
    <div class=" col-md-8 mb-4 alert alert-solid-primary rounded-pill alert-dismissible fade show">

        @php
        $formattedDateTime = date('d-m-Y h:i A', strtotime($notification->date_time));
        @endphp

        <h5 class="text-white">
            Property Visit has been Scheduled Today for {{ $customer->Customer($notification->customer_id)->name }} and Assigned to Executive {{ $user->User($notification->assignee_id)->name }}
        </h5>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fas fa-xmark"></i></button>
    </div>
    @endforeach

</div>
<div class="container">
    <div class="row justify-content-center">

        @foreach( $notifications as $notification )
        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card bg-white border-0">
                <div class="alert custom-alert1 alert-primary">
                    <div class="text-start  px-2 pb-0">
                        <div class="custom-alert-icon">
                            <i class="feather-info flex-shrink-0"></i>
                        </div>

                        @php
                        $notify= json_decode($notification->data);
                        $formattedDateTime = date('d-m-Y h:i A', strtotime($notify->date_time));
                        @endphp

                        <h3 class="mb-2 text-capitalize">{{ $customer->Customer($notify->customer_id)->name }}</h3>

                        <p class="h4">

                            Property Visit has been Scheduled for {{ $customer->Customer($notify->customer_id)->name }} at {{ $formattedDateTime }} and Assigned to Executive {{ $user->User($notify->assignee_id)->name }}

                        </p>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection