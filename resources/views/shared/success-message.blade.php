@if (session()->has('success'))
    <div class="bg-green-500 text-white font-bold px-4 py-2 rounded-md shadow-md" role="alert">
        {{ session('success') }}
        <button type="button" class="top-0 right-0 px-3 py-1 text-white" data-dismiss="alert" aria-label="Close">X</button>
    </div>
@endif
