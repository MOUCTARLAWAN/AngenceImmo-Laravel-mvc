<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.option.index',[
            'options' => Option::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();
        return view('admin.option.form',[
            'option' =>new Option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Property::create($request->validated());
        $request->validate([
            'name' =>'required',
        ]);
        $option = new Option();
        $option->name = $request-> name;

        $option->save();
       return to_route('admin.option.index')->with('success', 'option a bien ete cree');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        $option =  Option::find($option->id);
        return view('admin.option.form',[
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'name' =>'required',

        ]);

        $option =  Option::find($request->id);
        $option->name = $request-> name;


        $option->update();
       return to_route('admin.option.index')->with('success', 'Option a bien ete modifie');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();

        return to_route('admin.option.index')->with('success', 'Option a bien ete supprime');
    }
}
