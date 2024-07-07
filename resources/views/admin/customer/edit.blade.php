@extends('layouts.admin')

@section('content')


<div id="add_employee" class="container">

    <div class="modal-content">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Customer</h3>

                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ route ('admin.customer.index')}} " class="btn add-btn">
                        List Customer
                    </a>
                </div>
            </div>
        </div>

        <div class="modal-body">
            @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif

            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    <span class="text-danger style-none"> {{$error}} </span>
                </li>
                @endforeach
            </ul>
            @endif

            <form action="{{route('admin.customer.update',['customer'=> $user->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Customer ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="customer_id" value="{{$user->customer_id}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Customer Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Address <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="address" value="{{$user->address}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label"> E-Mail Address <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Phone No. <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}">
                        </div>
                    </div>
                   



                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>


@endsection