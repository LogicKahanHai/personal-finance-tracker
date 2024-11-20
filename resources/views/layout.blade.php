<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-blue-500 text-white p-4 shadow">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold">Finance Tracker</a>
            <div class="flex space-x-4">
                <a href="{{ route('categories.index') }}" class="hover:bg-blue-600 py-2 px-4 rounded">Categories</a>
                <a href="{{ route('transactions.index') }}" class="hover:bg-blue-600 py-2 px-4 rounded">Transactions</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="p-8">
        @yield('content')
    </div>

</body>

</html>
