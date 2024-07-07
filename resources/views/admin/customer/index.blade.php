@extends('layouts.admin')

@section('content')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Customer</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Customer</li>
            </ul>
        </div>
        <div class="col-auto float-end ms-auto">
            <a href="{{ route ('admin.customer.create')}} " class="btn add-btn">
                <i class="fa-solid fa-plus"></i> Add Customer
            </a>
        </div>
    </div>
</div>
<form action="{{route('admin.customer.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-9 col-md-9">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="searchTerm" placeholder="Search by Customer name, Customer id">
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
                        <th>Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $customer)
                    <tr>

                        <td>{{$customer->customer_id}}</td>
                        <td>
                            <h2>
                                <span>{{$customer->name}}</span></a>
                            </h2>
                        </td>

                        <td>{{$customer->phone}}</td>
                        <td>
                            <span>{{$customer->address}}</span>
                        </td>
                        <td style="width: 20%;">
                            <div class="d-flex flex-row  ">
                                <a class="btn btn-info mx-2" href="{{ route('customer.attachment.index', ['attachment' => $customer->id]) }}"> Attachments</a>
                                <a class="btn btn-info mx-2" href="{{ route('admin.customer.edit',['customer'=>$customer->id]) }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>

                                <form action="{{ route('admin.customer.destroy',['customer'=>$customer->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure ? Do you want to delete the user')" href=""><i class="fa-regular fa-trash-can m-r-5"></i> Delete</button>
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