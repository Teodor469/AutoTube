@include('layout.head')

<body>
    @include('layout.nav')
    <div class="container mx-auto">
        @include('shared.success-message')
        <!-- Upload Video Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold mb-4 ml-2">Upload Video</h2>
            <!-- Upload Form -->
            @include('shared.submit-video')
        </section>

        <!-- Videos Due for Upload Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Videos Due for Upload</h2>
            <!-- Placeholder for Videos Due for Upload -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                {{-- I wouldn't like for this section to show if it's empty --}}
                <div class="mt-4 overflow-auto max-h-80">
                    <div class="mt-4 overflow-auto">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-4">
                            @foreach ($videos as $video)
                                @if (!$video->published)
                                    @include('shared.video-card')
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- the pagination links with both sections and looks weird must fix it --}}
        </section>
        <div class="text-white flex space-x-2 mt-2">
            {{ $videos->appends(['publishedVideos' => $publishedVideos->currentPage()])->links() }}
        </div>

        <!-- Uploaded Videos Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Uploaded Videos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <div class="mt-4 overflow-auto max-h-80">
                    @foreach ($publishedVideos as $publishedVideo)
                        @if ($publishedVideo->published)
                            <div class="mt-4 overflow-auto">
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-4 flex items-center relative">
                                    <div>
                                        <form method="POST"
                                            action="{{ route('videos.destroy', $publishedVideo->id) }}">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('videos.show', $publishedVideo->id) }}"
                                                class="absolute top-2 right-10 text-blue-500">View</a>
                                            <a href="{{ route('videos.edit', $publishedVideo->id) }}"
                                                class="absolute top-2 right-10 mr-10 text-blue-500">Edit</a>
                                            <button
                                                class="absolute top-0 right-0 px-2 py-1 mt-1 mr-1 bg-red-500 text-white rounded">X</button>
                                        </form>
                                    </div>
                                    <div class="mr-4">
                                        <video src="{{ asset($publishedVideo->video_path) }}" type="video/mp4"
                                            width="320" height="240" controls></video>
                                    </div>
                                    <div>
                                        <p>{{ $publishedVideo->description }}</p>
                                        <p>{{ $publishedVideo->scheduled_time }}</p>
                                        <p>{{ $publishedVideo->published }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="text-white flex space-x-2 mt-2">
                {{ $publishedVideos->appends(['videos' => $videos->currentPage()])->links() }}
            </div>
        </section>
    </div>

    @include('layout.footer')
