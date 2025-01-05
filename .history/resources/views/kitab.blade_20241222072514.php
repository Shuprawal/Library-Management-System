@extends('layouts.try')

@section('hom-body')
<div class="container">
    <h2>Add New Book</h2>
    <form  method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <!-- Publisher Dropdown -->
        <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <div class="input-group">
                <select name="publisher_id" id="publisher" class="form-select" required>
                    <option value="" selected>Select Publisher</option>
                   {{--
                   @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach
                   
                   --}} 
                </select>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addPublisherModal">Add New</button>
            </div>
        </div>

        <!-- Author Multi-select -->
        <div class="mb-3">
            <label for="authors" class="form-label">Authors</label>
            <div class="input-group">
                <select name="authors[]" id="authors" class="form-select" multiple required>
                   {{----}} @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addAuthorModal">Add New</button>
            </div>
        </div>

        <!-- Other Fields -->
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="isbn" required>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" id="genre" required>
        </div>

        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <input type="checkbox" name="availability" id="availability">
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>

<!-- Add Publisher Modal -->
<div class="modal fade" id="addPublisherModal" tabindex="-1" aria-labelledby="addPublisherModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="addPublisherForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPublisherModalLabel">Add New Publisher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="publisherName" class="form-label">Publisher Name</label>
                        <input type="text" id="publisherName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisherAddress" class="form-label">Publisher Address</label>
                        <input type="text" id="publisherAddress" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Publisher</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add Author Modal -->
<div class="modal fade" id="addAuthorModal" tabindex="-1" aria-labelledby="addAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="addAuthorForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAuthorModalLabel">Add New Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="authorName" class="form-label">Author Name</label>
                        <input type="text" id="authorName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="authorBio" class="form-label">Biography</label>
                        <textarea id="authorBio" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Author</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
