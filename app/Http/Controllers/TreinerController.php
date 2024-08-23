<?php

namespace App\Http\Controllers;
use App\Models\TreinerModel;
use Illuminate\Http\Request;

class TreinerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treiners  = TreinerModel::all();
        return response()->json($treiners);
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
            "CPF" => "required|string",
            "RG" => "required|string",
        ]);

        $treiner = TreinerModel::create($validatedData);
        return response()->json($treiner, 201);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treiner = TreinerModel::find($id);

        if (!$treiner) {
            return response()->json(["message" => "Treiner not found."], 404);
        }

        return response()->json($treiner);
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
        $treiner = TreinerModel::find($id);

        if (!$treiner) {
            return response()->json(["message"=> "Treiner not found"],404);}
        

        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "age" => "required|string",
            "height" => "required|string",
            "CPF" => "required|string",
            "RG" => "required|string",
        ]);
    
        $treiner->update($validatedData);
        return response()->json($treiner, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $treiner = TreinerModel::find($id);
        
        if (!$treiner) {
            return response()->json(["message"=> "Treiner not found."],404);
        }

        $treiner->delete();
        return response()->json(["message"=> "Treiner delet successfully"],200);
    }
}
