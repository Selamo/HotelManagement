<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f3f4f6; /* Light-gray background */
        }
    </style>
</head>
<body>

    <div class="max-w-md mx-auto mt-20 bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-bold text-center mb-6">Admin Login</h1>

        @if (session('error'))
            <div class="bg-red-400 text-white p-2 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium mb-1">Email:</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded-md p-2" placeholder="Your Email">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium mb-1">Password:</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-md p-2" placeholder="Your Password">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Login</button>
        </form>

        <div class="mt-4 text-center">
            <span>Don't have an account? <a href="{{ route('admin.register') }}" class="text-indigo-600 hover:underline">Register here</a></span>
        </div>
    </div>

</body>
</html>  
