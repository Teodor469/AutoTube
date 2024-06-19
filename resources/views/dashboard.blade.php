@auth
    @include('layout.head')


    @include('layout.sidebar')

    <div class="flex-grow ml-64">
        @include('layout.nav')
        <div class="container mx-auto p-4">
            @include('shared.success-message')
        </div>
    </div>
    <div>
        @include('tools.youtube-dashboard')
    </div>
    @include('layout.footer')
    @endauth

    @guest
        @include('landing-page')
    @endguest
