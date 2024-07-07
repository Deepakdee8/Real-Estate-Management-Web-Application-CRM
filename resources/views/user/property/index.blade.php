@extends('layouts.app')

@section('content')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Properties</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Properties</li>
            </ul>
        </div>

    </div>
</div>


<form action="{{route('user.property.index')}}" method="GET">
    @csrf
    <div class="row filter-row">
        <div class="col-sm-9 col-md-9">
            <div class="input-block mb-3 form-focus">
                <input type="text" class="form-control floating" name="searchTerm" placeholder="Search by Property Name or Property ID or type or Status">
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
                        <td><a href="{{  route('user.property.show',['property'=>$property->id]) }}">{{ $loop->iteration }}</td>
                        <td> <a href="{{  route('user.property.show',['property'=>$property->id]) }}">{{$property->property_id}}</td>
                        <td><a href="{{  route('user.property.show',['property'=>$property->id]) }}"> {{$property->name}} </td>
                        <td> <a href="{{  route('user.property.show',['property'=>$property->id]) }}">{{$property->type}} </td>
                        <td><a href="{{  route('user.property.show',['property'=>$property->id]) }}">{{$property->location}} </td>
                        <td><a href="{{  route('user.property.show',['property'=>$property->id]) }}">{{$property->status}}</td>

                        <td>
                            <a class="btn btn-info mx-2" href="{{  route('user.property.show',['property'=>$property->id])  }}">Preview</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection