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
    <div class="container mx-auto">
        @include('shared.success-message')
        <!-- Upload Video Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold mb-4 ml-2">Upload Video</h2>
            <!-- Upload Form -->
            @include('shared.submit-video')
        </section>

        <!-- Videos Due for Upload Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Videos Due for Upload</h2>
            <!-- Placeholder for Videos Due for Upload -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Sample Video Card -->
                <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-2">Sample Video Title</h3>
                    <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae
                        elit libero, a pharetra augue.</p>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Upload Now</button>
                </div>
                <!-- Repeat this for each video -->
            </div>
        </section>

        <!-- Uploaded Videos Section -->
        <section class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Uploaded Videos</h2>
            {{-- I wouldn't like for this section to show if it's empty --}}
            <div class="mt-4 overflow-auto max-h-80">
                @include('shared.video-card')
            </div>
        </section>
    </div>

@include('layout.footer')
