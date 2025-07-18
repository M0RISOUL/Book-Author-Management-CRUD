@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-image" style="background-image: url('{{ asset('images/author.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
        <div class="container my-2 pt-2">
        <!-- Title and Description -->
            <div class="mb-6 text-center text-black">
                <h1 class="text-3xl font-semibold">Add New Author</h1>
                <p class="text-lg">Fill in the form below to add a new author to the library collection. <br> Please make sure all fields are filled out correctly before submitting.</p>
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

            <!-- Create Author Form -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="card shadow-lg border-0 rounded-3" style="background-color: rgba(255, 255, 255, 0.8);">
                        <div class="card-body p-5">
                            <form id="addAuthorForm">
                                @csrf

                                <!-- Author Name Field with Icon -->
                                <div class="mb-4">
                                    <label for="name" class="form-label">Author Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter author's name" required>
                                    </div>
                                </div>

                                <!-- Author Birth Date Field with Icon -->
                                <div class="mb-4">
                                    <label for="birth_date" class="form-label">Birth Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" class="form-control form-control-lg" id="birth_date" name="birth_date" required>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success w-100 py-3 mt-3">
                                    <i class="fas fa-plus-circle"></i> Create Author
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
                            Author added successfully!
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
        // Handle form submission with AJAX
        $('#addAuthorForm').on('submit', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('authors.store') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    if (response.success) {
                        // Show the success modal
                        $('#successModal').modal('show');
                    }
                },
                error: function () {
                    alert('Error adding author.');
                }
            });
        });

        // Close the modal and redirect to authors table
        $('#closeModal').on('click', function() {
            window.location.href = "{{ route('authors.index') }}";  
        });
    </script>
@endsection
