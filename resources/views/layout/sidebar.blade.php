@include('layout.head')
<div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white flex flex-col">
    <div class="flex-grow">
        <div class="px-4 py-6">
            <h2 class="text-2xl font-semibold">Menu</h2>
        </div>
        <nav class="px-4 mt-6">
            <a href=" {{ route('dashboard') }} "
                class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-gray-700 rounded hover:bg-gray-600">Dashboard</a>
            <a href=" {{ route('videos.due') }} "
                class="block px-4 py-2 mt-2 text-sm font-semibold text-white rounded hover:bg-gray-600">Videos Due To
                Upload</a>
            <a href="#"
                class="block px-4 py-2 mt-2 text-sm font-semibold text-white rounded hover:bg-gray-600">Uploaded
                Videos</a>
            <a href=" {{ route('videos.upload') }} "
                class="block px-4 py-2 mt-2 text-sm font-semibold text-white rounded hover:bg-gray-600">Calendar/Scheduler</a>
        </nav>
    </div>
</div>
@include('layout.footer')
