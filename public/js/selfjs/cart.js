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
        },

        error:function(){
            $('#error_msg').html(response.message);
        }
    }
    
    e.preventDefault();
    $.ajax(options);
});
