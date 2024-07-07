@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title"> Property Print</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.property.index')}}">Property</a></li>
                <li class="breadcrumb-item active">Property Print</li>
            </ul>
        </div>
        <div class="col-auto float-end ms-auto">
            <a href="{{ route('admin.property.index')}}" class="btn add-btn" data-bs-target="#create_project"><i class="fa-solid "></i> list Property</a>

        </div>

        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <iframe src="{{ route('admin.property.pdf', ['id' => $id]) }}" title="description" width="100%" height="500" frameborder="0"></iframe>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection