@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pollution Data</h1>

        <form action="{{ route('dashboard.update', $pollution['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Form fields for pollution data, prefilled with the existing data -->
            <div class="form-group">
                <label for="NH3">NH3</label>
                <input type="text" class="form-control" name="NH3" value="{{ $pollution['NH3'] }}" required>
            </div>
            <!-- Repeat for other fields like NO2, CO, PM2_5, O3, Date -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
