$(document).ready(function() {
    $('.add-to-cart').on('click', function(e) {
        e.preventDefault();

        let montreId = $(this).data('id');
        let url = $(this).data('url');
        let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                _token: csrfToken, // Include CSRF token in the request
                id: montreId
            },
            success: function(response) {
                toastr.success('Produit ajouté au panier avec succès.');
            },
            error: function(xhr, status, error) {
                console.error('Error adding product to cart:', error);
                toastr.error('Impossible d\'ajouter le produit au panier. Veuillez réessayer.');
            }
        });
    });
});
