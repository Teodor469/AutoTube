<nav class="bg-gray-800 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/"><img src="{{ asset('images/logo.png') }}" alt="My logo" class="m-0 p-0" width="70"
                height="70"></a>

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
            @guest
                <li><a href="/register" class="text-white hover:text-gray-300">Register</a></li>
                <li><a href="/login" class="text-white hover:text-gray-300">Login</a></li>
            @endguest
            @auth
                <li><a href="#" class="text-white hover:text-gray-300">{{ Auth::user()->name }}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="text-white hover:text-gray-300">Logout</button>
                    </form>
                </li>
            @endauth
            {{-- Create a sidebar for the home,about,services,contact --}}
        </ul>
    </div>
</nav>
