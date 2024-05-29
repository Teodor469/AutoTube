<div class="mt-4 overflow-auto">
    <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-4 flex items-center relative">
        <div>
            <form method="POST" action="{{ route('videos.destroy', $video->id) }}">
                @csrf
                @method('delete')
                <a href="{{ route('videos.show', $video->id) }}" class="absolute top-2 right-10 text-blue-500">View</a>
                @if (auth()->id() == $video->user_id)
                    <a href="{{ route('videos.edit', $video->id) }}"
                        class="absolute top-2 right-10 mr-10 text-blue-500">Edit</a>
                    <button class="absolute top-0 right-0 px-2 py-1 mt-1 mr-1 bg-red-500 text-white rounded">X</button>
                @endif
            </form>
        </div>
        <div class="mr-4">
            <video src="{{ asset($video->video_path) }}" type="video/mp4" width="320" height="240"
                controls></video>
        </div>
        <div>
            <p>{{ $video->description }}</p>
            <p>{{ $video->scheduled_time }}</p>
            <p>{{ $video->published }}</p>
        </div>
    </div>
</div>
