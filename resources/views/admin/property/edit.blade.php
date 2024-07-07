@extends('layouts.admin')

@section('content')


<div class="container">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Edit Property</h3>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href=" {{ route ('admin.property.index')}} " class="btn add-btn">
                    List Property
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                    @endif
                    <form action="{{route('admin.property.update',['property'=> $property->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Id</label>
                                    <input class="form-control" type="text" name="property_id" value="{{$property->property_id}}" placeholder="Enter Property ID">
                                    @error('property_id') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Project Name" value="{{ $property->name}}">

                                    @error('name') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Size</label>
                                    <input class="form-control" type="text" name="size" value="{{$property->size}}" placeholder="Enter Property Size">

                                    @error('size') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Facing</label>
                                    <input class="form-control" type="text" name="facing" value="{{ $property->facing }}" placeholder="Facing">

                                    @error('facing') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Type</label>
                                    <select class="form-control" name="type">

                                        <option value="">Select Property Type</option>

                                        <option value="ResidentialSite" @if($property->type =='ResidentialSite' ) selected @endif> Residential site </option>
                                        <option value=" IndividualHouse" @if($property->type =='IndividualHouse' ) selected @endif> Individual house </option>
                                        <option value="Villa" @if($property->type =='Villa' ) selected @endif>Villa</option>
                                        <option value="Apartment" @if($property->type =='Apartment' ) selected @endif> Apartment</option>
                                        <option value="Commercialproperty" @if($property->type =='Commercialproperty' ) selected @endif> Commercial property </option>
                                        <option value="Agriculturelands" @if($property->type =='Agriculturelands' ) selected @endif> Agriculture lands </option>
                                        <option value="Industriallands" @if($property->type =='Industriallands' ) selected @endif> Industrial lands </option>
                                        <option value="others" @if($property->type =='others' ) selected @endif> Others </option>

                                    </select>
                                    @error('assignee') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Description</label>
                                    <input class="form-control" type="text" name="description" value="{{ $property->description }}" placeholder="Enter Description">
                                    @error('description') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Budget</label>
                                    <input class="form-control" type="text" name="budget" value="{{ $property->budget}}" placeholder="Enter Budget">
                                    @error('budget') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Location</label>
                                    <input class="form-control" type="text" name="location" value="{{ $property->location }}" placeholder="Enter Location">
                                    @error('location') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option value="Ongoing" @if($property->status =='Ongoing' ) selected @endif>Ongoing</option>
                                        <option value="Completed" @if($property->status =='Completed' ) selected @endif>Completed</option>
                                        <option value="Postponed" @if($property->status =='Postponed' ) selected @endif>Postponed</option>
                                        <option value="Pending" @if($property->status =='Pending' ) selected @endif>Pending</option>
                                    </select>
                                    @error('status') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="col-sm-6">
                <div class="input-block mb-3">
                    <label class="col-form-label">Upload Photo</label>
                    <input class="form-control" type="file" name="photos">
                    @error('photos') <span class="text-danger style-none">{{ $message }}</span>
                    @enderror
                </div>
            </div> -->

                            <div class="submit-section mb-5">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection