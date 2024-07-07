@extends('layouts.admin')

@section('content')


<div id="add_employee" class="container">

    <div class="modal-content">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Customer</h3>

                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ route ('admin.customer.index')}} " class="btn add-btn">
                        List customer
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

                        <form action="{{ route('admin.customer.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Customer ID <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="customer_id">


                                        @error('user_id') <span class="text-danger style-none">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Customer Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name">


                                        @error('name') <span class="text-danger style-none">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="address">


                                        @error('role') <span class="text-danger style-none">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">E-mail Address <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="email">


                                        @error('email') <span class="text-danger style-none">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Phone No. <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone">


                                        @error('phone') <span class="text-danger style-none">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                               


                                <div class="submit-section ">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection