@extends('layouts.try')
@section("hom-body")
<div class="container mt-4">
    <!-- Book Title -->
    <h3 class="mb-4 fw-bold">Book name</h3>

    <div class="row">
        <!-- Image Section -->
        <div class="col-md-4 mb-4">
            <img src="{{ asset('/img/one.jpg') }}" class="img-fluid rounded" alt="Book Cover">
        </div>

        <!-- Book Details -->
        <div class="col-md-8">
            <!-- Book Info Boxes -->
            <div class="d-flex flex-wrap gap-3 mb-4">
                <div class="info-box">
                    <h5 class="fw-bold">Author</h5>
                    <p class="mb-0">Author name</p>
                </div>
                <div class="info-box">
                    <h5 class="fw-bold">Publisher</h5>
                    <p class="mb-0">Publisher name</p>
                </div>
                <div class="info-box">
                    <h5 class="fw-bold">Published</h5>
                    <p class="mb-0">Published date</p>
                </div>
                <div class="info-box">
                    <h5 class="fw-bold">Pages</h5>
                    <p class="mb-0">Total pages</p>
                </div>
            </div>

            <!-- Genre -->
            <p class="mb-3">
                <span class="fw-bold">Genre: </span>
                <span class="badge bg-secondary me-2">Fiction</span>
                <span class="badge bg-secondary">Mystery</span>
            </p>

            <!-- Description -->
            <div class="mb-4">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique nesciunt debitis deserunt tempora amet quia natus at obcaecati voluptas, mollitia fuga numquam esse optio provident praesentium facilis possimus velit libero.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero cum fugiat consectetur id mollitia necessitatibus laudantium in esse doloribus voluptatibus distinctio.</p>
            </div>

            <!-- Buttons -->
            <div class="mb-4">
                <button class="btn btn-primary me-2">
                    <i class="bi bi-book"></i> Borrow
                </button>
                <button class="btn btn-danger me-2">
                    <i class="bi bi-trash3"></i> Delete
                </button>
                <button class="btn btn-dark">
                    <i class="bi bi-pencil-square"></i> Edit
                </button>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="my-5">
        <h4 class="fw-bold mb-3">Leave a Comment</h4>
        
        <!-- Comment Form -->
        <form class="mb-4">
            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Write your comment..." required>
                <button type="submit" class="btn btn-info">
                    <i class="bi bi-send-fill"></i> Submit
                </button>
            </div>
        </form>

        <!-- Previous Comments -->
        <h5 class="fw-bold mb-3">Previous Comments</h5>
        <div class="comments-list">
            <!-- Single Comment -->
            <div class="comment mb-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-5"></i>
                    <span class="ms-2 fw-bold">User Name</span>
                </div>
                <p class="ms-4 mb-3">Comment Text</p>
            </div>

            <!-- Single Comment -->
            <div class="comment mb-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-person-circle fs-5"></i>
                    <span class="ms-2 fw-bold">User Name</span>
                </div>
                <p class="ms-4 mb-3">Comment Text</p>
            </div>
        </div>
    </div>

    <!-- More Books Section -->
    <div class="my-5">
        <h4 class="fw-bold mb-4">More by this author</h4>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <!-- Book Card -->
            <div class="col">
                <div class="card h-100">
                    <img src="/img/one.jpg" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title">Book name</h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

            <!-- Repeat for other books -->
            <div class="col">
                <div class="card h-100">
                    <img src="/img/one.jpg" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title">Book name</h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="/img/one.jpg" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title">Book name</h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="/img/one.jpg" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <h5 class="card-title">Book name</h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.info-box {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 15px 25px;
}

.comment {
    border-bottom: 1px solid #dee2e6;
}

.btn i {
    margin-right: 5px;
}
</style>

@endsection