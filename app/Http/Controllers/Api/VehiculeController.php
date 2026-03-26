<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Vehicle::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "plate_number"=>"required|unique:vehicles",
            "model"=>"required",
            "status"=>"required|in:active,maintenance"
        ]);
        $vehicle = Vehicle::create($validated);
        return response()->json($vehicle,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehicle::destroy($id); 

    return response()->json(['message' => 'Vehicle deleted!']);
    }

    public function toggleStatus($id){
        $vehicle = Vehicle::findOrFail($id);
    
        $vehicle->status = ($vehicle->status === 'active') ? 'maintenance' : 'active';
        $vehicle->save();

    return response()->json([
        'message' => 'Status updated successfully',
        'new_status' => $vehicle->status
    ]);
    }
}
