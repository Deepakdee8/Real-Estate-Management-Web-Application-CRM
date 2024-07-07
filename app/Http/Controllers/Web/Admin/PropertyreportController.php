<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyPhoto;

class PropertyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $properties = Property::all();

        if ($request->property_type) {
            $properties = Property::where('type', 'LIKE', '%' . $request->property_type . '%')->get();
        }
        if ($request->size) {
            $properties = Property::where('size', 'LIKE', '%' . $request->size . '%')->get();
        }
        if ($request->location) {
            $properties = Property::where('location', 'LIKE', '%' . $request->location . '%')->get();
        }
        if ($request->budget) {
            $properties = Property::where('budget', 'LIKE', '%' . $request->budget . '%')->get();
        }

        return view('admin.report.property.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            return redirect(url('/property'));
        } else {
            return view('admin.report.property.show', [
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
