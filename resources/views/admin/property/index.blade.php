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
        <div class="col-auto float-end ms-auto">
            <a href="{{ route('admin.property.create')}}" class="btn add-btn" data-bs-target="#create_project"><i class="fa-solid fa-plus"></i> Create Property</a>

        </div>
    </div>
</div>


<form action="{{route('admin.property.index')}}" method="GET">
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
                        <th class="text-center">Photos</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                    <tr>

                        <td><a href="{{  route('admin.property.show',['property'=>$property->id])  }}">{{ $loop->iteration }}</td>
                        <td> <a href="{{  route('admin.property.show',['property'=>$property->id])  }}">{{$property->property_id}}</td>
                        <td><a href="{{  route('admin.property.show',['property'=>$property->id])  }}"> {{$property->name}} </td>
                        <td><a href="{{  route('admin.property.show',['property'=>$property->id])  }}"> {{$property->type}} </td>
                        <td><a href="{{  route('admin.property.show',['property'=>$property->id])  }}">{{$property->location}} </td>
                        <td><a href="{{  route('admin.property.show',['property'=>$property->id])  }}">{{$property->status}}</td>
                        <td>
                            <a class="btn btn-info mx-2" href="{{ route('property.photos.index', ['photos' => $property->id]) }}">Add Photos</a>
                        </td>
                        <td class="text-center">
                            <div class="d-flex flex-row ">


                                <a href="{{  route('admin.property.edit',['property'=>$property->id])  }}"><button title="Edit" class=" mx-1  btn btn-outline-dark btn-sm d-inline"><i class=" fa-solid fa-pencil  m-r-5"></i> </button></a>


                                <a href="{{  route('admin.property.show',['property'=>$property->id])  }}"><button title="Preview" class=" mx-1  btn btn-outline-dark btn-sm d-inline"><i class="fa-regular fa-eye  m-r-5"></i></button> </a>

                                <a href="{{ route('admin.property.customer.select',['property'=>$property->id]) }}"><button title="Share" class=" mx-1  btn btn-outline-dark btn-sm d-inline"><i class="fa fa-external-link-square m-r-5"></i></button> </a>

                                <a href="{{ route('admin.property.print',['id'=>$property->id]) }}"><button title="Print" class=" mx-1  btn btn-outline-dark btn-sm d-inline"><i class="fa fa-file m-r-5"></i></button> </a>

                                <form action="{{ route('admin.property.destroy',['property'=>$property->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Delete" class=" mx-1 btn btn-outline-dark btn-sm d-inline" onclick="return confirm('Are you sure ? Do you want to delete the project')" href=""><i class="fa-regular fa-trash-can   m-r-5"></i> </button>
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