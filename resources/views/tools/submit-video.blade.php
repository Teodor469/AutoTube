@auth()
    @include('layout.head')
    @include('layout.sidebar')

    <div class="flex-grow ml-64 p-8 bg-gray-900 text-white min-h-screen">
        <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-lg shadow-lg w-full flex flex-wrap">
            @csrf
            <div class="w-full md:w-1/2 p-4">
                <h2 class="text-3xl font-semibold mb-4 text-center">Upload Video</h2>
                <!-- Video Upload Input -->
                <div class="mb-6">
                    <label for="video_path" class="relative cursor-pointer bg-blue-600 text-white hover:bg-blue-700 border border-blue-600 rounded-md py-2 px-4 inline-flex items-center justify-center w-full">
                        <span class="mr-2">Choose Video</span>
                        <input type="file" id="video_path" name="video_path" accept="video/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </label>
                </div>
                <!-- Thumbnail Upload Input -->
                <div class="mb-6">
                    <label for="thumbnail_path" class="relative cursor-pointer bg-blue-600 text-white hover:bg-blue-700 border border-blue-600 rounded-md py-2 px-4 inline-flex items-center justify-center w-full">
                        <span class="mr-2">Choose Thumbnail</span>
                        <input type="file" id="thumbnail_path" name="thumbnail_path" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </label>
                </div>
                <!-- Description Input -->
                <div class="mb-6">
                    <label for="description" class="block text-lg mb-2">Description:</label>
                    <textarea id="description" name="description" rows="4" required class="border border-gray-600 bg-gray-700 p-3 w-full rounded placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    @error('description')
                        <span class="text-xs text-red-500 mt-2 block">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Scheduled Time Input -->
                <div class="mb-6">
                    <label for="scheduled_time" class="block text-lg mb-2">Scheduled Time:</label>
                    <input type="datetime-local" id="scheduled_time" name="scheduled_time" class="border border-gray-600 bg-gray-700 p-3 w-full rounded placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 mt-2 rounded hover:bg-blue-600">Upload</button>
            </div>

            <!-- Preview Section -->
            <div class="w-full md:w-1/2 p-4">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-semibold mb-4 text-center">Video Preview</h2>
                    <div class="mb-6">
                        <label class="block text-lg mb-2">Thumbnail Preview:</label>
                        <div id="thumbnailPreview" class="w-full h-48 bg-gray-700 rounded flex items-center justify-center text-gray-400">
                            No Thumbnail Uploaded
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-lg mb-2">Description Preview:</label>
                        <div id="descriptionPreview" class="bg-gray-700 p-3 rounded text-gray-400">
                            No Description Provided
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('layout.footer')
@endauth

@guest()
    @include('landingPage')
@endguest


{{-- @auth()
    @include('layout.head')


    @include('layout.sidebar')
    <div class= 'flex-grow ml-64'>
        <form action=" {{ route('videos.store') }} " method="post" enctype="multipart/form-data">
            @csrf
            <!-- Video Upload Input -->
            <div class="mt-4">
                <label for="video_path"
                    class="relative cursor-pointer bg-gray-800 text-white hover:text-gray-300 border border-gray-300 rounded-md p-2 ml-2 inline-flex items-center">
                    <span class="mr-2">Choose Video</span>
                    <input type="file" id="video_path" name="video_path" accept="video/*" required
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                </label>
            </div>
            <!-- Description Input -->
            <div class="mt-4">
                <label for="description" class="block mt-2 ml-2 text-lg">Description:</label>
                <textarea id="description" name="description" rows="4" required
                    class="border border-gray-300 p-2 w-4/12 ml-2 mt-2 rounded"></textarea>
                @error('description')
                    <span class="mr-2 text-xs text-red-500 block ml-2 mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <!-- Scheduled Time Input -->
            <div class="mt-4">
                <label for="scheduled_time" class="block mt-2 ml-2 text-lg">Scheduled Time:</label>
                <input type="datetime-local" id="scheduled_time" name="scheduled_time"
                    class="border border-gray-300 p-2 w-4/12 ml-2 rounded">
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 ml-2 mt-2 rounded hover:bg-blue-600">Upload</button>
        </form>
    </div>

    @include('layout.footer')
@endauth
@guest()
    <h2 class="text-2xl font-semibold mb-4 ml-2">Login To Upload Video</h2>
@endguest --}}
