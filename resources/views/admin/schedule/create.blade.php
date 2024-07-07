@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Create Schedule</h3>
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="{{ route('admin.schedule.index')}}" class="btn add-btn">
                    List Schedule
                </a>
            </div>
        </div>
    </div>

    @if (session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
    @endif

    <form action="{{ route('admin.schedule.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="input-block mb-3">
                    <label class="col-form-label">Select Customer</label>
                    <select class="form-control" name="customer_id" required>
                        <option value="">Select Customer </option>
                        @foreach ($customers as $customer)
                        <option value="{{$customer->id}}" @if( old('customer_id')==$customer->id) selected @endif>{{$customer->name}} </option>
                        @endforeach
                    </select>
                    @error('customer_id') <span class="text-danger style-none">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-block mb-3">
                    <label class="col-form-label">Select Assignee</label>
                    <select class="form-control" name="assignee_id" required>
                        <option value="">Select Assignee </option>
                        @foreach ($users as $user)
                        <option value="{{$user->id}}" @if( old('assignee_id')==$user->id) selected @endif>{{$user->name}} </option>
                        @endforeach
                    </select>
                    @error('customer_id') <span class="text-danger style-none">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-block mb-3">
                    <label class="col-form-label">Description</label>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}" placeholder="Enter Description">
                    @error('description') <span class="text-danger style-none">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-block mb-3">
                    <label class="col-form-label">Scheduled Date & Time</label>
                    <input class="form-control" type="datetime-local" name="date_time" value="{{ old('date_time') }}" required>
                    @error('date_time') <span class="text-danger style-none">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="input-block mb-3">
                    <label class="col-form-label">Set Reminder</label>
                    <input class="form-control" type="datetime-local" name="reminder" value="{{ old('reminder') }}" required>
                    @error('reminder') <span class="text-danger style-none">{{ $message }}</span> @enderror
                </div>
            </div>

            <div id="prop" class="col-sm-6">
                <div class="input-block mb-3">
                    <label class="col-form-label">Select Property</label>
                    <select id="proid" class="form-control mb-3" name="property_id[]" required>
                        <option value="">Select Property </option>
                        @foreach ($properties as $property)
                        <option value="{{$property->id}}" @if( old ('property_id')==$property->id) selected @endif>{{$property->name}} </option>
                        @endforeach
                        @error('property_id[]') <span class="text-danger style-none">{{ $message }}</span> @enderror
                    </select>
                    <a id="newprop" class="newprop" href="#" onclick="addNewPropertyField(event)"><i class="fa-solid fa-plus"></i></a>
                    <a id="delprop" class="delprop" href="#" onclick="removeLastPropertyField(event)"><i class="fa-solid fa-minus"></i></a>
                </div>
            </div>

            <div class="submit-section mb-5">
                <button class="btn btn-primary submit-btn">Submit</button>
            </div>
        </div>
    </form>

</div>

<script>
    function addNewPropertyField(event) {
        event.preventDefault();
        const originalSelect = document.getElementById('proid');
        const newSelect = originalSelect.cloneNode(true);
        originalSelect.parentNode.appendChild(newSelect);
    }

    function removeLastPropertyField(event) {
        event.preventDefault();
        const selectFields = document.getElementsByName('property_id[]');
        if (selectFields.length > 1) {
            const lastSelectField = selectFields[selectFields.length - 1];
            lastSelectField.parentNode.removeChild(lastSelectField);
        }
    }
</script>
@endsection