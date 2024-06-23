<div class="react-navbar"
     data-authenticated="{{ auth()->check() ? 'true' : 'false' }}"
     data-username="{{ auth()->check() ? auth()->user()->name : '' }}">
</div>
