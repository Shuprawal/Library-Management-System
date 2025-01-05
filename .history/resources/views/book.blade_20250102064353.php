@extends('layouts.try')
@section("hom-body")
<div class="single-book container py-5">
    <!-- Book Header Section -->
    <div class="book-header mb-4">
        <h2 class="fw-bold text-primary">{{$book->name}}</h2>
    </div>

    <div class="row g-4">
        <!-- Image Section -->
        <div class="col-md-5 col-lg-4">
            <div class="book-image-container shadow rounded overflow-hidden position-relative">
                <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Book Cover">
                <!-- Book Rating Badge -->
                <div class="position-absolute top-0 end-0 m-3 p-2 bg-dark bg-opacity-75 rounded text-white">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <span>{{ round($book->averageRating(), 1) }}</span>
                    </div>
                </div>
            </div>
            <!-- Book Rating Section -->
            <div class="rating-section mt-3 p-3 bg-light rounded shadow-sm">
                <h6 class="fw-bold mb-2">Rate this Book</h6>
                <div id="rating-{{ $book->id }}" class="rating-container" data-id="{{ $book->id }}" data-type="book">
                    <div class="stars d-flex gap-1 justify-content-center mb-2">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <p class="text-center mb-0 text-muted small">Click to rate</p>
                </div>
            </div>
        </div>

        <!-- Book Details Section -->
        <div class="col-md-7 col-lg-8">
            <div class="book-details bg-white p-4 rounded shadow-sm">
                <!-- Book Metadata Grid -->
                <div class="book-metadata-grid mb-4">
                    <div class="row row-cols-1 row-cols-sm-2 g-3">
                        <!-- Author Card -->
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light position-relative">
                                <h6 class="fw-bold text-primary mb-2">Author</h6>
                                @foreach ($book->authors as $author)
                                <div class="mb-2">
                                    <p class="mb-1 fw-semibold">{{$author->name}}</p>
                                    <div class="rating-container" data-id="{{ $author->id }}" data-type="author">
                                        <div class="stars d-flex gap-1">
                                            <span class="star" data-value="1">★</span>
                                            <span class="star" data-value="2">★</span>
                                            <span class="star" data-value="3">★</span>
                                            <span class="star" data-value="4">★</span>
                                            <span class="star" data-value="5">★</span>
                                        </div>
                                        <small class="text-muted">Avg: {{ round($author->averageRating(), 1) }}</small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Publisher Card -->
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light position-relative">
                                <h6 class="fw-bold text-primary mb-2">Publisher</h6>
                                <p class="mb-1 fw-semibold">{{$book->publisher->name}}</p>
                                <div class="rating-container" data-id="{{ $book->publisher->id }}" data-type="publisher">
                                    <div class="stars d-flex gap-1">
                                        <span class="star" data-value="1">★</span>
                                        <span class="star" data-value="2">★</span>
                                        <span class="star" data-value="3">★</span>
                                        <span class="star" data-value="4">★</span>
                                        <span class="star" data-value="5">★</span>
                                    </div>
                                    <small class="text-muted">Avg: {{ round($book->publisher->averageRating(), 1) }}</small>
                                </div>
                            </div>
                        </div>

                        <!-- Publication Date Card -->
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light">
                                <h6 class="fw-bold text-primary mb-2">Published Date</h6>
                                <p class="mb-0">{{$book->publication_date}}</p>
                            </div>
                        </div>

                        <!-- Pages Card -->
                        <div class="col">
                            <div class="metadata-card h-100 p-3 rounded bg-light">
                                <h6 class="fw-bold text-primary mb-2">Pages</h6>
                                <p class="mb-0">{{$book->pages}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rest of your existing code (genres, description, buttons) -->
                <!-- ... -->
            </div>
        </div>
    </div>

    <!-- Updated styles -->
    <style>
    .book-image-container {
        aspect-ratio: 2/3;
        position: relative;
    }

    .metadata-card {
        border: 1px solid rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
    }

    .metadata-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .star {
        cursor: pointer;
        color: #ddd;
        font-size: 20px;
        transition: color 0.2s ease;
    }

    .star:hover,
    .star.active {
        color: #FFD700;
    }

    .star:hover ~ .star {
        color: #FFD700;
    }

    .rating-container:hover .star {
        color: #ddd;
    }

    .rating-container:hover .star:hover,
    .rating-container:hover .star:hover ~ .star {
        color: #FFD700;
    }

    .stars {
        direction: rtl;
    }

    .stars .star {
        display: inline-block;
    }

    .stars .star:hover,
    .stars .star:hover ~ .star {
        color: #FFD700;
    }

    .badge {
        padding: 0.5em 1em;
        border-radius: 6px;
    }

    .action-buttons .btn {
        padding: 0.5rem 1.5rem;
        transition: all 0.3s ease;
    }

    .action-buttons .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    </style>

    <!-- Updated JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Function to highlight stars based on rating
        function highlightStars(container, rating) {
            container.find('.star').removeClass('active');
            container.find('.star').each(function() {
                if ($(this).data('value') <= rating) {
                    $(this).addClass('active');
                }
            });
        }

        // Initialize ratings
        $('.rating-container').each(function() {
            let container = $(this);
            let currentRating = parseFloat(container.find('small').text().replace('Avg: ', ''));
            highlightStars(container, currentRating);
        });

        // Handle star click
        $(document).on('click', '.star', function () {
            let star = $(this);
            let rating = star.data('value');
            let container = star.closest('.rating-container');
            let id = container.data('id');
            let type = container.data('type');

            $.ajax({
                url: `/${type}/rate/${id}`,
                method: 'POST',
                data: {
                    rating: rating,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    if (response.success) {
                        // Show success message
                        let toast = $('<div class="toast position-fixed top-0 end-0 m-3" role="alert">')
                            .html(`
                                <div class="toast-header bg-success text-white">
                                    <strong class="me-auto">Success</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                                </div>
                                <div class="toast-body">${response.success}</div>
                            `);
                        $('body').append(toast);
                        let bsToast = new bootstrap.Toast(toast);
                        bsToast.show();
                        
                        // Update stars
                        highlightStars(container, rating);
                        
                        // Update average rating display
                        container.find('small').text(`Avg: ${response.newAverage.toFixed(1)}`);
                    }
                },
                error: function (xhr) {
                    let errorMsg = xhr.responseJSON.error || 'Something went wrong';
                    let toast = $('<div class="toast position-fixed top-0 end-0 m-3" role="alert">')
                        .html(`
                            <div class="toast-header bg-danger text-white">
                                <strong class="me-auto">Error</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                            </div>
                            <div class="toast-body">${errorMsg}</div>
                        `);
                    $('body').append(toast);
                    let bsToast = new bootstrap.Toast(toast);
                    bsToast.show();
                },
            });
        });
    });
    </script>
@endsection