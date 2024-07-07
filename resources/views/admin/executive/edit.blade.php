@extends('layouts.admin')

@section('content')

<div id="add_employee" class="container">
    <div class="modal-content">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Executive</h3>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="{{ route ('admin.executive.index') }}" class="btn add-btn">
                        List Executives
                    </a>
                </div>
            </div>
        </div>

        <div class="modal-body">
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    <span class="text-danger style-none">{{ $error }}</span>
                </li>
                @endforeach
            </ul>
            @endif

            <form action="{{ route('admin.executive.update', ['executive' => $user->id ?? $admin->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Executive ID <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="customer_id" value="{{ $user->customer_id ?? $admin->customer_id }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Executive Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{ $user->name ?? $admin->name }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Address <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="address" value="{{ $user->address ?? $admin->address }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">E-Mail Address <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{ $user->email ?? $admin->email }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Phone No. <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="phone" value="{{ $user->phone ?? $admin->phone }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Role <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="role" value="{{ $user->role ?? $admin->role }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-block mb-3">
                            <label class="col-form-label">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection