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
            <h2 class="text-2xl font-semibold mb-4">Videos Due for Upload1</h2>
            <!-- Placeholder for Videos Due for Upload -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                {{-- I wouldn't like for this section to show if it's empty --}}
                <div class="mt-4 overflow-auto max-h-80">
                    <div class="mt-4 overflow-auto">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-4">
                            @foreach ($videos as $video)
                                @if (!$video->published)
                                    @include('shared.video-card', ['video' => $video])
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- the pagination links with both sections and looks weird must fix it --}}
        </section>
        <div class="text-white flex space-x-2 mt-2">
            {{ $videos->appends(['posted' => $publishedVideos->currentPage()])->links() }}
        </div>

        <!-- Uploaded Videos Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Uploaded Videos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                <div class="mt-4 overflow-auto max-h-80">
                    @foreach ($publishedVideos as $publishedVideo)
                        @if ($publishedVideo->published)
                            @include('shared.video-card', ['video' => $publishedVideo])
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="text-white flex space-x-2 mt-2">
                {{ $publishedVideos->appends(['due' => $videos->currentPage()])->links() }}
            </div>
        </section>
    </div>

    @include('layout.footer')
