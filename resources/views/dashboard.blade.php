<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Environmental Sensor Dashboard</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sensor Name</th>
                    <th>Value</th>
                    <th>Unit</th>
                    <th>Measured At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sensors as $sensor)
                <tr>
                    <td>{{ $sensor['name'] }}</td>
                    <td>{{ $sensor['value'] }}</td>
                    <td>{{ $sensor['unit'] }}</td>
                    <td>{{ $sensor['measured_at'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
