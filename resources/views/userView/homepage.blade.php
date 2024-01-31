<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CO-Z Your Perfect Living Space</title>

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
{{-- <img class="w-auto h-4 sm:h-5" src="{{ asset('/storage/images/CO-Z text.png') }}" alt="CO-Z"> --}}
<body class="min-h-screen relative">
    <img src="{{ asset('/storage/images/etienne-beauregard-riverin-B0aCvAVSX8E-unsplash 17.png') }}" alt="" class="fixed w-full h-full object-cover">
    <div class="fixed inset-0 bg-black opacity-50"></div>

{{-- Navigation Bar --}}
    <nav class="fixed w-screen z-50 bg-transparent">
        <div class="py-11 px-20">
            <div class="lg:flex lg:items-right lg:justify-between">
                <div class="flex items-center justify-between">
                    <a href="{{ route('homepage') }}" class="flex items-center space-x-2">
                        <img class="w-auto h-11 sm:h-10 pr-3" src="{{ asset('/storage/images/CO-Z logo.png') }}" alt="CO-Z Logo">
                        <img class="w-auto h-4 sm:h-5" src="{{ asset('/storage/images/CO-Z text.png') }}" alt="CO-Z text">
                    </a>
                </div>

                <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-grey-200 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                    <div class="flex flex-col -mx-6 lg:flex-row lg:items-center">
                        <a href="{{ route('homepage') }}" class="px-3 py-2 mx-3 mt-2 text-white transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:bg-opacity-10 ">HOME</a>
                        <a href="{{ route('about-us') }}" class="px-3 py-2 mx-3 mt-2 text-white transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:bg-opacity-10 ">ABOUT</a>
                        <a href="#" class="px-3 py-2 mx-3 mt-2 text-white transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:bg-opacity-10 ">TENANT</a>
                        <a href="{{ route('userView.index') }}" class="px-3 py-2 mx-3 mt-2 text-white transition-colors duration-300 transform rounded-md lg:mt-0 hover:bg-gray-100 hover:bg-opacity-10 ">PROPERTY</a>
                        <a href="{{ route('register') }}" class="px-3 py-2 mx-3 mt-2 text-white transition-colors duration-300 transform rounded-md lg:mt-0 bg-gray-100 bg-opacity-10 ">SIGN UP →</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
   {{-- Hero Section --}}
    <section class="top-section transform pt-40 h-screen flex-rows transition-all duration-500 ease-in-out">
        <div class="px-20 pb-20 ">
            <div class="w-[400px]">
                <span class="text-[50px] font-semibold uppercase leading-[80px] tracking-wider text-white">
                    Journey to your perfect home
                </span>
            </div>
        </div>

        <div class="container">
            <div class="flex px-20 h-8">
                <div class="flex justify-center items-center w-32 bg-white rounded-t-xl">
                    <p>RENT</p>
                </div>
                <div class="flex justify-center items-center w-32 text-white bg-white bg-opacity-30 rounded-t-xl">
                    <p class="">TENANT</p>
                </div>
            </div>
            <div class="px-20">
                <div class="flex justify-between w-1/2 bg-white rounded-b-xl rounded-tr-xl">
                    <p class="flex-grow px-3 py-2 m-4 border-r-2">Location
                        <input type="text" placeholder="Kuala Lumpur" class="block  mt-2 w-full placeholder-gray-400/70 rounded-xl border border-gray-200 bg-transparent px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" /></p>
                    <p class="flex-grow px-3 py-2 m-4 border-r-2">Type
                        <input type="text" placeholder="Apartment" class="block  mt-2 w-full placeholder-gray-400/70 rounded-xl border border-gray-200 bg-transparent px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" /></p>
                    <p class="flex-grow px-3 py-2 m-4">Price
                        <input type="text" placeholder="0 - 100.000" class="block  mt-2 w-full placeholder-gray-400/70 rounded-xl border border-gray-200 bg-transparent px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40" /></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Explore Components Section -->
    <section class="transform pt-52 h-screen flex-rows next-section animate-on-scroll opacity-0">
        <div class="absolute px-20 mx-auto z-20">
            <h1 class="text-2xl font-semibold text-white capitalize lg:text-3xl">Explore our <br> Awesome <span class="underline decoration-blue-500 text-white">Properties</span></h1>

            <p class="mt-4 text-white xl:mt-6">
                Find the perfect home for your lifestyle.
            </p>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2 xl:grid-cols-3 ">
            <!-- Property 1 -->

                <div class="p-8 space-y-3 border-2 border-blue-400 dark:border-blue-300 rounded-xl mb-8">
                    <span class="block mb-4 overflow-hidden">
                        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/351609398.jpg?k=bec99e98207530be208b96165bc56b9991beeb73768a47501798da1f702cf4ed&o=&hp=1" alt="Property Image" class="w-full h-[200px] object-cover rounded-xl">
                    </span>

                    <h1 class="text-xl font-semibold text-white capitalize">The Place @ Cyberjaya</h1>

                    <p class="text-white flex-grow">
                        Spacious and modern apartment in the heart of the city. Enjoy breathtaking views and convenient access to amenities.
                    </p>

                    <a href="#" class="mt-auto inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100">
                        View Details
                    </a>

                </div>

                <!-- Property 2 -->
                <div class="p-8 space-y-3 border-2 border-blue-400 rounded-xl mb-8">
                    <span class="block mb-4 overflow-hidden">
                        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/202976586.jpg?k=020a4263431ec8b9794b4a230a82c1ae64a95cd1e85de960a2ec37d1c44c388e&o=&hp=1" alt="Property Image" class="w-full h-[200px] object-cover rounded-xl">
                    </span>

                    <h1 class="text-xl font-semibold text-white capitalize">Tamrind Square by TSQ @ Cyberjaya </h1>

                    <p class="text-white">
                        Charming suburban house with a peaceful garden. Perfect for a family looking for a quiet and comfortable living space.
                    </p>

                    <a href="#" class="mt-auto inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100">
                        View Details
                    </a>
                </div>

                <!-- Property 3 -->
                <div class="p-8 space-y-3 border-2 border-blue-400 rounded-xl mb-8">
                    <span class="block mb-4 overflow-hidden">
                        <img src="https://cyber-hyve-soho-suites-2-pax-by-beestay-cyberjaya.hotelmix.my/data/Photos/OriginalPhoto/10816/1081610/1081610620/Hyve-Soho-Cyberjaya-By-Beestay-Management-Exterior.JPEG" alt="Property Image" class="w-full h-[200px] object-cover rounded-xl">
                    </span>

                    <h1 class="text-xl font-semibold text-white capitalize">Hyve Residence @ Cyberjaya</h1>

                    <p class="text-white">
                        Experience luxury living with this stunning beachfront villa. Enjoy private access to the beach and luxurious amenities.
                    </p>

                    <a href="#" class="mt-auto inline-flex p-2 text-blue-500 capitalize transition-colors duration-300 transform bg-blue-100 rounded-full rtl:-scale-x-100">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    </section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const propertiesSection = document.querySelector(".next-section");
        const testimoniesSection = document.querySelector(".testimony-section");

        const options = {
            threshold: 0.6, // Trigger when at least 60% of the element is visible
        };

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Content is in the viewport, show it
                    entry.target.classList.add("opacity-100", "start-animation");
                    entry.target.classList.remove("opacity-0");
                } else {
                    // Content is out of the viewport, hide it
                    entry.target.classList.remove("opacity-100");
                    entry.target.classList.add("opacity-0");
                }
            });
        }, options);

        observer.observe(propertiesSection);
        observer.observe(testimoniesSection);

        const testimonies = document.querySelectorAll('.testimony');
        testimonies.forEach(testimony => {
            observer.observe(testimony);
        });
    });

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
</script>

</body>
</html>

