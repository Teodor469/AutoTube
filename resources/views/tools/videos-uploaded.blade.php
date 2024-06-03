@auth

    @include('layout.head')
    @include('layout.sidebar')

    <div class="flex-grow ml-64 p-8 bg-gray-900 text-white min-h-screen flex justify-center items-center">
        <section class="w-full max-w-5xl bg-gray-800 p-10 rounded-lg shadow-lg">
            <h2 class="text-4xl font-semibold mb-8 text-center">Videos Due for Upload</h2>

            <!-- Search Bar -->
            <div class="mb-8">
                <input type="text" id="search" placeholder="Search videos..."
                    class="w-full p-4 rounded bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Videos Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 overflow-auto max-h-96">
                @foreach ($videos as $video)
                    @if ($video->published)
                        @include('shared.video-card')
                    @endif
                @endforeach
            </div>
            <div class="text-white flex justify-center space-x-2 mt-2">
                {{ $videos->links() }}
            </div>
        </section>
    </div>

    @include('layout.footer')
@endauth

@guest()
    @include('landingPage')
@endguest
