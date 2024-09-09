<?php

namespace App\Http\Controllers;

use App\Models\Pollution;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PollutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get paginated records from the environmental_data table
        $perPage = $request->get('per_page', 10); // Default is 10 records per page, can be set by query parameter

        // Paginate the results
        $data = Pollution::paginate($perPage);

        // Return the paginated response with api_response helper
        return api_response('success', 'Data retrieved successfully', $data);
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

        return api_response('success', 'Data created successfully', $data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // Retrieve the pollution data by ID
            $pollution = Pollution::findOrFail($id);

            return api_response('success', 'Post retrieved successfully', $pollution);
        } catch (ModelNotFoundException $e) {
            return api_response('error', 'Post not found', null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        try {
            // Retrieve the pollution data by ID and update it
            $pollution = Pollution::findOrFail($id);
            $pollution->update($validated);

            return api_response('success', 'Data updated successfully', $pollution);
        } catch (ModelNotFoundException $e) {
            return api_response('error', 'Post not found', null, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Retrieve the pollution data by ID and delete it
            $pollution = Pollution::findOrFail($id);
            $pollution->delete();

            return api_response('success', 'Data deleted successfully', null, 200);
        } catch (ModelNotFoundException $e) {
            return api_response('error', 'Post not found', null, 404);
        }
    }
}
