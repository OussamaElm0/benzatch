$(document).ready(function() {
    $('.add-to-cart').on('click', function(e) {
        e.preventDefault();

        let montreId = $(this).data('id');
        let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token

        $.ajax({
            url: 'cart/add',
            method: 'POST',
            data: {
                _token: csrfToken, // Include CSRF token in the request
                id: montreId
            },
            success: function(response) {
                alert('Product added to cart successfully!');
            },
            error: function(xhr, status, error) {
                console.error('Error adding product to cart:', error);
                alert('Failed to add product to cart. Please try again.');
            }
        });
    });
});
