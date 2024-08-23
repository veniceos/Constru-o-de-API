<?php

namespace App\Http\Controllers;
use App\Models\CompetitorModel;
use Illuminate\Http\Request;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitor  = CompetitorModel::all();
        return response()->json($competitor);
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
            "name" => "required|string|max:255",
            "age" => "required|string",
            "height" => "required|string",
            "weight" => "required|string",
            "gender" => "required|string",
            "CPF" => "required|string",
            "RG" => "required|string",
            "team" => "required|string",
        ]);

        $competitor = CompetitorModel::create($validatedData);
        return response()->json($competitor, 201);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competitor = CompetitorModel::find($id);

        if (!$competitor) {
            return response()->json(["message" => "Competitor not found."], 404);
        }

        return response()->json($competitor);
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
        $competitor = CompetitorModel::find($id);

        if (!$competitor) {
            return response()->json(["message"=> "Competitor not found"],404);}
        

        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "age" => "required|string",
            "height" => "required|string",
            "weight" => "required|string",
            "gender" => "required|string",
            "CPF" => "required|string",
            "RG" => "required|string",
            "team" => "required|string",
        ]);
    
        $competitor->update($validatedData);
        return response()->json($competitor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $competitor = CompetitorModel::find($id);
        
        if (!$competitor) {
            return response()->json(["message"=> "Competitor not found."],404);
        }

        $competitor->delete();
        return response()->json(["message"=> "Competitor delet successfully"],200);
    }
}
