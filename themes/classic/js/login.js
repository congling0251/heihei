;( function ( ) {
    $(
        $('#register').bind('submit',function(){
            var _password = $('#password').val();
            var _repassword =$('#repassword').val();
            if(_password!==_repassword){
                alert('两次密码必须一致');
                return false;
            }
        })
    );
} )( window );