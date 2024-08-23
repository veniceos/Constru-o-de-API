<?php

namespace App\Http\Controllers;
use App\Models\LocationModel;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations  = LocationModel::all();
        return response()->json($locations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "street" => "required|string|max:255",
            "neighborhood" => "required|string",
            "number" => "required|string",
            "CEP" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            "country" => "required|string",
        ]);

        $location = LocationModel::create($validatedData);
        return response()->json($location, 201);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = LocationModel::find($id);

        if (!$location) {
            return response()->json(["message" => "Location not found."], 404);
        }

        return response()->json($location);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $location = LocationModel::find($id);

        if (!$location) {
            return response()->json(["message"=> "Location not found"],404);}
        

        $validatedData = $request->validate([
            "street" => "required|string|max:255",
            "neighborhood" => "required|string",
            "number" => "required|string",
            "CEP" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            "country" => "required|string",
        ]);
    
        $location->update($validatedData);
        return response()->json($location, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = LocationModel::find($id);
        
        if (!$location) {
            return response()->json(["message"=> "Location not found."],404);
        }

        $location->delete();
        return response()->json(["message"=> "Location delet successfully"],200);
    }
}
