<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD BOOK</title>
</head>

<body>
    <form class="form_div" action="{{ route('new') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="text-center mb-3">
            <h1 class="heading">BOOKS</h1>
        </div>
        <!-- Book input -->
        <div data-mdb-input-init class="form-outline">
            <input name="name" class="form-in" placeholder="Name" required />
        </div>

        <!-- Book ISBN input -->
        <div data-mdb-input-init class="form-outline">
            <input name="isbn" class="form-in" placeholder="ISBN" required />
        </div>


        <div data-mdb-input-init class="form-outline">
            <input name="genre" class="form-in" placeholder="Genre" required />
        </div>

        <select class="select-option" id="yesNo" name="yesNo" required>
            <option value="Boo" hidden>Book status</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        <div data-mdb-input-init class="form-outline">
            <label for="book_image" class="form-label">Upload Book Cover Image</label>
            <input type="file" name="book_image" id="book_photo" class="form-in" accept="image/*" required />
        </div>



        <!-- Submit button -->
        <button name="save" type="submit" class="btn-submit">Save</button>

    </form>
</body>

</html>