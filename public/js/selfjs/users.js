//---------- Logout ------------//
$(document).ready(function(){
    $('#logout_btn_submit').click(function(e){
        e.preventDefault();
        $('#logout_form').submit();
    });
});
