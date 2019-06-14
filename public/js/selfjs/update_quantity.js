$('.increase').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var ids = '.' + 'input-text' + id.toString();
    var result = document.getElementById(id.toString());
    var max = parseInt(result.max);
    var sst = result.value;
    if( !isNaN( sst ) && sst < max)
    {
        result.value++;
    }
    $(ids).val(result.value);
});

$('.reduced').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var ids = '.' + 'input-text' + id.toString();
    var result = document.getElementById(id.toString());
    var sst = result.value;
    if( !isNaN( sst ) && sst > 1 )
    {
        result.value--;
    }
    $(ids).val(result.value);
});
