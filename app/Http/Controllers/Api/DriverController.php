<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Driver::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'license_number' => 'required|string|unique:drivers',
            'phone' => 'required|string',
        ]);
        
        $driver = Driver::create(array_merge($validated,["status"=>"available"]));

        return response()->json($driver,201);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        if($driver->status==="on_trip"){
            return response()->json([
                "Message"=>"you can't delete this Driver"
            ],422);
        }
        $driver->delete();
        
        return response()->json([
        "message" => "Driver deleted successfully!"
    ], 200);
        
    }
}
