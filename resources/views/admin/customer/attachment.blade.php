@extends('layouts.admin')

@section('content')


<div class="container">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Attachments</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route ('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Attachments</li>

                </ul>

            </div>
            <div class="col-auto float-end ms-auto">
                <a href=" {{ route ('admin.customer.index')}} " class="btn add-btn">
                    List customers
                </a>
            </div>
        </div>
    </div>

</div>


<div class="row">

    <!-- Add Attachments -->

    <div class="col-md-6">


        <div class="card">
            <div class="card-header">
                <h4>Add Attachment</h4>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="card-body">
            <form action="{{route('customer.attachment.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="customer_id" value="{{ $customerId }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-block mb-3">
                            <label class="col-form-label">File Name </label>
                            <input class="form-control mb-3" type="text" name="name" placeholder="Enter file name">
                            <input class="form-control" type="file" name="attachment">
                            @error('attachment') <span class="text-danger style-none">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn-success ">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Show Photos -->

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Customer Attachments</h4>
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
                                <th class="text-nowrap">File Name</th>
                                <th class="text-nowrap">Attachments</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attachments as $attachment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="text-nowrap">
                                    {{$attachment->name}}
                                </td>
                                <td>
                                    <a class="btn btn-info m-2" href="{{asset('/storage/attachments').'/'.$attachment->attachment}}" target="_blank">View </a>
                                </td>
                                <td>
                                    <form action=" {{route('customer.attachment.delete', ['attachment' => $attachment->id])}} " method="POST">
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