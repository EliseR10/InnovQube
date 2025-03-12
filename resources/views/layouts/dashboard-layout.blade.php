<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include your custom CSS or use default Breeze CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    @include('layouts.navigation')  <!-- Include the navigation bar from Breeze -->

    <!-- Second white section with dashboard title -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @yield('header') <!-- This is where the dynamic title for the dashboard comes in -->
        </div>
    </header>

    <main>
        @yield('content') <!-- Content section for the page content -->
    </main>
</body>
</html>
