<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthViewController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        // Send registration request to the API
        $response = Http::post('http://127.0.0.1:8000/api/register', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        // Parse response and store token
        $data = $response->json();
        session(['token' => $data['access_token']]);

        return redirect()->route('dashboard');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate user input
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        // Send login request to the API
        $response = Http::post('http://127.0.0.1:8000/api/login', [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        // Parse response and store token
        $data = $response->json();
        if ($response->successful()) {
            session(['token' => $data['access_token']]);
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['message' => 'Login failed']);
        }
    }

    public function logout()
    {
        $token = session('token');

        // Send delete request with token
        $response = Http::withToken($token)->delete('http://127.0.0.1:8000/api/user/delete');

        if ($response->successful()) {
            session()->forget('token');
            return redirect()->route('login');
        } else {
            return back()->withErrors(['message' => 'Failed to delete account']);
        }
    }
}
