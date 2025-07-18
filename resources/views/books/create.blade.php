@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-image" style="background-image: url('{{ asset('images/create.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <div class="container my-2 pt-2">
        <!-- Title and Description -->
            <div class="mb-6 text-center text-black">
                <h1 class="text-3xl font-semibold">Create Book</h1>
                <p class="text-lg">Fill in the form below to add a new book to the library collection. <br> sure all fields are filled out correctly before submitting.</p>
            </div>    

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Create Book Form -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="card shadow-lg border-0 rounded-3" style="background-color: rgba(255, 255, 255, 0.8);">
                        <div class="card-body p-5">
                            <form id="addBookForm">
                                @csrf
                                <!-- Book Title Field with Icon -->
                                <div class="mb-4">
                                    <label for="title" class="form-label">Book Title</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                                        <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Enter book title" required>
                                    </div>
                                </div>

                                <!-- Author Field with Icon -->
                                <div class="mb-4">
                                    <label for="author_id" class="form-label">Author</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <select name="author_id" class="form-select form-select-lg" required>
                                            <option value="">Select Author</option>
                                            @foreach($authors as $author)
                                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Published Date Field with Icon -->
                                <div class="mb-4">
                                    <label for="published_date" class="form-label">Published Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" class="form-control form-control-lg" id="published_date" name="published_date" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success w-100 py-3 mt-3">
                                    <i class="fas fa-plus-circle"></i> Create Book
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Modal -->
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Book added successfully!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#addBookForm').on('submit', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('books.store') }}", 
                method: "POST",
                data: formData,
                success: function (response) {
                    if (response.success) {
                        $('#successModal').modal('show');
                    }
                },
                error: function () {
                    alert('Error adding book.');
                }
            });
        });

        // Close modal and redirect to books index
        $('#closeModal').on('click', function() {
            window.location.href = "{{ route('books.index') }}";
        });
    </script>
@endsection
