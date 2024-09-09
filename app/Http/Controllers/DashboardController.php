<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $token = session('token');

        // Fetch data from API
        $response = Http::withToken($token)->get('http://127.0.0.1:8000/api/v1/pollutions');
        $data = $response->json();

        // Pass data to the view
        return view('dashboard.index', ['pollutions' => $data]);
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'NH3' => 'required|numeric',
            'NO2' => 'required|numeric',
            'CO' => 'required|numeric',
            'PM2_5' => 'required|numeric',
            'O3' => 'required|numeric',
            'Date' => 'required|date',
        ]);

        // Create a new pollution entry via API
        $response = Http::withToken(session('3|QQI5L80XzonKYtGduVaEyyayxbQdqgCm0vyLAHKJ'))
            ->post('http://127.0.0.1:8000/api/v1/pollutions', $validated);

        if ($response->successful()) {
            return redirect()->route('dashboard.index')->with('success', 'Pollution data added successfully.');
        } else {
            return redirect()->back()->withErrors('Error creating pollution data.');
        }
    }

    public function edit($id)
    {
        // Fetch pollution data from the API
        $response = Http::withToken(session('3|QQI5L80XzonKYtGduVaEyyayxbQdqgCm0vyLAHKJ'))
            ->get("http://127.0.0.1:8000/api/v1/pollutions/{$id}");

        if ($response->successful()) {
            $pollution = $response->json();
            return view('dashboard.edit', compact('pollution'));
        } else {
            return redirect()->back()->withErrors('Error fetching pollution data.');
        }
    }

    public function update(Request $request, $id)
    {
        // Validation
        $validated = $request->validate([
            'NH3' => 'required|numeric',
            'NO2' => 'required|numeric',
            'CO' => 'required|numeric',
            'PM2_5' => 'required|numeric',
            'O3' => 'required|numeric',
            'Date' => 'required|date',
        ]);

        // Update pollution data via API
        $response = Http::withToken(session('3|QQI5L80XzonKYtGduVaEyyayxbQdqgCm0vyLAHKJ'))
            ->put("http://127.0.0.1:8000/api/v1/pollutions/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('dashboard.index')->with('success', 'Pollution data updated successfully.');
        } else {
            return redirect()->back()->withErrors('Error updating pollution data.');
        }
    }
}
