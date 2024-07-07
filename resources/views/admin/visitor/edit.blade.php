@extends('layouts.admin')

@section('content')


<div class="container">



    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Edit Visits</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route ('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{ route ('admin.visitor.index')}}">Customer Visits</a></li>
                    <li class="breadcrumb-item active">Edit Visits</li>
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
                    <form action="{{route('admin.visitor.update',['visitor'=> $visitor->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row-col-12">

                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label"></label>
                                    <select class="form-control" name="customer_id">
                                        <option value="">Select Customer </option>
                                        @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}" @if( $customer->id==$visitor->customer_id) selected @endif>{{$customer->name}} </option>
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
                                        <option value="{{$user->id}}" @if( $user->id==$visitor->assignee_id) selected @endif>{{$user->name}} </option>
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
                                        <option value="{{$property->id}}" @if( $property->id==$visitor->property_id) selected @endif>{{$property->name}} </option>
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
                                        <option value="{{$visitor->property_type}}">{{$visitor->property_type}} </option>

                                    </select>
                                    @error('property_type') <span class="text-danger style-none">{{ $message }}</span>
                                    @enderror
                                </div>
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