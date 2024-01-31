<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Rating</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Add Rating</h2>
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 mt-2 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('rating.store') }}" method="POST" class="space-y-4">
        {{-- <form method="POST" action="{{ route('r.store', ['property' => $property->id]) }}"> --}}
            @csrf
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium">Rating:</label>
                <select name="rating" id="rating" class="block w-full bg-gray-100 border border-gray-300 text-gray-700 py-2 px-3 rounded-md leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="1">1 (Poor)</option>
                    <option value="2">2 (Fair)</option>
                    <option value="3">3 (Good)</option>
                    <option value="4">4 (Very Good)</option>
                    <option value="5">5 (Excellent)</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">Rate</button>
            <a href="{{ route('rating.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
        </form>
    </div>
</body>
</html>
