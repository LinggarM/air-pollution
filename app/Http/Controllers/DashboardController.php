<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8000/api/pollutions');
        $pollutions = $response->json();

        return view('dashboard', compact('pollutions'));
    }
}
