@extends('layouts.try')

@section('hom-body')
<div class="container">
    <h2>Add New Book</h2>
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="isbn" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Image</label>
            <div class="input-group mb-3">

                <label class="input-group-text" for="inputGroupFile01">Upload Image</label>
                <input type="file" class="form-control" id="inputGroupFile01" accept="image/*">
            </div>
        </div>


        <div class="mb-3">
            <label for="genreInput" class="form-label">Genre</label>
            <div class="input-group">
                <input type="text" id="genreInput" class="form-control" placeholder="Select genres" readonly>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#addGenreModal">Add New</button>
                <ul id="genreDropdown" class="dropdown-menu" style="width: 100%; display: none;">
                    @foreach ($genres as $genre)
                        <li><label><input type="checkbox" value="{{ $genre->name }}"> {{ $genre->name }}</label></li>
                    @endforeach
                </ul>
            </div>
        </div>


        <!-- Publisher Dropdown -->
        <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <div class="input-group">
                <select name="publisher_id" id="publisher" class="form-select" required>
                    <option value="" selected>Select Publisher</option>
                    {{-- @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                    @endforeach--}}

                </select>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#addPublisherModal">Add New</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="authorsInput" class="form-label">Authors</label>
            <div class="input-group">
                <input type="text" id="authorsInput" class="form-control" placeholder="Select authors" readonly>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#addAuthorModal">Add New</button>
            </div>
            <ul id="authorsDropdown" class="dropdown-menu" style="width: 100%; display: none; margin-top: -1px;">
            <li><label><input type="checkbox" value="aa"> aa</label></li>
            <li><label><input type="checkbox" value="bbaa">bbaa</label></li>
                {{--@foreach ($authors as $author)
                <li>
                    <label>
                        <input type="checkbox" value="{{ $author->name }}"> {{ $author->name }}
                    </label>
                </li>
                @endforeach--}}
            </ul>
        </div>



        <div class="mb-3">
            <label for="authorsInput" class="form-label">Authors</label>
            <div class="dropdown">
                <input type="text" id="authorsInput" class="form-control" placeholder="Select authors" readonly>
                <ul id="authorsDropdown" class="dropdown-menu" style="width: 100%; display: none;">
                  {{--@foreach ($authors as $author)
                        <li><label><input type="checkbox" value="{{ $author->name }}"> {{ $author->name }}</label></li>
                    @endforeach--}}  
                    
                </ul><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                data-bs-target="#addAuthorModal">Add New</button>
                
            </div>

        </div>


        <!-- Author Multi-select -->
        <div class="mb-3">
            <label for="authors" class="form-label">Authors</label>
            <div class="input-group">
                <select name="authors[]" id="authors" class="form-select" multiple required>
                    {{--@foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach--}}
                </select>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#addAuthorModal">Add New</button>
            </div>
        </div>


        <div class="mb-3">
            <label for="bookdescription" class="form-label">Description</label>



            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>


        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <input type="checkbox" name="availability" id="availability">
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>

<!-- Add Publisher Modal -->
<div class="modal fade" id="addPublisherModal" tabindex="-1" aria-labelledby="addPublisherModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('publisher.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPublisherModalLabel">Add New Publisher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="publisherName" class="form-label">Publisher Name</label>
                        <input type="text" name="name" id="publisherName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisherAddress" class="form-label">Publisher Address</label>
                        <input type="text" name="address" id="publisherAddress" class="form-control" required>
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
        <form method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAuthorModalLabel">Add New Author</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="authorName" class="form-label">Author Name</label>
                        <input type="text" name="name" id="authorName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="authorBio" class="form-label">Biography</label>
                        <textarea name="bio" id="authorBio" class="form-control" rows="3" required></textarea>
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



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownFields = [
            { inputId: "genreInput", dropdownId: "genreDropdown" },
            { inputId: "authorsInput", dropdownId: "authorsDropdown" }
        ];

        dropdownFields.forEach(({ inputId, dropdownId }) => {
            const input = document.getElementById(inputId);
            const dropdown = document.getElementById(dropdownId);
            const checkboxes = dropdown.querySelectorAll("input[type='checkbox']");

            // Toggle dropdown visibility
            input.addEventListener("click", function () {
                dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
            });

            // Update input value based on selected checkboxes
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function () {
                    const selectedValues = Array.from(checkboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.value);
                    input.value = selectedValues.join(", ");
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener("click", function (e) {
                if (!input.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.style.display = "none";
                }
            });
        });
    });
</script>
@endsection