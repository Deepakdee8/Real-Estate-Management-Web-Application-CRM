@extends('layouts.app')

@section('content')



<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Show Property </h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item "> <a href="{{ route ('user.property.index')}}">Show Property</a> </li>
                <li class="breadcrumb-item active">{{$property->name}}</li>
            </ul>
        </div>
        <div class="col-auto float-end ms-auto">
            <a href=" {{ route ('user.property.index')}} " class="btn add-btn">
                List Property
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-5 p-3">
            <div class="card-body card-buttons">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">

                        <tbody>

                            <tr>
                                <th class="text-nowrap" scope="row">Property ID</th>
                                <td colspan="6">{{$property->property_id}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Property Name</th>
                                <td colspan="6">{{$property->name}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Property Size</th>
                                <td colspan="6">{{$property->size}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Facing</th>
                                <td colspan="6">{{$property->facing}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Property Type</th>
                                <td colspan="6">{{$property->type}}</td>
                            </tr>

                            <tr>
                                <th class="text-nowrap" scope="row">Description</th>
                                <td colspan="6">{{$property->description}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Budget</th>
                                <td colspan="6">{{$property->budget}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Photos</th>
                                <td colspan="6" class="table-responsive">

                                    @foreach($photos as $photo)
                                    <img src="{{ asset('storage/attachments/'.$photo->photos) }}" style="width: 70px; height:70px;" alt="Img" />
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Location</th>
                                <td colspan="6">{{$property->location}}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Status</th>
                                <td colspan="6">{{$property->status}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection