@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Pollution Data</h1>

        <form action="{{ route('dashboard.store') }}" method="POST">
            @csrf
            <!-- Form fields for pollution data -->
            <div class="form-group">
                <label for="NH3">NH3</label>
                <input type="text" class="form-control" name="NH3" required>
            </div>
            <!-- Repeat for other fields like NO2, CO, PM2_5, O3, Date -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
