@section('hom-body')
<div class="container">
    <h2>Add New Book</h2>
    <form method="POST">
        @csrf
        <!-- Other Fields -->

        <!-- Genre Dropdown -->
        <div class="mb-3">
            <label for="genreInput" class="form-label">Genre</label>
            <div class="dropdown">
                <input type="text" id="genreInput" class="form-control" placeholder="Select genres" readonly>
                <ul id="genreDropdown" class="dropdown-menu" style="width: 100%; display: none;">
                    @foreach ($genres as $genre)
                        <li><label><input type="checkbox" value="{{ $genre->name }}"> {{ $genre->name }}</label></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Authors Multi-select -->
        <div class="mb-3">
            <label for="authorsInput" class="form-label">Authors</label>
            <div class="dropdown">
                <input type="text" id="authorsInput" class="form-control" placeholder="Select authors" readonly>
                <ul id="authorsDropdown" class="dropdown-menu" style="width: 100%; display: none;">
                    @foreach ($authors as $author)
                        <li><label><input type="checkbox" value="{{ $author->name }}"> {{ $author->name }}</label></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
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
