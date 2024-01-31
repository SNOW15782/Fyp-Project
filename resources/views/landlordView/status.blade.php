<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landlord Property</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-slate-50">
        <div class="grid grid-cols-1 lg:grid-cols-[250px,1fr]">

            <!-- Left column (navigation bar) -->
            <div class="bg-slate-50 p-4 text-blue-950 font-nun">
                <nav class="flex flex-col items-center">
                    <img src="{{ asset('/storage/svg/logo.svg') }}" alt="CO-Z" class="mb-11 mt-10">
                    <a href="{{ route('landlordView.index') }}" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Property</a>
                    <a class="mb-6 text-center border border-grey-200 rounded-full py-2 w-48 text-blue-950 font-bold shadow-lg">Status</a>
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Booking</a>
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Profile</a>
                </nav>
            </div>


            <!-- Right column container -->
            <div class="h-screen bg-white rounded-3xl p-4 grid lg:grid-rows-[92px,repeat(3,60px)]">
                <x-admin-comp.header-comp />

                <!-- Content here... -->
                <div class="flex justify-between items-center my-2 ">
                    {{-- Alert --}}
                    <div>
                        @if (session()->has('success'))
                            <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 w-auto rounded relative">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    {{-- Add button --}}
                    <a href="{{ route('landlordView.create') }}" class="bg-blue-950 text-white font-bold rounded-full hover:bg-transparent hover:text-blue-950 border border-blue-950 hover:border-blue-950 hover:shadow-md transition duration-300 ease-in-out py-2 px-8 text-center w-auto">
                        Add New
                    </a>
                </div>

                {{-- data side --}}
                <div class="grid grid-cols-7 gap-4 items-center py-2 px-6">
                    <div class="w-52 text-center">Title</div>
                    <div class="text-center">Type</div>
                    <div class="text-center">Price</div>
                    <div class="text-center">Location</div>
                    <div class="text-center">Status</div>
                    <div class="text-center">Image</div>
                    <div class="text-center">Actions</div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    @foreach ($property as $properties)
                    <div class="border border-gray-300 rounded-3xl grid grid-cols-7 gap-4 items-center py-2 px-6 shadow-transparent hover:shadow-lg">
                        <div class="w-52 truncate">{{ $properties->title }}</div>
                        <div class="text-center">{{ $properties->type }}</div>
                        <div class="text-center"><span>$ </span>{{ $properties->price }}</div>
                        <div class="text-center">{{ $properties->location }}</div>
                        <div class="text-center font-bold">{{ $properties->property_status }}</div>
                        <div class="text-center flex items-center justify-center">
                            <img src="{{ asset($properties->image) }}" alt="Room Image" class="object-cover w-20 h-10">
                        </div>
                        <div class="text-center">
                            <div class="Container w-[72px] h-11 justify-center items-center gap-3 inline-flex">
                                <div>
                                    <a href="{{ route('landlordView.edit', ['property' => $properties]) }}">
                                        <img src="{{ asset('/storage/svg/pencil.svg') }}" alt="Edit">
                                    </a>
                                </div>
                                <form method="post" action="{{ route('landlordView.destroy', ['property' => $properties]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this property?')">
                                        <img src="{{ asset('/storage/svg/rubbish.svg') }}" alt="Delete">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


<script>
    // Check if the success message exists
    const successMessage = document.getElementById('success-message');

    if (successMessage) {
        // Delay in milliseconds (e.g., 3000ms or 3 seconds)
        const delay = 3000;

        // Hide or remove the success message after the specified delay
        setTimeout(function () {
            //Hide the element by setting its display to "none"
            successMessage.style.display = 'none';
            //successMessage.style.display = 'none';
        }, delay);
    }

</script>

</body>

</html>
