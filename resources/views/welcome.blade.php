<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Literary World</title>
    <!-- Logo -->
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

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
            <a href="#" class="text-white text-xl font-semibold">Book Library</a>

            <!-- Desktop Nav -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('authors.index') }}" class="text-white flex items-center hover:bg-gray-700 p-2 rounded">
                    <i class="fas fa-user-tie mr-2"></i> Authors
                </a>
                <a href="{{ route('books.index') }}" class="text-white flex items-center hover:bg-gray-700 p-2 rounded">
                    <i class="fas fa-book mr-2"></i> Books
                </a>
            </div>

            <!-- Mobile Nav Toggle -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="md:hidden bg-gray-800 text-white p-4 space-y-4 hidden">
        <a href="{{ route('authors.index') }}" class="block hover:bg-gray-700 p-2 rounded">
            <i class="fas fa-user-tie mr-2"></i> Authors
        </a>
        <a href="{{ route('books.index') }}" class="block hover:bg-gray-700 p-2 rounded">
            <i class="fas fa-book mr-2"></i> Books
        </a>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto p-8 mt-6 bg-white rounded-lg shadow-lg">

        <!-- Welcome Title -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Welcome to Our Literary World</h1>

        <!-- Main Intro -->
        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                Discover a world of creativity and knowledge through the works of diverse authors and their captivating books.
            </h2>
            <p class="text-gray-600">
                Our platform showcases an extensive collection of books, ranging from classic literature to modern masterpieces. Whether you're an avid reader, a casual book lover, or someone just exploring new genres, you're in the right place.
            </p>
        </section>

        <!-- How It Works -->
        <section class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">How It Works</h2>
            <ul class="list-disc pl-5 text-gray-600">
                <li><strong>Browse Through Our Collection</strong> – Explore a wide variety of books by different authors. We have genres for every taste: fiction, non-fiction, self-help, history, and much more.</li>
                <li><strong>Learn About Authors</strong> – Get to know the writers behind the books. Discover their stories, achievements, and the inspiration behind their works.</li>
                <li><strong>Book Details</strong> – Each book listed comes with detailed descriptions, including its synopsis, reviews, and publication information.</li>
            </ul>
        </section>

        <!-- Featured Authors & Books -->
        <section class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Featured Authors & Books</h2>
            <ul class="list-none pl-0 text-gray-600">
                <li><strong>Number of Authors:</strong> {{ $authorCount }}</li>
                <li><strong>Number of Books:</strong> {{ $bookCount }}</li>
            </ul>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-3 text-center mt-8">
        <p>&copy; 2025 Morisoul | All Rights Reserved</p>
    </footer>

    <!-- JS for Mobile Menu -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
