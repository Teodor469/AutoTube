@include('layout.head')

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto text-center py-10">
        <div class="text-6xl text-red-600 font-bold mb-6">
            AutoTube
        </div>
        <div class="text-2xl mb-10">
            Automate Your YouTube Experience with Ease
        </div>

        <div class="flex flex-wrap justify-center mb-10">
            <div class="w-full md:w-1/3 lg:w-1/4 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/feature1.png') }}" alt="Feature 1" class="w-24 h-24 mx-auto">
                    <p class="mt-4 text-xl">Automated Video Uploads</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/4 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/feature2.png') }}" alt="Feature 2" class="w-24 h-24 mx-auto">
                    <p class="mt-4 text-xl">Comment Moderation</p>
                </div>
            </div>
            <div class="w-full md:w-1/3 lg:w-1/4 p-4">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="{{ asset('images/feature3.png') }}" alt="Feature 3" class="w-24 h-24 mx-auto">
                    <p class="mt-4 text-xl">Analytics and Insights</p>
                </div>
            </div>
        </div>

        <a href="{{ route('register.form') }}"
            class="bg-red-600 text-white py-3 px-6 rounded-lg text-xl transition duration-300 hover:bg-red-700">
            Get Started
        </a>
    </div>

@include('layout.footer')
