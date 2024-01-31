<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Profile</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold mb-4">Create User Profile</h2>
            <form method="POST" action="{{ route('userprofile.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="age" class="block text-gray-600 font-medium">Age</label>
                    <input id="age" type="number" class="form-input w-full" name="age" value="{{ old('age') }}" required>
                    @error('age')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="user_status" class="block text-gray-600 font-medium">User Status</label>
                    <input id="user_status" type="text" class="form-input w-full" name="user_status" value="{{ old('user_status') }}">
                    @error('user_status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Add more form fields for other profile properties -->

                <div class="mb-4">
                    <label for="profile_picture" class="block text-gray-600 font-medium">Profile Picture</label>
                    <input id="profile_picture" type="file" class="form-input w-full" name="profile_picture">
                    @error('profile_picture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Create Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
