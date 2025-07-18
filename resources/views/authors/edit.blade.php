@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/author edit.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div> 

        <div class="container mx-auto p-6 max-w-3xl relative z-10">
            <!-- Title and Description -->
            <div class="mb-6 text-center text-white">
                <h1 class="text-3xl font-semibold">Edit Author</h1>
                <p class="text-lg">Make changes to the author details below.</p>
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

            <!-- Edit Author Form with Background -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form id="editAuthorForm" method="POST" action="{{ route('authors.update', $author->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Author Name -->
                    <div class="mb-4 relative">
                        <label for="name" class="block text-gray-700 font-medium">Author Name</label>
                        <div class="flex items-center mt-1">
                            <i class="fas fa-user-tie text-gray-500 mr-3"></i>
                            <input type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 pl-10" id="name" name="name" value="{{ $author->name }}" required>
                        </div>
                    </div>

                    <!-- Author Birth Date -->
                    <div class="mb-4 relative">
                        <label for="birth_date" class="block text-gray-700 font-medium">Birth Date</label>
                        <div class="flex items-center mt-1">
                            <i class="fas fa-calendar-day text-gray-500 mr-3"></i>
                            <input type="date" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 pl-10" id="birth_date" name="birth_date" value="{{ $author->birth_date }}" required>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-md hover:bg-indigo-700 transition-all duration-200 flex items-center justify-center space-x-3">
                        <i class="fas fa-save"></i>
                        <span>Update Author</span>
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
                    Author updated successfully!
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
    $('#editAuthorForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('authors.update', $author->id) }}",
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

    // Close modal and redirect to authors index
    $('#closeModal').on('click', function() {
        window.location.href = "{{ route('authors.index') }}"; 
    });
</script>
@endsection
