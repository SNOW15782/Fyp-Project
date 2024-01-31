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
                    <a href="{{ route('adminView.index') }}" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">New Property</a>
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Anouncement</a>
                    <a class="mb-6 text-center border border-grey-200 rounded-full py-2 w-48 text-blue-950 font-bold shadow-lg">Category</a>
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

                    <a href="{{ route('categories.create') }}" class="bg-blue-950 text-white font-bold rounded-full hover:bg-transparent hover:text-blue-950 border border-blue-950 hover:border-blue-950 hover:shadow-md transition duration-300 ease-in-out py-2 px-8 text-center w-auto">
                        Add New
                    </a>
                </div>

                {{-- table --}}
                <div class="grid grid-cols-5 gap-4 items-center py-2 px-6">
                    <div class="w-52 text-center">Category Name</div>
                    <div class="text-center">Property Listed</div>
                    <div class="text-center">Updated</div>
                    <div class="text-center">Added</div>
                    <div class="text-center">Action</div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    @forelse ($categories as $category)
                        <div class="border border-gray-300 rounded-3xl grid grid-cols-5 gap-4 items-center py-2 px-6 shadow-transparent hover:shadow-lg">
                            <div class="w-52 text-center">{{ $category->name }}</div>
                            <div class="text-center">{{ $category->totalProperties }}</div>
                            <div class="text-center">{{ $category->updated_at->format('Y-m-d') }}</div>
                            <div class="text-center">{{ $category->created_at->format('Y-m-d') }}</div>
                            <div class="text-center">
                                <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                            </div>
                        </div>

                        @empty
                        <div>
                            <td colspan="2" class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">No categories found.</td>
                        </div>
                    @endforelse
                    </div>
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
