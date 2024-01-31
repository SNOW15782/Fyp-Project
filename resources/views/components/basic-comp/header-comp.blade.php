@php
    $namespace = 'admin-comp';
@endphp


<nav class="relative bg-white border-b-2">
    <div class="py-11 px-20">
        <div class="lg:flex lg:items-right lg:justify-between">
            <div class="flex items-center justify-between">
                <a href="{{ route('homepage') }}" class="flex items-center space-x-2">
                    <img class="w-auto h-11 sm:h-10" src="{{ asset('/storage/svg/logo.svg') }}" alt="CO-Z">
                    <img class="w-auto h-4 sm:h-5" src="{{ asset('/storage/svg/textlogo.svg') }}" alt="CO-Z">
                </a>
            </div>

            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                <div class="flex flex-col -mx-6 lg:flex-row lg:items-center lg:mx-8">
                    <a href="{{ route('homepage') }}" class="px-3 py-2 mx-3 mt-2 text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 ">HOME</a>
                    <a href="#" class="px-3 py-2 mx-3 mt-2 text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100">ABOUT</a>
                    <a href="{{ route('userView.index') }}" class="px-3 py-2 mx-3 mt-2 text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100">TENANT</a>
                    <a href="#" class="px-3 py-2 mx-3 mt-2 text-gray-700 transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100">PROPERTY</a>
                </div>
                <div class="flex items-center mt-4 lg:mt-0">
                    <div class="w-11 h-11 overflow-hidden border-2 border-gray-400 rounded-full">
                        <a href="{{ route('profile.edit') }}">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
