@auth
    <form action=" {{ route('videos.store') }} " method="post" enctype="multipart/form-data">
        @csrf
        <!-- Video Upload Input -->
        <div class="mb-4">
            <label for="video_path"
                class="relative cursor-pointer bg-gray-800 text-white hover:text-gray-300 border border-gray-300 rounded-md p-2 ml-2 inline-flex items-center">
                <span class="mr-2">Choose Video</span>
                <input type="file" id="video_path" name="video_path" accept="video/*" required
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
            </label>
        </div>
        <!-- Description Input -->
        <div class="mb-4">
            <label for="description" class="block mb-2 ml-2 text-lg">Description:</label>
            <textarea id="description" name="description" rows="4" required
                class="border border-gray-300 p-2 w-4/12 ml-2 rounded"></textarea>
            @error('description')
                <span class="mr-2 text-xs text-red-500 block ml-2"> {{ $message }} </span>
            @enderror
        </div>
        <!-- Scheduled Time Input -->
        <div class="mb-4">
            <label for="scheduled_time" class="block mb-2 ml-2 text-lg">Scheduled Time:</label>
            <input type="datetime-local" id="scheduled_time" name="scheduled_time"
                class="border border-gray-300 p-2 w-4/12 ml-2 rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 ml-2 rounded hover:bg-blue-600">Upload</button>
    </form>
@endauth
@guest
<h2 class="text-2xl font-semibold mb-4 ml-2">Upload Video</h2>
@endguest
