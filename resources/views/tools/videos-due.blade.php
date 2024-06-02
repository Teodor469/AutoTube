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
                    @if (!$video->published)
                        <div class="bg-gray-700 p-6 rounded-lg shadow-md mb-4 flex items-center relative text-white">
                            <div class="mr-6">
                                <video src="{{ asset($video->video_path) }}" type="video/mp4" class="w-80 h-48 rounded-lg"
                                    controls></video>
                            </div>
                            <div class="flex-grow">
                                <p class="mb-2">{{ $video->description }}</p>
                                <p class="text-sm text-gray-400 mb-2">{{ $video->scheduled_time }}</p>
                                <p class="text-sm text-green-400">{{ $video->published ? 'Published' : 'Unpublished' }}</p>
                            </div>
                            <div class="flex space-x-4 absolute top-4 right-4">
                                <a href="{{ route('videos.show', $video->id) }}"
                                    class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">View</a>
                                @if (auth()->id() == $video->user_id)
                                    <a href="{{ route('videos.edit', $video->id) }}"
                                        class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">Edit</a>
                                    <form method="POST" action="{{ route('videos.destroy', $video->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>

    @include('layout.footer')
@endauth

@guest()
    @include('landingPage')
@endguest
