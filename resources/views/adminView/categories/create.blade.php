<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Category</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-sm p-4 mt-8">
        <h2 class="text-2xl font-semibold mb-4">Create a New Category</h2>
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="text-sm font-medium">Category Name:</label>
                <input type="text" name="name" class="border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-300">Create Category</button>
        </form>
    </div>
</body>
</html>
