@extends('layouts.admin')

@section('content')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Properties</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Properties</li>
            </ul>
        </div>
    </div>
</div>


<form action="{{route('admin.propertyreport.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="row filter-row">
            <div class="col-sm-6 col-md-2">
                <div class="input-block mb-3 form-focus">

                    <input type="text" class="form-control " name="property_type" placeholder="Property Type">
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="input-block mb-3 form-focus">
                    <input type="text" class="form-control floating" name="size" placeholder="Size">
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="input-block mb-3 form-focus">
                    <input type="text" class="form-control floating" name="location" placeholder="Location">
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="input-block mb-3 form-focus">
                    <input type="text" class="form-control floating" name="budget" placeholder="Budget">
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <button class="btn btn-success w-100">Search</button>
            </div>
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
                        <th>Property Id</th>
                        <th>Property Name</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Report</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                    <tr>
                        <td><a href="{{  route('admin.propertyreport.show',['propertyreport'=>$property->id])  }}">{{ $loop->iteration }}</td>
                        <td><a href="{{  route('admin.propertyreport.show',['propertyreport'=>$property->id])  }}"> {{$property->property_id}}</td>
                        <td><a href="{{  route('admin.propertyreport.show',['propertyreport'=>$property->id])  }}"> {{$property->name}} </td>
                        <td><a href="{{  route('admin.propertyreport.show',['propertyreport'=>$property->id])  }}"> {{$property->type}} </td>
                        <td><a href="{{  route('admin.propertyreport.show',['propertyreport'=>$property->id])  }}">{{$property->location}} </td>
                        <td><a href="{{  route('admin.propertyreport.show',['propertyreport'=>$property->id])  }}">{{$property->status}}</td>
                        <td>
                            <a class="btn btn-info mx-2" href="{{  route('admin.propertyreport.show',['propertyreport'=>$property->id])  }}">View Report</a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection