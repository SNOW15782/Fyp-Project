<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <!-- Include Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mx-auto mt-4">
        <h1 class="text-2xl">Edit Property</h1>

        <form method="post" action="{{ route('landlordView.update', ['property' => $property]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 px-4">
                    <div class="mt-4">
                        <label for="title" class="block">Rental Name</label>
                        <input type="text" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="rentalName" name="title" value="{{ $property->title }}">
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block">Description</label>
                        <textarea class="form-textarea w-full border border-gray-300 rounded py-2 px-3" id="description" name="description" rows="4">{{ $property->description }}</textarea>
                    </div>
                    <div class="mt-4">
                        <label for="area_sqft" class="block">Area (sqft)</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="area_sqft" name="area_sqft" value="{{ $property->area_sqft }}">
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-4">
                    <div class="mt-4">
                        <label for="bedrooms" class="block">Bedrooms</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="bedrooms" name="bedrooms" value="{{ $property->bedrooms }}">
                    </div>
                    <div class="mt-4">
                        <label for="bathrooms" class="block">Bathrooms</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="bathrooms" name="bathrooms" value="{{ $property->bathrooms }}">
                    </div>
                    <div class="mt-4">
                        <label for="price" class="block">Price</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="price" name="price" value="{{ $property->price }}">
                    </div>
                    <div class="mt-4">
                        <label for="property_type" class="block">Property Type</label>
                        <select class="form-select w-full border border-gray-300 rounded py-2 px-3" id="type" name="type">
                            @foreach($categories as $category)
                                <option value="{{ $category->name }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 px-4"> <!-- Third column, full width on mobile, half on medium screens and wider -->
                    <div class="mt-4">
                        <label for="location" class="block">Location</label>
                        <input type="text" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="location" name="location" value="{{ $property->location }}">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Save Update</button>
                        <a href="{{ route('landlordView.index') }}" class="bg-red-400 hover:bg-red-200 text-white py-2 px-4 rounded">Cancel</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-4"> <!-- Fourth column, full width on mobile, half on medium screens and wider -->
                    <div class="mt-4">
                        <label for="image" class="block">New Image</label>
                        <input type="file" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="image" name="image">
                    </div>
                    <div id="imagePreview" class="mt-2" style="max-width: 300px; max-height: 200px;">
                        <img src="{{ asset($property->image) }}" alt="Current Room Image" class="mb-2">
                    </div>
                    {{-- <div class="mt-4">
                        <label class="block">Current Image</label>
                        <img src="{{ asset($property->image) }}" alt="Current Room Image" class="mb-2" style="max-width: 300px; max-height: 200px;">
                    </div> --}}
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function () {
                // Clear previous preview
                imagePreview.innerHTML = '';

                // Get selected file
                const file = imageInput.files[0];

                // Display image preview
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Image Preview';
                        // img.className = 'w-full h-auto'; // Tailwind CSS classes for responsive image
                        imagePreview.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

</body>
</html>
