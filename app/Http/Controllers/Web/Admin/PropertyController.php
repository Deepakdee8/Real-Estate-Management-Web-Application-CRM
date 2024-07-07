<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Customer;
use App\Models\PropertyPhoto;
use Auth;
use App\Helpers\Whatsapp;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Property::all();

        if ($request->searchTerm) {
            $properties = Property::where('name', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('property_id', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('type', 'LIKE', '%' . $request->searchTerm . '%')
                ->orWhere('status', 'LIKE', '%' . $request->searchTerm . '%')
                ->get();
        }
        return view('admin.property.index', [
            'properties' => $properties,

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'property_id' => 'required|unique:properties,property_id',
            'name' => 'required',
            'size' => 'required',
            'facing' => 'required',
            'type' => 'required',
            'description' => 'sometimes',
            'budget' => 'required',
            'photos' => 'sometimes',
            'location' => 'required',
            'status' => 'required',
        ]);

        $attachmentFullURL = "";
        if ($attachment = $request->file('photos')) {
            $attachmentOriginalName = $attachment->getClientOriginalName();
            $extension = pathinfo($attachmentOriginalName, PATHINFO_EXTENSION);
            $newattachmentName = rand() . '-' . $attachmentOriginalName;
            $attachmentFullURL = 'attachment-' . $newattachmentName;
            $attachment->storeAs('attachments/', $attachmentFullURL, ['disk' => 'public_uploads']);
        }

        Property::create([
            'property_id' => $request->property_id,
            'name' => $request->name,
            'size' => $request->size,
            'facing' => $request->facing,
            'type' => $request->type,
            'description' => $request->description ?? 'Not entered any description',
            'budget' =>  $request->budget,
            'photos' => $attachmentFullURL,
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('status', 'Property Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);

        $photos = PropertyPhoto::where('property_id', $id)->get();

        if (is_null($property)) {
            return redirect(url('/admin/property'));
        } else {
            return view('admin.property.show', [
                'property' => $property,
                'photos' => $photos,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);

        if (is_null($property)) {
            return redirect(url('/admin/property'));
        } else {
            return view('admin.property.edit', [
                'property' => $property,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'property_id' => 'required',
            'name' => 'required',
            'size' => 'required',
            'facing' => 'required',
            'type' => 'required',
            'description' => 'sometimes',
            'budget' => 'required',
            'photos' => 'sometimes',
            'location' => 'required',
            'status' => 'required',
        ]);

        $property = Property::find($id);
        $property->update([
            'name' => $request->name,
            'size' => $request->size,
            'facing' => $request->facing,
            'type' => $request->type,
            'description' => $request->description ?? 'Not entered any description',
            'budget' =>  $request->budget,
            'location' => $request->location,
            'status' => $request->status,
        ]);

        $attachmentFullURL = "";
        if ($attachment = $request->file('photos')) {
            $attachmentOriginalName = $attachment->getClientOriginalName();
            $extension = pathinfo($attachmentOriginalName, PATHINFO_EXTENSION);
            $newattachmentName = rand() . '-' . $attachmentOriginalName;
            $attachmentFullURL = 'attachment-' . $newattachmentName;
            $attachment->storeAs('attachments/', $attachmentFullURL, ['disk' => 'public_uploads']);
        }

        $property->update([
            'photos' =>  $attachmentFullURL,
        ]);


        return redirect()->back()->with('status', 'Property Edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Property Removed');
    }

    public function photosIndex(Request $request, $id)
    {
        $photos = PropertyPhoto::where('property_id', $id)->get();

        return view('admin.property.photos', [
            'photos' => $photos,
            'propertyId' => $id,
        ]);
    }
    public function photosStore(Request $request)
    {
        $this->validate($request, [
            'property_id' => 'required',
            'photos' => 'required',
        ]);

        // $propertyname= Property::select('name')->where('id', $request->property_id)->get();

        $attachmentFullURL = "";
        if ($attachment = $request->file('photos')) {
            $attachmentOriginalName = $attachment->getClientOriginalName();
            $extension = pathinfo($attachmentOriginalName, PATHINFO_EXTENSION);
            $newattachmentName = rand() . '-' . $attachmentOriginalName;
            $attachmentFullURL = 'attachment-' . $newattachmentName;
            $attachment->storeAs('attachments/', $attachmentFullURL, ['disk' => 'public_uploads']);
        }

        PropertyPhoto::create([
            'property_id' => $request->property_id,
            'photos' => $attachmentFullURL,
        ]);

        return redirect()->back()->with('status', 'Photo Added');
    }
    public function photosDelete($id)
    {
        PropertyPhoto::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Photo Deleted');
    }
    public function share($id)
    {
        $property = Property::find($id);

        $photos = PropertyPhoto::where('property_id', $id)->get();

        if (is_null($property)) {
            return redirect(url('/property'));
        } else {
            return view('admin.property.share', [
                'property' => $property,
                'photos' => $photos,
            ]);
        }
    }

    public function select($id)
    {
        $customers = Customer::all();
        return view('admin.property.select', [
            'customers' => $customers,
            'propertyID' => $id,
        ]);
    }
    public function whatsappsend(Request $request)
    {
        if ($request->recipientOption == 'all') {
            $phone = Customer::all()->pluck('phone')->toArray();
            $phone = implode(",", $phone);
        } else if ($request->recipientOption == 'individual') {
            $recepientsArray = json_decode($request->receipents);
            $phone = implode(",", $recepientsArray);
        }
        $link = "localhost/samatha-group-estate-and-projects/public/property/" . $request->property_id . "/share";

        $content = 'Dear Customer \n\n 
        Thank you for reaching out to us regarding the property details.\n\n We are pleased to provide you with the comprehensive information about the property. Click on the following link to find the detailed specifications, photographs related to the property you inquired about: \n\n' . $link . '\n\n
        Should you require any further clarification or wish to schedule a viewing, please do not hesitate to contact us.\n\n
        Warm regards,\n\n
        Samatha Group Estates and Projects.';

        // set the authKey in Whatsapp helper function, then uncomment the below line to send mgs through WA.
        // Whatsapp::sendMessage($phone, $content);
        return redirect()->back()->with('status', 'Message sent sucessfuly');
    }
    public function fetchNames(Request $request)
    {
        $type = $request->input('type');

        if ($type === 'customer') {
            $names = Customer::where('name', 'like', '%' . $request->search . '%')->orderBy('name', 'ASC')->get();
        }
        // } else {
        //     $names = Visitor::where('name', 'like', '%'.$request->search.'%')->orderBy('name', 'ASC')->get();
        // }

        return response()->json($names);
    }
    public function print(Request $request)
    {
        return view('admin.property.print', [
            'id' => $request->id
        ]);
    }


    public function pdf($id)
    {
        $property = Property::find($id);

        $photos = PropertyPhoto::where('property_id', $id)->get();


        PDF::loadView('admin.property.pdf1', [
            'property' => $property,
            'photos' => $photos,
        ])->stream('nfc-invoice-' . $property->id . '.pdf');
    }
}
