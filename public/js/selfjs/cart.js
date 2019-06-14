/* Add Product to cart */
$('.add_to_cart').click(function(e){
    var token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('id');
    var quantity = $('.quantity').val();

    var options = {
        dataType: 'json',
        url: '/cart',
        method: 'POST',
        data: {
            quantity: quantity,
            id: id,
            _token: token,
        },

        success:function(response){
            $('#totalQuantity').html(response.totalQuantity);
            $('#error_msg').html(response.message);
        },

        error:function(){
            $('#error_msg').html('Product not found!');
        }
    }
    
    e.preventDefault();
    $.ajax(options);
});

/* Update Product in cart */
$('.update_quantity').click(function(e){
    var token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('id');

    var result = document.getElementById(id.toString());
    var quantity = result.value;

    var ids = '.' + 'price' + id.toString();
    var new_quantity = '.' + 'input-text' + id.toString();

    var options = {
        dataType: 'json',
        url: '/cart/' + id,
        method: 'PUT',
        data: {
            quantity: quantity,
            id: id,
            _token: token,
        },

        success:function(response){
            $(ids).html('$' + response.new_price);
            $('.subtotal').html('$' + response.subtotal);
            $('#error_msg').html(response.message);
            $(new_quantity).val(response.new_quantity);
            $('#totalQuantity').html(response.totalQuantity);
        },

        error:function(){
            $('#error_msg').html(response.message);
        }
    }
    
    e.preventDefault();
    $.ajax(options);
});

/* Delte item from Cart */
$('.delete_item').click(function(e){
    var token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('id');
    var url = '/carts/delete';

    var options = {
        dataType: 'json',
        url: '/cart/' + id,
        method: 'DELETE',
        data: {
            id: id,
            _token: token,
        },

        success:function(response){
            $('.cart_item' + id.toString()).remove();
            $('.subtotal').html('$' + response.totalPrice);
            $('#totalQuantity').html(response.totalQuantity);
            $('#error_msg').html(response.message);
            if (!response.totalPrice)
            {
                $('.table-responsive').remove();

                $('.cart_inner').append(
                    '<div class="alert alert-danger alert_font" role="alert">' +
                            'There is no product in your Cart!' +
                    '</div>' +
                    '<div class="d-flex align-items-center">' +
                        '<a class="primary-btn go_back" href="/">Continue Shopping <i class="fas fa-arrow-right"></i></a>' +
                    '</div>'
                );
            }
        }
    }
    
    e.preventDefault();
    $.ajax(options);
});
