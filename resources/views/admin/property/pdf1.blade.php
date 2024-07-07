<!-- Fabric 5% -->

<!DOCTYPE html>
<html>

<head>
    <title>{{ $property->id }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pdf1.css') }}">
</head>

<body>
    <table class="table-100 ">
        <tr>
            <td align="center">
                <img src="{{ asset('assets/theme/images/Samatha-Group-logo.png') }}" alt="" width="200px">
            </td>
        </tr>
    </table>
    <table class="table-border table-100 th-font" border="1" >

        <tbody>

            <tr>
                <th class="text-nowrap" scope="row">Property ID</th>
                <td colspan="6">{{$property->property_id}}</td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Property Name</th>
                <td colspan="6">{{$property->name}}</td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Property Size</th>
                <td colspan="6">{{$property->size}}</td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Facing</th>
                <td colspan="6">{{$property->facing}}</td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Property Type</th>
                <td colspan="6">{{$property->type}}</td>
            </tr>

            <tr>
                <th class="text-nowrap" scope="row">Description</th>
                <td colspan="6">{{$property->description}}</td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Budget</th>
                <td colspan="6">{{$property->budget}}</td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Photos</th>
                <td colspan="6" class="table-responsive">

                    @foreach($photos as $photo)
                    <img src="{{ asset('storage/attachments/'.$photo->photos) }}" style="width: 70px; height:70px;" alt="Img" />
                    @endforeach
                </td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Location</th>
                <td colspan="6">{{$property->location}}</td>
            </tr>
            <tr>
                <th class="text-nowrap" scope="row">Status</th>
                <td colspan="6">{{$property->status}}</td>
            </tr>

        </tbody>
    </table>
    <htmlpagefooter name="page-footer">
        <table class="table-100">
            <tr>
                <td align="center">
                    <h3>*** THANK YOU, VISIT AGAIN ***</h3>
                </td>
            </tr>
        </table>
    </htmlpagefooter>
</body>

</html>
