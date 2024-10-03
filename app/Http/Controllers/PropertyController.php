<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyFormRequest;
use App\Models\property;
use Illuminate\Http\Request;
use PhpParser\Builder\Property as BuilderProperty;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.properties.index',[
            'properties' =>property::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $property=new Property();
        $property->fill([
            'surface'=>40,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'price'=>0,
            'city'=>'Conakry',
            'address'=>'',
            'postal_code'=>'5643',
           'sold'=>false,
        ]);
        return view('admin.properties.form',[
            'property'=>$property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        //
        $property=property::create($request->validated());
        return redirect()->route('admin.property.index')->with('success', 'Bien créé avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)

    {
        return view('admin.properties.form',[
            'property'=>$property
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        return redirect()->route('admin.property.index')->with('success', 'Bien modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Bien supprimé avec succès');
    }
}
