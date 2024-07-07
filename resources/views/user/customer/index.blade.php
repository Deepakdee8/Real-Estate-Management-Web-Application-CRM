@extends('layouts.app')

@section('content')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Customers details </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item ">Customers details </li>

            </ul>
        </div>

    </div>
</div>



<form action="{{route('user.customer.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-9 col-md-9">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="searchTerm" placeholder="Search by Customer name">
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
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>E-Mail</th>
                        <th>Address</th>
                        <th>Property Name</th>
                        <th>Attachments</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td><a href="{{route('user.customer.attachment.index', ['attachment' => $customer->customer_id])}}">{{$customer->Customer($customer->customer_id)->customer_id}}</td>
                        <td>
                            <h2>
                                <span><a href="{{route('user.customer.attachment.index', ['attachment' => $customer->customer_id])}}">{{$customer->Customer($customer->customer_id)->name}}</span></a>
                            </h2>
                        </td>

                        <td><a href="{{route('user.customer.attachment.index', ['attachment' => $customer->customer_id])}}">{{$customer->Customer($customer->customer_id)->phone}}</td>
                        <td><a href="{{route('user.customer.attachment.index', ['attachment' => $customer->customer_id])}}">{{$customer->Customer($customer->customer_id)->email}}</td>
                        <td>
                            <a href="{{route('user.customer.attachment.index', ['attachment' => $customer->customer_id])}}"><span>{{$customer->Customer($customer->customer_id)->address}}</span>
                        </td>
                        <td><a href="{{route('user.customer.attachment.index', ['attachment' => $customer->customer_id])}}"> @foreach($customer->ScheduleProperty($customer->id) as $property)
                                <p>{{ $loop->iteration }}) {{ $property->name }}</p>
                                @endforeach
                        </td>
                        <td><a class="btn btn-info mx-2" href="{{ route('user.customer.attachment.index', ['attachment' => $customer->customer_id]) }}"> View</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection