@extends('layouts.admin')

@section('content')


<div class="container">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Create Property</h3>
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
                    <form action="{{ route('admin.property.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Id</label>
                                    <input class="form-control" type="text" name="property_id" value="{{ old('property_id') }}" placeholder="Enter Property ID">
                                    @error('property_id') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter Project Name" value="{{ old('name') }}">

                                    @error('name') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Size</label>
                                    <input class="form-control" type="text" name="size" value="{{ old('size') }}" placeholder="Enter Property Size">

                                    @error('size') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Facing</label>
                                    <input class="form-control" type="text" name="facing" value="{{ old('facing') }}" placeholder="Facing">

                                    @error('facing') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Property Type</label>
                                    <select class="form-control" name="type">

                                        <option value="">Select Property Type</option>

                                        <option value="ResidentialSite"> Residential site </option>
                                        <option value=" IndividualHouse"> Individual house </option>
                                        <option value="Villa">Villa</option>
                                        <option value="Apartment"> Apartment</option>
                                        <option value="Commercialproperty"> Commercial property </option>
                                        <option value="Agriculturelands"> Agriculture lands </option>
                                        <option value="Industriallands"> Industrial lands </option>
                                        <option value="others"> Others </option>

                                    </select>
                                    @error('assignee') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Description</label>
                                    <input class="form-control" type="text" name="description" value="{{ old('description') }}" placeholder="Enter Description">
                                    @error('description') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Budget</label>
                                    <input class="form-control" type="text" name="budget" value="{{ old('budget') }}" placeholder="Enter Budget">
                                    @error('budget') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Location</label>
                                    <input class="form-control" type="text" name="location" value="{{ old('location') }}" placeholder="Enter Location">
                                    @error('location') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option value="Ongoing" @if(old('status')=='Ongoing' ) selected @endif>Ongoing</option>
                                        <option value="Completed" @if(old('status')=='Completed' ) selected @endif>Completed</option>
                                        <option value="Postponed" @if(old('status')=='Postponed' ) selected @endif>Postponed</option>
                                        <option value="Pending" @if(old('status')=='Pending' ) selected @endif>Pending</option>
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

                            <div class="submit-section ">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection