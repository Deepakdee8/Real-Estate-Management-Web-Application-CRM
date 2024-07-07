@extends('layouts.app')

@section('content')



<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Customer Visits</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Customer Visits</li>
            </ul>
        </div>

    </div>
</div>


<form action="{{route('user.visits.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-9 col-md-9">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="searchTerm" placeholder="Search by Property Name or Customer name">
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
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Executive Name</th>
                        <th>Property Name</th>
                        <th>Property Type</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $visitor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{$visitor->Customer($visitor->customer_id)->name}} </td>
                        <td> {{$visitor->User($visitor->assignee_id)->name}} </td>
                        <td> {{$visitor->Property($visitor->property_id)->name}} </td>
                        <td> {{$visitor->property_type}} </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection