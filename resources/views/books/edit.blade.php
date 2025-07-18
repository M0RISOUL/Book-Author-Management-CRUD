@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div> 

        <div class="container mx-auto p-6 max-w-3xl relative z-10">
            <!-- Title and Description -->
            <div class="mb-6 text-center text-white">
                <h1 class="text-3xl font-semibold">Edit Book</h1>
                <p class="text-lg">Make changes to the book details below.</p>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="bg-red-100 text-red-600 p-4 rounded-lg mb-6">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit Book Form with Background -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form id="editBookForm" method="POST" action="{{ route('books.update', $book->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Book Title -->
                    <div class="mb-4 relative">
                        <label for="title" class="block text-gray-700 font-medium">Book Title</label>
                        <div class="flex items-center mt-1">
                            <i class="fas fa-book text-gray-500 mr-3"></i>
                            <input type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 pl-10" id="title" name="title" value="{{ $book->title }}" required>
                        </div>
                    </div>

                    <!-- Author -->
                    <div class="mb-4 relative">
                        <label for="author_id" class="block text-gray-700 font-medium">Author</label>
                        <div class="flex items-center mt-1">
                            <i class="fas fa-user-tie text-gray-500 mr-3"></i>
                            <select name="author_id" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 pl-10" required>
                                <option value="">Select Author</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Published Date -->
                    <div class="mb-4 relative">
                        <label for="published_date" class="block text-gray-700 font-medium">Published Date</label>
                        <div class="flex items-center mt-1">
                            <i class="fas fa-calendar-day text-gray-500 mr-3"></i>
                            <input type="date" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 pl-10" id="published_date" name="published_date" value="{{ $book->published_date }}" required>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-md hover:bg-indigo-700 transition-all duration-200 flex items-center justify-center space-x-3">
                        <i class="fas fa-save"></i>
                        <span>Update Book</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-lg shadow-xl">
                <div class="modal-header bg-indigo-600 text-white">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Book updated successfully!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#editBookForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('books.update', $book->id) }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                $('#successModal').modal('show');
            },
            error: function(response) {
                alert('There was an error. Please try again.');
            }
        });
    });

    // Close modal and redirect to books index
    $('#closeModal').on('click', function() {
        window.location.href = "{{ route('books.index') }}"; 
    });
</script>
@endsection
