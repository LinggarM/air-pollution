<?php

namespace App\Http\Controllers;

use App\Models\Pollution;
use Illuminate\Http\Request;

class PollutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all records from the environmental_data table
        $data = Pollution::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'NH3' => 'required|numeric',
            'NO2' => 'required|numeric',
            'CO' => 'required|numeric',
            'PM2_5' => 'required|numeric',
            'Temp' => 'nullable|numeric',
            'Pressure' => 'nullable|numeric',
            'Humidity' => 'nullable|numeric',
            'O3' => 'required|numeric',
            'Date' => 'required|date',
        ]);

        // Create a new record
        $data = Pollution::create($validated);
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pollution $pollution
     * @return \Illuminate\Http\Response
     */
    public function show(Pollution $pollution)
    {
        // return response()->json($pollution);
        if ($pollution) {
            return api_response('success', 'Post retrieved successfully', $pollution);
        } else {
            return api_response('error', 'Post not found', null, '404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \App\Models\Pollution $pollution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pollution $pollution)
    {
        // Validate the request
        $validated = $request->validate([
            'NH3' => 'required|numeric',
            'NO2' => 'required|numeric',
            'CO' => 'required|numeric',
            'PM2_5' => 'required|numeric',
            'Temp' => 'nullable|numeric',
            'Pressure' => 'nullable|numeric',
            'Humidity' => 'nullable|numeric',
            'O3' => 'required|numeric',
            'Date' => 'required|date',
        ]);

        // Update the record
        $pollution->update($validated);
        return response()->json($pollution);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pollution $pollution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pollution $pollution)
    {
        // Delete the record
        $pollution->delete();
        return response()->json(null, 204);
    }
}
