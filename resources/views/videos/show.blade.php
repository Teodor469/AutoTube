<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }} </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    @include('layout.nav')
    <!-- Uploaded Videos Section -->
    <section class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Uploaded Videos</h2>
        {{-- I wouldn't like for this section to show if it's empty --}}
        <div class="mt-4 overflow-auto max-h-80">
            @include('shared.success-message')
            <div class="bg-gray-600 p-4 rounded-lg shadow-md mb-4">
                <div class="bg-gray-100 p-4 rounded-lg shadow-md mb-4 flex items-center relative">
                    <div>
                        <form method="POST" action="{{ route('videos.destroy', $video->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('videos.show', $video->id) }}"
                                class="absolute top-2 right-10 text-blue-500">View</a>
                            <a href="{{ route('videos.edit', $video->id) }}"
                                class="absolute top-2 right-10 mr-10 text-blue-500">Edit</a>
                            <button
                                class="absolute top-0 right-0 px-2 py-1 mt-1 mr-1 bg-red-500 text-white rounded">X</button>
                        </form>
                    </div>
                    <div class="mr-4">
                        <video src="{{ asset($video->video_path) }}" type="video/mp4" width="320" height="240"
                            controls></video>
                    </div>
                    <div>
                        @if ($editing ?? false)
                            <form action="{{ route('videos.update', $video->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="mb-4">
                                    <label for="description" class="block mb-2 ml-2 text-lg">Description:</label>
                                    <textarea id="description" name="description" rows="4" required
                                        class="border border-gray-300 p-2 w-96 ml-2 rounded"></textarea>
                                    @error('description')
                                        <span class="mr-2 text-xs text-red-500 block ml-2"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="">
                                    <button type="submit" class="mb-2 btn btn-dark btn-sm">Update</button>
                                </div>
                            </form>
                        @else
                            <p>{{ $video->description }}</p>
                            <p>{{ $video->created_at }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>

</body>

</html>
