@extends('layouts.admin')

@section('content')


<div class="container">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Photos</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item ">Photos</li>
                    <li class="breadcrumb-item active">Add Photos</li>
                </ul>

            </div>
            <div class="col-auto float-end ms-auto">
                <a href=" {{ route ('admin.property.index')}} " class="btn add-btn">
                    List properties
                </a>
            </div>
        </div>
    </div>

</div>


<div class="row">

    <!-- Add Photos -->

    <div class="col-md-6">


        <div class="card">
            <div class="card-header">
                <h4>Add Photos</h4>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="card-body">
            <form action="{{route('property.photos.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="property_id" value="{{ $propertyId }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-block mb-3">

                            <input class="form-control" type="file" name="photos">
                            @error('photos') <span class="text-danger style-none">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn-success ">Add</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Show Photos -->

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Property Photos</h4>
            </div>
            @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photos</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($photos as $photo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/attachments/'.$photo->photos) }}" style="width: 70px; height:70px;" alt="Img" />
                                </td>
                                <td>
                                    <form action=" {{route('property.photos.delete', ['photos' => $photo->id])}} " method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">REMOVE</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection