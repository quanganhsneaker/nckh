<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }
    
    public function create()
    {
        return view('locations.create');
    }
    
    public function store(Request $request)
    {
        Location::create($request->except('_token'));
        return redirect()->route('locations.index');
    }
    
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }
    
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        $location->update($request->all());
        return redirect()->route('locations.index');
    }
    
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('locations.index');
    }
    
}
