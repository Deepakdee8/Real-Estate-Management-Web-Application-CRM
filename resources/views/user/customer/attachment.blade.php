@extends('layouts.app')

@section('content')


<div class="container">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Attachments</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route ('user.customer.index')}}">Executive Dashboard</a></li>
                    <li class="breadcrumb-item active">Attachments</li>

                </ul>

            </div>
            <div class="col-auto float-end ms-auto">
                <a href=" {{ route ('user.customer.index')}} " class="btn add-btn">
                    List customers
                </a>
            </div>
        </div>
    </div>

</div>


<div class="row d-flex justify-content-center">

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