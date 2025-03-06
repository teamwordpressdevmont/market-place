<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON File Manager</title>
    
    <script>
        function enableSaveButton() {
            document.getElementById("saveBtn").disabled = false;
        }

        function validateAndSubmit() {
            try {
                JSON.parse(document.getElementById("jsonEditor").value);
                return true;
            } catch (e) {
                alert("Invalid JSON format! Please check your content.");
                return false;
            }
        }

        function loadSelectedFile() {
            let selectedFile = document.getElementById("fileSelector").value;
            window.location.href = "{{ route('json.show') }}?file=" + selectedFile;
        }
    </script>
</head>
<body>

    <h2>Manage JSON File</h2>

    <!-- Create New JSON File -->
    <h3>Create New JSON File:</h3>
    <!--<form action="{{ route('json.create') }}" method="POST">-->
    <!--    @csrf-->
    <!--    <input type="text" name="file_name" placeholder="Enter file name (without .json)" required>-->
    <!--    <button type="submit">Create JSON File</button>-->
    <!--</form>-->

    <hr>
    
    <!-- Dropdown to select JSON file -->
    <label>Select JSON File:</label>
    <select id="fileSelector" onchange="loadSelectedFile()">
        @foreach($jsonFiles as $file)
            <option value="{{ $file }}" {{ $selectedFile == $file ? 'selected' : '' }}>{{ $file }}</option>
        @endforeach
    </select>

    <hr>
    @if (session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif
    
    @if (session('error'))
        <div style="color: red; font-weight: bold;">
            {{ session('error') }}
        </div>
    @endif
    <hr>

    <!-- Textarea for Editing JSON -->
    <h3>Edit JSON File:</h3>
    <form action="{{ route('json.save') }}" method="POST" onsubmit="return validateAndSubmit();">
        @csrf
        <input type="hidden" name="selected_file" value="{{ $selectedFile }}">
        <textarea id="jsonEditor" name="json_data" rows="10" cols="80" oninput="enableSaveButton()">{{ $jsonData }}</textarea>
        <br>
        <button type="submit" id="saveBtn" disabled>Save Changes</button>
    </form>

</body>
</html>