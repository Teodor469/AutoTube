@include('layout.head')


<body class="bg-gray-100">
    @include('layout.nav')
    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Registration Form</h2>
        <form action="{{ route('register.form') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="full_name" class="block text-gray-700 font-medium mb-2">Full Name:</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 rounded-md border
                border-gray-300 focus:border-blue-500 focus:outline-none"
                    required>
                @error('name')
                    <span class="top-0 right-0 px-3 py-1 text-white"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address:</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 rounded-md border
                border-gray-300 focus:border-blue-500 focus:outline-none"
                    required>
                @error('email')
                    <span class="top-0 right-0 px-3 py-1 text-white"> {{ $message }} </span>
                @enderror
            </div>
            <!-- Other fields can be added similarly -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 rounded-md border
                border-gray-300 focus:border-blue-500 focus:outline-none"
                    required>
                @error('password')
                    <span class="top-0 right-0 px-3 py-1 text-white"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="confirm-password" class="block text-gray-700 font-medium mb-2">Repeat password:</label>
                <input type="password" id="confirm-password" name="password_confirmation"
                    class="w-full px-4 py-2 rounded-md border
                border-gray-300 focus:border-blue-500 focus:outline-none"
                    required>
                @error('confirm-password')
                    <span class="top-0 right-0 px-3 py-1 text-white"> {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-4">
                <input type="checkbox" id="agree_terms" name="agree_terms" class="mr-2">
                <label for="agree_terms" class="text-gray-700">I have read and agree to the Terms and Conditions</label>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
        </form>
    </div>
</body>
@include('layout.footer')
