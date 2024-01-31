<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    <div class="container mx-auto mt-10 mb-10">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>*{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-2xl">New Property</h1>

        <form method="post" action="{{ route('landlordView.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="flex flex-wrap -mx-4">
                <!-- First column, full width on mobile, half on medium screens and wider -->
                <div class="w-full md:w-1/2 px-4">
                    <div class="mt-4">
                        <label for="rentalName" class="block">Rental Name</label>
                        <input type="text" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="rentalName" name="title">
                    </div>
                    <div class="mt-4">
                        <label for="description" class="block">Description</label>
                        <textarea class="form-textarea w-full border border-gray-300 rounded py-2 px-3" id="description" name="description" rows="4"></textarea>
                    </div>
                    <div class="mt-4">
                        <label for="area_sqft" class="block">Area (sqft)</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="area_sqft" name="area_sqft">
                    </div>
                </div>

                <!-- Second column, full width on mobile, half on medium screens and wider -->
                <div class="w-full md:w-1/2 px-4">
                    <!-- Additional fields specific to your table -->
                    <div class="mt-4">
                        <label for="bedrooms" class="block">Bedrooms</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="bedrooms" name="bedrooms">
                    </div>
                    <div class="mt-4">
                        <label for="bathrooms" class="block">Bathrooms</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="bathrooms" name="bathrooms">
                    </div>
                    <div class="mt-4">
                        <label for="price" class="block">Price</label>
                        <input type="number" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="price" name="price">
                    </div>
                    <div class="mt-4">
                        <label for="property_type" class="block">Property Type</label>
                        <select class="form-select w-full border border-gray-300 rounded py-2 px-3" id="type" name="type">
                            @foreach($categories as $category)
                                <option value="{{ $category->name }} {{old('category_name') ? 'selected' : null}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Third column, full width on mobile, half on medium screens and wider -->
                <div class="w-full md:w-1/2 px-4">
                    <div class="mt-4">
                        <label for="location" class="block">Location</label>
                        <input type="text" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="location" name="location">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Save Room</button>
                    </div>
                </div>

                <!-- Fourth column, full width on mobile, half on medium screens and wider -->
                <div class="w-full md:w-1/2 px-4">
                    <div class="mt-4">
                        <label for="image" class="block">Image Path</label>
                        <input type="file" class="form-input w-full border border-gray-300 rounded py-2 px-3" id="image" name="image">
                    </div>
                    <div class="mt-4">
                        <div id="imagePreview" class="mt-2" style="max-width: 300px; max-height: 200px;"></div>
                    </div>
                </div>
                {{-- <div>
                    <label for="file" class="block text-sm text-gray-500 dark:text-gray-300">File</label>

                    <label for="dropzone-file" class="flex flex-col items-center w-full max-w-lg p-5 mx-auto mt-2 text-center bg-white border-2 border-gray-300 border-dashed cursor-pointer dark:bg-gray-900 dark:border-gray-700 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500 dark:text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>

                        <h2 class="mt-1 font-medium tracking-wide text-gray-700 dark:text-gray-200">Payment File</h2>

                        <p class="mt-2 text-xs tracking-wide text-gray-500 dark:text-gray-400">Upload or darg & drop your file SVG, PNG, JPG or GIF. </p>

                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div> --}}
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
                    //img.className = 'w-full h-auto'; // Tailwind CSS classes for responsive image
                    imagePreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>

</body>
</html>
