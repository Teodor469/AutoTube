@if (session()->has('success'))
    <div id="success-message" data-message="{{ session('success') }}"></div>
@endif
