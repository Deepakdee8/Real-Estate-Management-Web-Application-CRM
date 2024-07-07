@extends('layouts.admin')

@section('content')



<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Visitor</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item ">Visitor</li>
                <li class="breadcrumb-item active">Report</li>
            </ul>
        </div>

    </div>
</div>


<form action="{{route('admin.visitorreport.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-6 col-md-2">
            <div class="input-block mb-3 form-focus">

                <input class="form-control" type="date" name="start" placeholder="Created at">
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="input-block mb-3 form-focus">
                <input class="form-control" type="date" name="end" placeholder="Deadline">
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="customer" placeholder="Customer">
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="property" placeholder="Proprty  Name">
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
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
                        <th>Customer Name </th>
                        <th>Property Name </th>
                        <th>Property Type</th>
                        <th>Created at</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $visitor)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $visitor->Customer($visitor->customer_id)->name }} </td>

                        <td> {{ $visitor->Property($visitor->property_id)->name }} </td>
                        <td> {{ $visitor->Property($visitor->property_id)->type }} </td>

                        <td> {{$visitor->created_at}} </td>

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
                    <h3>Delete Visitor</h3>
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