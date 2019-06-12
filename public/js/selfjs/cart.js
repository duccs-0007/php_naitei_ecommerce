/* Add Product to cart */
$('.add_to_cart').click(function(e){
    var token = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('id');
    var quantity = $('.quantity').val();
    var url = '/add-to-cart';

    var options = {
        dataType: 'json',
        url: url,
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
