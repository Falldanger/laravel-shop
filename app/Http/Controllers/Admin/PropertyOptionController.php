<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Property $property
     * @return Response
     */
    public function index(Property $property)
    {
        $propertyOptions= PropertyOption::paginate(10);
        return view('auth.property_options.index',compact('property','propertyOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Property $property
     * @return Response
     */
    public function create(Property $property)
    {
        return view('auth.property_options.form',compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Property $property
     * @return void
     */
    public function store(Request $request,Property $property)
    {
        $params = $request->all();
        $params['property_id']=$request->property->id;
        PropertyOption::create($params);

        return redirect()->route('property-options.index',$property);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return Response
     */
    public function show(PropertyOption $propertyOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return Response
     */
    public function edit(PropertyOption $propertyOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return Response
     */
    public function update(Request $request, PropertyOption $propertyOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return Response
     */
    public function destroy(PropertyOption $propertyOption)
    {
        //
    }
}
