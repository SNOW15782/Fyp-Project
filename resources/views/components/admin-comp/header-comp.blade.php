@php
    $namespace = 'admin-comp';
@endphp


<nav x-data="{ isOpen: false }" class="relative h-[92px]">
    <div class="container py-4 mx-auto">
        <div class="lg:flex lg:items-right lg:justify-between">
            <div class="flex items-center justify-between">
                <h1 class="capitalize text-blue-950 text-[40px] font-nun font-semibold">{{ Auth::user()->user_type }}</h1>
            </div>
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                <form method="GET" action="{{ url('/search') }}" class="relative mt-4 md:mt-0 mx-10">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg type="submit" class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>

                    <input type="text" name="search" id="search" class="w-auto py-2 pl-10 pr-10 text-gray-700 bg-white border rounded-full focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search" value="{{ old('search') }}">
                </form>
                <div class="flex items-center mt-4 lg:mt-0">
                    <a class="mr-4 text-gray-700" href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>

                    <div class="w-10 h-10 overflow-hidden border-2 border-gray-400 rounded-full">
                        <a href="{{ route('profile.edit') }}">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
