<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-md shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Register Admin</h2>

        @if ($errors->any())
            <div class="bg-red-400 text-white p-2 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium mb-1">Name:</label>
                <input type="text" name="name" required class="w-full border border-gray-300 rounded-md p-2" placeholder="Your Name">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium mb-1">Email:</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded-md p-2" placeholder="Your Email">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium mb-1">Password:</label>
                <input type="password" name="password" required class="w-full border border-gray-300 rounded-md p-2" placeholder="Password">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirm Password:</label>
                <input type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded-md p-2" placeholder="Confirm Password">
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium mb-1">Role:</label>
                <select name="role" required class="w-full border border-gray-300 rounded-md p-2">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="customer">Customer</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Register</button>
        </form>

        <div class="mt-4 text-center">
            <span>Already have an account? <a href="{{ route('admin.login') }}" class="text-indigo-600 hover:underline">Login here</a></span>
        </div>
    </div>

</body>
</html>  
