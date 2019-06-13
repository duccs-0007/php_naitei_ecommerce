$(document).ready(function(){
    $('#orders_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/orders/getdata",
        "columns":[
        { "data": "address" },
        { "data": "order_total" },
        { "data": "accepted" },
        { "data": "user_name" },
        { "data": "action", orderable:false, searchable: false}
        ]
    });
});
