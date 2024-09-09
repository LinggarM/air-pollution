@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NH3</th>
                    <th>NO2</th>
                    <th>CO</th>
                    <th>PM2.5</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pollutions as $pollution)
                    <tr>
                        <td>{{ $pollution['id'] }}</td>
                        <td>{{ $pollution['NH3'] }}</td>
                        <td>{{ $pollution['NO2'] }}</td>
                        <td>{{ $pollution['CO'] }}</td>
                        <td>{{ $pollution['PM2_5'] }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                            <form action="#" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
