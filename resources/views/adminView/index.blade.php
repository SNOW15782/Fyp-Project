<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-slate-50">
        <div class="grid grid-cols-1 lg:grid-cols-[250px,1fr]">

            <!-- Left column (navigation bar) -->
            <div class="bg-slate-50 p-4 text-blue-950 font-nun">
                <nav class="flex flex-col items-center">
                    <img src="{{ asset('/storage/svg/logo.svg') }}" alt="CO-Z" class="mb-11 mt-10">
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Dashboard</a>
                    <a class="mb-6 text-center border border-grey-200 rounded-full py-2 w-48 text-blue-950 font-bold shadow-lg">New Property</a>
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Anouncement</a>
                    <a href="{{ route('categories.index') }}" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Category</a>
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">User List</a>
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
                </div>

                {{-- table --}}
                <div class="grid grid-cols-7 gap-4 items-center py-2 px-6">
                    <div class="w-52 text-center">Title</div>
                    <div class="w-52 text-center">Description</div>
                    <div class="text-center">Type</div>
                    <div class="text-center">Price</div>
                    <div class="text-center">Location</div>
                    <div class="text-center">Image</div>
                    <div class="text-center">Approval</div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    @foreach ($property as $properties)
                    <div class="border border-gray-300 rounded-3xl grid grid-cols-7 gap-4 items-center py-2 px-6 shadow-transparent hover:shadow-lg">
                        <div class="w-52 truncate">{{ $properties->title }}</div>
                        <div class="w-52 truncate">{{ $properties->description }}</div>
                        <div class="text-center">{{ $properties->type }}</div>
                        <div class="text-center font-bold">{{ $properties->price }}</div>
                        <div class="text-center">{{ $properties->location }}</div>
                        <div class="text-center flex items-center justify-center">
                            <img src="{{ asset($properties->image) }}" alt="Room Image" class="object-cover w-20 h-10">
                        </div>
                        <div class="text-center">
                            <form method="post" action="{{ route('adminView.approve', ['property' => $properties]) }}">
                                @csrf
                                <button type="submit" class="bg-green-500 bg-opacity-20 rounded-[15px] w-[100px] h-6 text-teal-600 text-xs font-bold">
                                    Approve
                                </button>
                            </form>
                            <form method="post" action="{{ route('adminView.reject', ['property' => $properties]) }}">
                                @csrf
                                <button type="submit" class="bg-red-500 bg-opacity-20 rounded-[15px] w-[100px] h-6 text-red-500 text-xs font-bold">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


<script>
    //Delete confirmation
    function confirmDelete(url) {
        if (confirm('Are you sure you want to delete this property?')) {
            window.location.href = url;
        }
    }

    //ALERT BOX
    const successMessage = document.getElementById('success-message');

    if (successMessage) {
        // Delay in milliseconds (e.g., 3000ms or 3 seconds)
        const delay = 3000;

        // Hide or remove the success message after the specified delay
        setTimeout(function () {
            //Hide the element by setting its display to "none"
            successMessage.style.display = 'none';
        }, delay);
    }
</script>

</body>
</html>
