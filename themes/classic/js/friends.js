$(document).ready(function(){
    $("#friendtabs").delegate("#name_serchfriend","click",function(e){
        var _name=$("#newfriendname").val();
        if(_name==""){
            alert("姓名不能为空");
            return;
        }
          $.ajax({
	        url: 'findfriend',
	        type:"POST",
                data:{name:_name},
	        dataType:'html',
	        success:function(data){
                            $("#addfriends").empty().append(data);
	        },
                error:function(msg){
                  alert("查找失败");
                }
	    }); 
    });
    
      $("#friendtabs").delegate("#detail_serchfriend","click",function(e){
        var _gender=$("#gender").val();
        var _school=$("#school").val();
        var _company=$("#company").val();
        var _data={
            company:_company,
            gender:_gender,
            school:_school
        };
          $.ajax({
	        url: 'findfriend',
	        type:"POST",
                data:_data,
	        dataType:'html',
	        success:function(data){
                            $("#addfriendsnager").empty().append(data);
	        },
                error:function(msg){
                  alert("查找失败");
                }
	    }); 
    });

});
    function addfriend(_id,_url){
        $.ajax({
	        url: _url,
	        type:"POST",
                data:{addfriendid:_id},
	        dataType:'json',
	        success:function(data){
                            alert(data.data);
                            window.location.reload();
	        },
                error:function(msg){
                   console.log(msg.statusText);
                }
	    }); 
}
function deletefriend(_id,_url){
        $.ajax({
	        url: _url,
	        type:"POST",
                data:{deletefriendid:_id},
	        dataType:'json',
	        success:function(data){
                            alert(data.data);
                            window.location.reload();
	        },
                error:function(msg){
                   console.log(msg.statusText);
                }
	    }); 
}