//---------- Logout ------------//
$(document).ready(function(){
    $('#logout_btn_submit').click(function(e){
        e.preventDefault();
        $('#logout_form').submit();
    });
    $('#users_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/users/getdata",
        "columns":[
            { "data": "name" },
            { "data": "email" },
            { "data": "created_at"},
            { "data": "action", orderable:false, searchable: false}
        ]
    });
    $(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url: "/admin/users/delete",
                method:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#users_table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    });
});
