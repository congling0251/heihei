$(function(){
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
