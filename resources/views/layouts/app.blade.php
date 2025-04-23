<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System</title>

    <!-- Tailwind CSS (or custom styles) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @stack('styles') <!-- Allows you to inject page-specific styles -->
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navigation Bar -->
    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">🏨 Hotel Manager</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 font-medium mx-2">Dashboard</a>
                <a href="{{ route('rooms.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium mx-2">Rooms</a>
                <a href="{{ route('bookings.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium mx-2">Bookings</a>
                <a href="{{ route('payments.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium mx-2">Payments</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content') <!-- This is where the page-specific content will be inserted -->
    </main>

    <!-- Footer -->
    <footer class="text-center text-sm text-gray-500 mt-10 py-6">
        &copy; {{ date('Y') }} Hotel Management System. All rights reserved.
    </footer>

    @stack('scripts') <!-- Allows you to inject page-specific scripts -->
</body>

</html>
