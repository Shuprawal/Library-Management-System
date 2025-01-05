@extends('layouts.try')
@section("hom-body")
<div class="single_book">

    <h3 class="card-title m-3 fw-bold">Book name</h3>
    <div class="row m-1">

        <!-- Image Section -->
        <div class="col-md-6 imgcarou">
            <img src="{{ asset('/img/one.jpg') }}" class="bd-placeholder-img img-fluid rounded-start" width="100%"
                height="300" focusable="false">
        </div>
        <!-- Text Section -->
        <div class="col  align-items-center">
            <div class="book_detail">

                <div class="card-body ">

                    <br>
                    <div class="book_box d-flex" style="justify-conte">
                        <div class="publish">
                            <h5 class="fw-bold">publisher</h5>
                            <p>publisher name</p>
                        </div>
                        <div class="publish">
                            <h5 class="fw-bold">publish date</h5>
                            <p>published date</p>
                        </div>
                        <div class="publish">
                            <h5 class="fw-bold">Pages</h5>
                            <p>total page</p>
                        </div>
                        <div class="publish">
                            <h5 class="fw-bold">Pages</h5>
                            <p>total page</p>
                        </div>
                    </div>
                    <p class="card-text mt-3">Genre:</p>
                    <p class="card-text m-1 mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique
                        nesciunt debitis deserunt tempora
                        amet quia natus at obcaecati voluptas, mollitia fuga numquam esse optio provident praesentium
                        facilis possimus velit libero.</p>
                    <p class="card-text m-1 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero cum
                        fugiat consectetur id mollitia
                        necessitatibus laudantium in esse doloribus voluptatibus distinctio, non blanditiis hic enim
                        laborum
                        fugit repellendus. Ratione, distinctio.</p>

                    <p class="card-text my-4"><button type="button" class="btn btn-primary btn-lg">Borrow</button>
                        <button type="button" class="btn btn-danger btn-lg">
                            <i class="bi bi-trash3"></i>
                            Delete</button>
                        <button type="button" class="btn btn-dark btn-lg"><i
                                class="bi bi-pencil-square"></i>Edit</button>

                        </small>

                    </p>


                </div>

            </div>

        </div>
    </div>
    <div class="book_coment mx-3 m-5">
        <h4 class="card-title  fw-bold">Leave a Comment</h4>
        <form class="row g-6 needs-validation" novalidate>
            <div class="col comment_input">
                <input type="text" class="form-control border-3 " required>
                <button type="submit" class="btn btn-info mx-2"><i class="bi bi-send-fill"></i> submit</button>
                <button type="button" class="btn btn-dark btn-lg"><i class="bi bi-pencil-square"></i>Edit</button>
            </div>
        </form>

        <h6 class="mt-3 fw-bold">Previous Comments</h6>
        <div class="prev_comment">
            <div class="commentor">
                <i class="bi bi-person-circle"></i>
                <p class="mx-1">User Name</p>
            </div>
            <p>Comment Text</p>
        </div>
        <div class="prev_comment">
            <div class="commentor">
                <i class="bi bi-person-circle"></i>
                <p class="mx-1">User Name</p>
            </div>
            <p>Comment Text</p>
        </div>
    </div>
    <div class="recommendation mx-3 my-1">
        <h6 class="mt-3 fw-bold">More by this author</h6>
        <div class="card-group">
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card available-list">
                <img src="/img/one.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Book name</h5>

                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                </div>
            </div>

        </div>

    </div>


</div>



@endsection