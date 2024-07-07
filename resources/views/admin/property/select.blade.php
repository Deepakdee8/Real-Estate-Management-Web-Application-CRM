@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Share To Customers</h3>
        </div>
        <div class="col-auto float-end ms-auto">
            <a href=" {{ route ('admin.property.index')}} " class="btn add-btn">
                List Property
            </a>
        </div>
    </div>
</div>
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('admin.property.customer.send') }}" method="POST">
        @csrf
        <div class="card">

            <div class="card-body">
                <label for="recipientType">Customer Name:</label>
                <select id="recipientType" name="recipientType" class="form-control">
                    <!-- <option value="">Select Customer Names</option> -->
                    <option value="customer">Customer</option>
                </select>

                <div id="recipientOptions" class="mt-3">
                    <div class="form-check">
                        <input type="radio" id="selectAll" name="recipientOption" value="all" class="form-check-input" checked>
                        <label for="selectAll" class="form-check-label">Select All</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" id="selectIndividual" name="recipientOption" value="individual" class="form-check-input" onchange="toggleManualRecipient()">
                        <label for="selectIndividual" class="form-check-label">Select Individual</label>
                    </div>

                    <input type="text" id="manualRecipient" name="manualRecipient[]" placeholder="Enter Customer Name" class="form-control mt-3" style="display: none;">
                    <div id="selectedRecipients" class="mt-3"></div>
                </div>
            </div>
        </div>
        <input type="hidden" name="receipents" id="receipents">
        <input type="hidden" name="property_id" id="receipents" value="{{$propertyID}}">
        <button type="submit" id="sendButton" class="btn btn-primary mt-3" onclick="return confirm('Are you sure ? Do you want to send the whatsapp message')">Send</button>
    </form>
</div>
@endsection

@push('script')
<script>
    var recipients = [];

    $("#manualRecipient").autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST",
                url: "{{ route('fetch.names') }}",
                data: {
                    search: request.term,
                    type: $('#recipientType').val(),
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 1,
        select: function(event, ui) {
            event.preventDefault();
            recipients.push(ui.item.phone);
            setReceipents();
            $("#manualRecipient").val("");
        }
    }).focus(function() {
        $(this).autocomplete("search");
    }).autocomplete("instance")._renderItem = function(ul, item) {
        console.log(item);
        return $("<li>")
            .append("<div><b>" + item.name + "</b></div>")
            .appendTo(ul);
    };

    function removeRecipient(index) {
        console.log(index);
        recipients.splice(index, 1);
        setReceipents();
    }

    function setReceipents() {
        $('#selectedRecipients').html("");
        recipients.forEach(function(recipient, index) {
            $('#selectedRecipients').append('<div>' + recipient + ' <button type="button" class="btn btn-danger" onclick="removeRecipient(' + index + ')">X</button></div>');
        });
        document.getElementById("receipents").value = JSON.stringify(recipients);
    }

    // Function to toggle manual recipient input field based on selection
    function toggleManualRecipient() {
        if ($('#selectIndividual').is(':checked')) {
            $('#manualRecipient').show().prop('disabled', false); // Show and enable the input field
        } else {
            $('#manualRecipient').val('').hide().prop('disabled', true); // Clear value, hide, and disable the input field
        }
    }
</script>
@endpush