<div class="mt-4 overflow-auto">
    <div class="bg-gray-700 p-6 rounded-lg shadow-md mb-4 flex items-center relative text-white">
        <div class="mr-4">
            <video src="{{ asset($video->video_path) }}" type="video/mp4" class="w-64 h-40 rounded-lg" controls></video>
        </div>
        <div class="flex-grow">
            <p class="mb-2">{{ $video->description }}</p>
            <p class="text-sm text-gray-400 mb-2">{{ $video->scheduled_time }}</p>
            <p class="text-sm text-green-400">{{ $video->published ? 'Published' : 'Unpublished' }}</p>
        </div>
        <div class="flex space-x-2 absolute top-4 right-4">
            <a href="{{ route('videos.show', $video->id) }}"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">View</a>
            @if (auth()->id() == $video->user_id)
                <a href="{{ route('videos.edit', $video->id) }}"
                    class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">Edit</a>
                <form method="POST" action="{{ route('videos.destroy', $video->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg">Delete</button>
                </form>
            @endif
        </div>
    </div>
</div>
