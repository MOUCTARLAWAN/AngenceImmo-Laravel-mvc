<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Option;

use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index',[
            'properties' => Property::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        // $property->fill([
        //   'surface' => 40,
        //   'rooms' => 3,
        //   'bedrooms' => 1,
        //   'floor' => 0,
        //   'city' => 'Douala',
        //   'postal_code' => 3355,
        //   'sold' => false
        // ]);

        return view('admin.properties.form',[
            'property' =>new Property(),
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Property::create($request->validated());
        $request->validate([
            'title' =>'required',
            'description' =>'required',
            'price' => 'required',
            'surface' => 'required',
            'rooms' => 'required',
            'bedrooms' => 'required',
            'floor' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'sold' => 'required',
            'options' => ['array', 'exists:options,id','required']
        ]);
        $property = new Property();
        $property->title = $request-> title;
        $property->description = $request-> description;
        $property->surface = $request-> surface;
        $property->price = $request-> price;
        $property->rooms = $request->rooms;
        $property->bedrooms = $request->bedrooms;
        $property->floor = $request->floor;
        $property->city = $request->city;
        $property->address = $request->address;
        $property->postal_code = $request->postal_code;
        $property->sold = $request->sold;
        $property->options()->sync($request);
        $property->save();

       return to_route('admin.property.index')->with('success', 'Le bien a bien ete cree');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $property =  Property::find($property->id);
        return view('admin.properties.form',[
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'title' =>'required',
            'description' =>'required',
            'price' => 'required',
            'surface' => 'required',
            'rooms' => 'required',
            'bedrooms' => 'required',
            'floor' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'sold' => 'required',
            'options' => ['array', 'exists:options,id','required']
        ]);

        $property =  Property::find($request->id);
        $property->title = $request-> title;
        $property->description = $request-> description;
        $property->surface = $request-> surface;
        $property->price = $request-> price;
        $property->rooms = $request->rooms;
        $property->bedrooms = $request->bedrooms;
        $property->floor = $request->floor;
        $property->city = $request->city;
        $property->address = $request->city;
        $property->postal_code = $request->postal_code;
        $property->sold = $request->sold;
        $property->options = $request->options;


        $property->update();
       return to_route('admin.property.index')->with('success', 'Le bien a bien ete modifie');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return to_route('admin.property.index')->with('success', 'Le bien a bien ete supprime');
    }
}