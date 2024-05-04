<nav class="bg-gray-800 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/"><img src="{{ asset('images/logo.png') }}" alt="My logo" class="m-0 p-0" width="70" height="70"></a>

        <!-- Hamburger menu -->
        <div class="block lg:hidden">
            <button id="hamburger-toggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Navbar links -->
        <ul class="hidden lg:flex space-x-4">
            <li><a href="#" class="text-white hover:text-gray-300">Home</a></li>
            <li><a href="#" class="text-white hover:text-gray-300">About</a></li>
            <li><a href="#" class="text-white hover:text-gray-300">Services</a></li>
            <li><a href="#" class="text-white hover:text-gray-300">Contact</a></li>
        </ul>
    </div>
</nav>
