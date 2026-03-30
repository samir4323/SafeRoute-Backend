<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\Vehicle;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::with(["driver","vehicle"])->get();
        return response()->json($trips);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validation
    $validated = $request->validate([
        'vehicle_id' => 'required|exists:vehicles,id',
        'driver_id' => 'required|exists:drivers,id',
        'start_point' => 'required|string',
        'end_point' => 'required|string',
    ]);

    return DB::transaction(function () use ($validated) {
        
        $trip = Trip::create([
            'vehicle_id' => $validated['vehicle_id'],
            'driver_id' => $validated['driver_id'],
            'start_point' => $validated['start_point'],
            'end_point' => $validated['end_point'],
            'start_time' => now(),
            'status' => 'in_progress'
        ]);

        Vehicle::where('id', $validated['vehicle_id'])->update(['status' => 'maintenance']);

        Driver::where('id', $validated['driver_id'])->update(['status' => 'on_trip']);

        return response()->json($trip, 201);
    });
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
    public function destroy(string $id)
    {
        //
    }
}
