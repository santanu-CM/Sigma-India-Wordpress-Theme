jQuery(document).ready(function($) {
    // Handle delete button click
    $(document).on('click', '.delete__product', function(e) {
        e.preventDefault();
        var $button = $(this);
        var productId = $button.data('product_id');

        $.ajax({
            url: ajax_object.ajax_url,
            method: 'POST',
            data: {
                action: 'remove_cart_item',
                product_id: productId
            },
            success: function(response) {
                if (response.success) {
                    // Refresh the cart contents
                    location.reload();
                } else {
                    alert('Failed to remove item: ' + response.data.message);
                }
            }
        });
    });
});





