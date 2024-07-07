@extends('layouts.admin')

@section('content')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Schedule</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"> <a href=" {{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Schedule</li>
            </ul>
        </div>
        <div class="col-auto float-end ms-auto">
            <a href="{{ route ('admin.schedule.create')}} " class="btn add-btn">
                <i class="fa-solid fa-plus"></i> Add Schedule
            </a>
        </div>
    </div>
</div>
<form action="{{route('admin.schedule.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-9 col-md-9">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="searchTerm" placeholder="Search by Customer name, Assignee Name">
            </div>
        </div>
        <div class="col-sm-3 col-md-3">
            <button class="btn btn-success w-100">Search</button>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Assignee</th>
                        <th>Property Name</th>
                        <th>Scheduled date</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->Customer($schedule->customer_id)->name }} </td>
                        <td>{{ $schedule->User($schedule->assignee_id)->name }} </td>

                        <td>
                            @foreach($schedule->ScheduleProperty($schedule->id) as $property)
                            <p>{{ $loop->iteration }}) {{ $property->name }}</p>
                            @endforeach
                        </td>

                        <td>
                            <span>{{$schedule->date_time}}</span>
                        </td>
                        <td> {{$schedule->description}} </td>

                        <td style="width: 20%;">
                            <div class="d-flex flex-row  ">
                                <a class="btn btn-info mx-2" href="{{ route('admin.schedule.edit',['schedule'=>$schedule->id]) }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>

                                <form action="{{ route('admin.schedule.destroy',['schedule'=>$schedule->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure ? Do you want to delete the schedule')" href=""><i class="fa-regular fa-trash-can m-r-5"></i> Delete</button>
                                </form>
                            </div>


                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection