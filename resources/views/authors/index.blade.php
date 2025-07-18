@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Add Author Button with Icon -->
        <a href="{{ route('authors.create') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-md shadow-md hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 mb-6 inline-block">
            <i class="fas fa-plus-circle"></i> Add Author
        </a>
        
        <!-- Author Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full table-auto text-sm text-gray-600">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Birth Date</th>
                        <th class="px-6 py-3 text-left font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                        <tr class="border-b hover:bg-gray-50 transition-all duration-300">
                            <td class="px-6 py-4">{{ $author->name }}</td>
                            <td class="px-6 py-4">{{ $author->birth_date }}</td>
                            <td class="px-6 py-4 flex space-x-3">
                                <!-- Edit Button with Icon -->
                                <a href="{{ route('authors.edit', $author->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-600 transition-all duration-200">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <!-- Trigger delete modal with Icon -->
                                <button class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition-all duration-200" data-bs-toggle="modal" data-bs-target="#deleteModal" data-author-id="{{ $author->id }}" data-author-name="{{ $author->name }}">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-lg shadow-xl">
                <div class="modal-header bg-indigo-600 text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong id="authorName"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-all duration-200">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var authorId = button.data('author-id');
        var authorName = button.data('author-name');
        
        // Update the modal's content
        var modal = $(this);
        modal.find('#authorName').text(authorName);
        modal.find('#deleteForm').attr('action', '/authors/' + authorId);
    });
</script>
@endsection
