@extends('layouts.admin')

@section('content')


<div class="container">



    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Add Visits</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route ('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{ route ('admin.visitor.index')}}">Customer Visits</a></li>
                    <li class="breadcrumb-item active">Add Visits</li>
                </ul>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="{{ route('admin.visitor.index')}}" class="btn add-btn"> List Visits</a>

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
                    <form action="{{ route('admin.visitor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row-col-12">

                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label"></label>
                                    <select class="form-control" name="customer_id">
                                        <option value="">Select Customer </option>
                                        @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}" @if( old('customer_id')==$customer->id) selected @endif>{{$customer->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('customer_id') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label"></label>
                                    <select class="form-control" name="assignee_id">
                                        <option value="">Select Executive </option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}" @if( old('assignee_id')==$user->id) selected @endif>{{$user->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('assignee_id') <span class="text-danger style-none">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label"></label>
                                    <select class="form-control" name="property_id" onchange="loadPropertyType(this.value)">
                                        <option value="">Select Property </option>
                                        @foreach ($properties as $property)
                                        <option value="{{$property->id}}" @if( old('property_id')==$property->id) selected @endif>{{$property->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('property_id') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label"></label>
                                    <select class="form-control" id="property_type" name="property_type">
                                        <option value="">Select Property type </option>

                                    </select>
                                    @error('property_type') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>

@endsection



@push('script')
<script>
    function loadPropertyType(propertyId) {
        // XHR call or ajax call
        $.ajax({
            type: "POST",
            url: "{{ route('admin.visitor.propertytypeSearch') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "property_id": propertyId,
            },
            success: function(response) {
                $('#property_type').empty();


                // Append new options based on the response
                $.each(response, function(index, member) {
                    $('#property_type').append($('<option>', {
                        value: member.type,
                        text: member.type
                    }));
                });
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error('Error:', errorThrown);
            },
        });
    }
</script>
@endpush