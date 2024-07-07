@extends('layouts.admin')

@section('content')



<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Customer Visits</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route ('admin.visitor.index')}}">Customer Visits</a></li>
            </ul>
        </div>
        <div class="col-auto float-end ms-auto">
            <a href="{{ route('admin.visitor.create')}}" class="btn add-btn" data-bs-target="#create_project"><i class="fa-solid fa-plus"></i> Add Visits</a>

        </div>
    </div>
</div>


<form action="{{route('admin.visitor.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-9 col-md-9">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="searchTerm" placeholder="Search by Property Name, Customer name or Property type">
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
                        <th class="text-center">Action</th>
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
                        <td style="width: 20%;">
                            <div class="d-flex flex-row  ">
                                <a class="btn btn-info mx-2" href="{{ route('admin.visitor.edit',['visitor'=>$visitor->id]) }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>

                                <form action="{{ route('admin.visitor.destroy',['visitor'=>$visitor->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure ? Do you want to delete the visitor')" href=""><i class="fa-regular fa-trash-can m-r-5"></i> Delete</button>
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


<div class="modal custom-modal fade" id="delete_project" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Project</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection