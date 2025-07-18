<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library</title>

    <!-- Logo -->
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Modal Style -->
    <style>
        .modal-dialog {
            max-width: 400px;
            margin: auto;
            position: center;
            top: 40%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Top Navbar -->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">

            <a href="/" class="flex items-center space-x-2 text-white text-xl font-semibold">
                <img src="{{ asset('images/book.jpg') }}" alt="Logo" class="h-6 w-6">
                <span>Book Library</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('authors.index') }}" class="text-white flex items-center hover:bg-gray-700 p-2 rounded">
                    <i class="fas fa-user-tie mr-2"></i> Authors
                </a>
                <a href="{{ route('books.index') }}" class="text-white flex items-center hover:bg-gray-700 p-2 rounded">
                    <i class="fas fa-book mr-2"></i> Books
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-gray-800 text-white p-4 space-y-4 hidden">
        <a href="{{ route('authors.index') }}" class="block hover:bg-gray-700 p-2 rounded">
            <i class="fas fa-user-tie mr-2"></i> Authors
        </a>
        <a href="{{ route('books.index') }}" class="block hover:bg-gray-700 p-2 rounded">
            <i class="fas fa-book mr-2"></i> Books
        </a>
    </div>

    <!-- Main Page Content -->
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    @yield('scripts')

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>
