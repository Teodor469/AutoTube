@include('layout.head')

<body class="bg-gray-900 text-gray-200">
    <!-- Video Display Section -->
    <section class="container mx-auto mt-8 px-4">
        <h2 class="text-3xl font-semibold mb-6">Uploaded Video</h2>
        @if ($video)
            <div class="bg-gray-800 p-6 rounded-lg shadow-md flex flex-col items-center">
                <div class="relative w-full max-w-2xl">
                    <video src="{{ asset($video->video_path) }}" type="video/mp4" class="w-full max-w-2xl h-auto mb-4" controls></video>
                    @if ($video->thumbnail)
                        <img src="{{ asset($video->thumbnail) }}" alt="Thumbnail" class="w-full max-w-2xl h-40 object-cover rounded-lg absolute top-0">
                    @endif
                </div>
                <div class="w-full max-w-2xl">
                    @if ($editing ?? false)
                        <form action="{{ route('videos.update', $video->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-4">
                                <label for="description" class="block mb-2 text-lg">Description:</label>
                                <textarea id="description" name="description" rows="4" required placeholder="Edit Description..."
                                    class="border border-gray-300 p-2 w-full rounded bg-gray-700"></textarea>
                                @error('description')
                                    <span class="text-xs text-red-500 block"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg">Update</button>
                            </div>
                        </form>
                    @else
                        <p class="mb-2 text-white">{{ $video->description }}</p>
                        <p class="text-sm text-gray-400 mb-2">{{ $video->created_at->format('F j, Y, g:i a') }}</p>
                    @endif
                    <div class="mt-4 flex justify-end space-x-2">
                        <a href="{{ route('videos.edit', $video->id) }}"
                            class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">Edit</a>
                        <form method="POST" action="{{ route('videos.destroy', $video->id) }}"
                            onsubmit="return confirm('Are you sure you want to delete this video?');">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <p class="text-xl text-center mt-16">No video uploaded yet.</p>
        @endif
    </section>

    @include('layout.footer')
</body>
