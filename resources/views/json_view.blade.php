<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON File Manager</title>
</head>
<body>

    <h2>Manage JSON File</h2>

    <!-- Create JSON File Button -->
    <form action="{{ route('json.create') }}" method="POST">
        @csrf
        <button type="submit">Create JSON File</button>
    </form>

    <hr>

    <!-- Display JSON Content -->
    <h3>JSON File Content:</h3>
    <pre>{{ $jsonData }}</pre>

    <!-- Textarea to Append Data -->
    <h3>Append Data to JSON File:</h3>
    <form action="{{ route('json.save') }}" method="POST">
        @csrf
        <textarea name="json_data" rows="5" cols="50" placeholder='{"id": 3, "name": "New User", "email": "user@example.com"}'></textarea>
        <br>
        <button type="submit">Save JSON</button>
    </form>

</body>
</html>