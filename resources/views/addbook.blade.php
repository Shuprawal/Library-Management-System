@extends("layouts.try")
@section("hom-body")
<h2 class="card-title m-4">Add New Book</h2>
<div class="add_body p-2">

<form class="row g-3 addform p-2 m-2" >

    <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Book name</label>
        <div class="input-group">
            <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
        </div>
    </div>

  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Author name</label>
    <input type="text" class="form-control" id="validationDefault01"  required>
  </div>
  <div class="col-md-4">
        <label for="genreSelect" class="form-label">Genre</label>
        <div class="dropdown">
            <input type="text" id="genreInput" class="form-control" placeholder="Select genres" readonly>
            <ul id="genreDropdown" class="dropdown-menu" style="width: 100%; display: none;">
                <li><label><input type="checkbox" value="Action"> Action</label></li>
                <li><label><input type="checkbox" value="Drama"> Drama</label></li>
                <li><label><input type="checkbox" value="Comedy"> Comedy</label></li>
                <li><label><input type="checkbox" value="Horror"> Horror</label></li>
                <li><label><input type="checkbox" value="Romance"> Romance</label></li>
            </ul>
        </div>
</div>


  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Publisher</label>
    <input type="text" class="form-control" id="validationDefault01"  required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Published Year</label>
    <input type="date" class="form-control" id="validationDefault01"  required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Available copies</label>
    <input type="number" class="form-control" id="validationDefault01"  required>
  </div>
  <div class="add_buttons">
    <div class="col-4">
        <button class="btn btn-primary" type="submit">Add book</button>
    </div>
    <div class="col-4 mx-1">
        <button class="btn btn-primary" type="submit">Add Existing book</button>
    </div>
  </div>
  
</form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const genreInput = document.getElementById("genreInput");
        const genreDropdown = document.getElementById("genreDropdown");
        const genreCheckboxes = genreDropdown.querySelectorAll("input[type='checkbox']");

        // Show dropdown when input is clicked
        genreInput.addEventListener("click", function () {
            genreDropdown.style.display = genreDropdown.style.display === "none" ? "block" : "none";
        });

        // Update input value when a checkbox is selected/deselected
        genreCheckboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function () {
                const selectedGenres = Array.from(genreCheckboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);
                genreInput.value = selectedGenres.join(", ");
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function (e) {
            if (!genreInput.contains(e.target) && !genreDropdown.contains(e.target)) {
                genreDropdown.style.display = "none";
            }
        });
    });
</script>

@endsection