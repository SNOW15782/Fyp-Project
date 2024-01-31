<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-primary p-4">
    <div class="container px-5 py-24 mx-auto gap-24">
        <div class="lg:w-4/5 mx-auto grid grid-cols-[1fr,500px]">
            <div class="p-4 w-full">
                <img alt="ecommerce" class="w-full h-auto object-cover rounded mb-4" src="{{ asset($property->image) }}" alt="Room Image">
                <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $property->type }}</h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $property->title }}</h1>
                <div class="flex mb-4">
                    <span class="flex items-center">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <p class="text-gray-600 ml-3">{{ $property->totalRatings }}</p>
                    </span>
                </div>
                <span class="title-font font-medium text-2xl text-gray-900">${{ $property->price }}</span>
                <p class="leading-relaxed pt-10">{{ $property->description }}</p>
            </div>

            <div class="w-full lg:py-6 mt-6 lg:mt-0">
                <div class="px-10 fixed">
                    <p class="pb-6 text-black text-sm">Select date</p>
                    <div class="mb-10 w-full flex items-center justify-center">
                        <form action="">
                            <input type="date" name="start" class="rounded-lg bg-transparent border-3 border-black h-20">
                            <span class="mx-4 text-black text-3xl">→</span>
                            <input type="date" name="end" class="rounded-lg bg-transparent border-3 border-black h-20 ">
                        </form>
                    </div>

                    <button class="w-full p-6 rounded-lg text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600">Check availability</button>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                        <div class="grid grid-cols-2 gap-x-10 gap-y-5">
                            <p class="text-gray-600">Bedrooms: {{ $property->bedrooms }}</p>
                            <p class="text-gray-600">Bathrooms: {{ $property->bathrooms }}</p>
                            <p class="text-gray-600">Area: {{ $property->area_sqft }} sqft</p>
                            <p class="text-gray-600">Location: {{ $property->location }}</p>
                        </div>
                    </div>
                    <form action="{{ route('rating.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <h2>Rate Property</h2>
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            <div class="mb-4">
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
            </div>
        </div>
    </div>

</body>
</html>
