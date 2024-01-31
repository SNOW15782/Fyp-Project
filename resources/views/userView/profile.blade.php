<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Co-Z User Profile</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="mx-auto mt-8 max-w-3xl rounded-md bg-white p-8 shadow-md">
            <!-- User Profile Picture -->
            <div class="mb-6 flex items-center justify-center">
                <img src="{{ asset($user->user_profile) }}" alt="Profile Picture" class="h-32 w-32 rounded-full border border-black" />
            </div>

            <!-- Co-Z Score Display -->
            <div class="mt-6 text-center">
                <p class="text-gray-700">Co-Z Score:</p>
                <div class="flex items-center justify-center space-x-2">
                    <span class="text-6xl font-bold text-blue-500">8.5</span>
                    <span class="text-2xl text-gray-500">/10</span>
                </div>
            </div>

            <!-- User Name and Short Bio -->
            <div class="container my-10">
                <div class="flex space-x-2">
                    <span class="text-balck text-2xl font-bold">{{ $user->name }}</span>
                    <span class="text-2xl text-gray-500">{{ $user->age }}</span>
                </div>
                <div>
                    <p class="text-gray-500">Status: {{ $user->user_status }}</p>
                </div>
                <div class="container flex flex-row my-4">
                    <div class="mr-10">
                        <span class="text-semiblod">9<br /></span><span class="text-gray-500">positive reviews</span>
                    </div>
                    <!-- Add more user data fields as needed -->
                </div>
                <div class="container flex flex-row my-4">
                    <div class="mr-10">
                        <span class="text-semiblod">{{ $user->language }}<br /></span><span class="text-gray-500">language spoken</span>
                    </div>
                </div>
                <div class="container flex flex-row my-10">
                    <div class="mr-10">
                        <span class="text-semiblod">Contact<br /></span><span class="text-gray-500">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

