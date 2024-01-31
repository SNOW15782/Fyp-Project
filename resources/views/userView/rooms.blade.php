<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>
    @vite('resources/css/app.css')
    <style>

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .start-animation {
            animation: fadeIn 1s ease forwards;
        }
    </style>
</head>

<body class="bg-primary">
    <div class="fixed w-screen z-10">
        <x-basic-comp.header-comp />
    </div>


    <div class="container px-5 pt-40 pb-24 mx-auto z-1">
    {{--   <div>
            <form action="{{ route('userView.index') }}" method="GET">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">Rate</button>
            </form>
        </div> --}}

        <div class="flex flex-wrap -m-4">
            @foreach ($properties as $property)
            <a href="{{ route('userView.show', ['id' => $property]) }}" class="p-4 md:w-1/3 animate-on-scroll opacity-100">
                <div class="h-full transition-colors duration-300 transform hover:bg-gray-100 rounded-lg overflow-hidden">
                    <img class="lg:h-48 md:h-36 w-full object-cover object-center rounded-lg" src="{{ asset($property->image) }}" alt="Room Image">
                    <div class="p-6">
                        <h2 class="tracking-widest uppercase text-sm title-font font-medium text-gray-500 mb-1">{{ $property->type }}</h2>
                        <h1 class="title-font text-xl font-semibold text-black mb-5 h-10">{{ $property->title }}</h1>

                        <div class="flex items-center flex-wrap ">
                            <p class="inline-flex items-center md:mb-2 lg:mb-0 text-md font-semibold">${{ $property->price }}<span>/month</span></p>
                            <span class="text-gray-500 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm py-1">
                                {{ number_format($property->averageRating, 2) }}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-yellow-400 cursor-pointer">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- <script>
        function isVisible(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top < window.innerHeight &&
                    rect.bottom >= 0
                );
            }

            const animateOnScroll = () => {
                document.querySelectorAll('.animate-on-scroll').forEach(element => {
                    if (isVisible(element) && !element.classList.contains('has-been-visible')) {
                        element.classList.add('start-animation', 'has-been-visible');
                    } else if (!isVisible(element)) {
                        element.classList.remove('start-animation');
                        element.classList.remove('has-been-visible');
                    }
                });
            };

            window.addEventListener('scroll', animateOnScroll);
    </script> --}}

</body>
</html>
