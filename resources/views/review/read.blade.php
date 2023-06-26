@extends('layouts.app')

@section('content')

  <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">


        <h2>Reviews</h2>
        <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createReviewModal">Add Review</button>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Name</th>
                    <th>Review</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="reviewsData">

            </tbody>
        </table>
          </div>
  </section>

    <!-- Create Review Modal -->
    <div class="modal fade" id="createReviewModal" tabindex="-1" role="dialog" aria-labelledby="createReviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createReviewModalLabel">Add Review</h5>
                    <button type="button" class="close" data-bs-dismis="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="productSelect">Product:</label>
                        <select class="form-control" id="productSelect">
                            <!-- Product options will be populated dynamically -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nameInput">Name:</label>
                        <input type="text" class="form-control" id="nameInput">
                    </div>
                    <div class="form-group">
                        <label for="reviewInput">Review:</label>
                        <textarea class="form-control" id="reviewInput"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismis="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addReviewBtn">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Review Modal -->
    <div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="editReviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReviewModalLabel">Edit Review</h5>
                    <button type="button" class="close" data-bs-dismis="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editReviewId">
                    <div class="form-group">
                        <label for="editProductSelect">Product:</label>
                        <select class="form-control" id="editProductSelect">
                            <!-- Product options will be populated dynamically -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editNameInput">Name:</label>
                        <input type="text" class="form-control" id="editNameInput">
                    </div>
                    <div class="form-group">
                        <label for="editReviewInput">Review:</label>
                        <textarea class="form-control" id="editReviewInput"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismis="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateReviewBtn">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Review Modal -->
    <div class="modal fade" id="deleteReviewModal" tabindex="-1" role="dialog" aria-labelledby="deleteReviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteReviewModalLabel">Delete Review</h5>
                    <button type="button" class="close" data-bs-dismis="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this review?</p>
                    <input type="hidden" id="deleteReviewId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismis="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteReviewBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load reviews when the page is ready
            loadReviews();

            // Function to load reviews
            function loadReviews() {
                $.ajax({
                    url: '/reviews',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Clear reviews table body
                        $('#reviewsData').empty();

                        // Populate reviews table with data
                        $.each(response.data, function(index, review) {
                            var row = `<tr>
                                <td>${index + 1}</td>
                                <td>${review.produk.nama}</td>
                                <td>${review.nama}</td>
                                <td>${review.review}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-review-btn" data-bs-toggle="modal"
                                        data-bs-target="#editReviewModal" data-id="${review.id}"
                                        data-produk="${review.produk_id}" data-nama="${review.nama}"
                                        data-review="${review.review}">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-review-btn" data-bs-toggle="modal"
                                        data-bs-target="#deleteReviewModal" data-id="${review.id}">Delete</button>
                                </td>
                            </tr>`;
                            $('#reviewsData').append(row);
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }

            // Function to load products and populate select options
            function loadProducts() {
                $.ajax({
                    url: '/',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Clear product select options
                        $('#productSelect').empty();
                        $('#editProductSelect').empty();

                        // Populate product select options
                        $.each(response, function(index, produk) {
                            var option = `<option value="${produk.id}">${produk.nama}</option>`;
                            $('#productSelect').append(option);
                            $('#editProductSelect').append(option);
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }

            // Add Review
            $('#addReviewBtn').click(function() {
                var productId = $('#productSelect').val();
                var name = $('#nameInput').val();
                var review = $('#reviewInput').val();

                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Buat header permintaan Ajax dengan token CSRF
                const headers = {
                    'X-CSRF-TOKEN': csrfToken
                };

                $.ajax({
                    url: '/reviews',
                    method: 'POST',
                    dataType: 'json',
                    headers : headers,
                    data: {
                        produk_id: productId,
                        nama: name,
                        review: review
                    },
                    success: function(response) {
                        $('#createReviewModal').modal('hide');
                        loadReviews();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });

            // Edit Review
            $(document).on('click', '.edit-review-btn', function() {
                var id = $(this).data('id');
                var productId = $(this).data('produk');
                var name = $(this).data('nama');
                var review = $(this).data('review');

                $('#editReviewId').val(id);
                $('#editProductSelect').val(productId);
                $('#editNameInput').val(name);
                $('#editReviewInput').val(review);
            });

            $('#updateReviewBtn').click(function() {
                var id = $('#editReviewId').val();
                var productId = $('#editProductSelect').val();
                var name = $('#editNameInput').val();
                var review = $('#editReviewInput').val();

                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Buat header permintaan Ajax dengan token CSRF
                const headers = {
                    'X-CSRF-TOKEN': csrfToken
                };


                $.ajax({
                    url: '/reviews/' + id,
                    method: 'PUT',
                    dataType: 'json',
                    headers : headers,
                    data: {
                        produk_id: productId,
                        nama: name,
                        review: review
                    },
                    success: function(response) {
                        $('#editReviewModal').modal('hide');
                        loadReviews();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });

            // Delete Review
            $(document).on('click', '.delete-review-btn', function() {
                var id = $(this).data('id');
                $('#deleteReviewId').val(id);
            });

            $('#deleteReviewBtn').click(function() {

                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Buat header permintaan Ajax dengan token CSRF
                const headers = {
                    'X-CSRF-TOKEN': csrfToken
                };

                var id = $('#deleteReviewId').val();

                $.ajax({
                    url: '/reviews/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    headers : headers,
                    success: function(response) {
                        $('#deleteReviewModal').modal('hide');
                        loadReviews();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });

            // Load products and reviews when the page is ready
            loadProducts();
            loadReviews();
        });
    </script>




  @endsection
