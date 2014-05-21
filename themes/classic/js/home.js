(function(window){
    $(function(){
        var layouts = new Array("userinfo","userstatus","usermessage","visitor","heiyoupanel");
        var lastTime= window.lastTime;
        var safeAjax = function(){
            var _safeNumber =window.serverSafeNumber;
            return function(_url, _type, _data,_dataType,_successFun){
                var _defaultFun = function(data){
                        console.log(data.data);    
                    };
                var _successFunciton = function(data){
                    if(data.result!=-1 && data.safeNumber){
                        _safeNumber = data.safeNumber ;
                    }
                      _successFun ? _successFun(data) : _defaultFun(data);
                }
                _data.safeNumber = _safeNumber;
                $.ajax({
                    url: _url,
                    type:_type,
                    data :_data,
                    dataType:_dataType,
                    success:_successFunciton,
                    error:function(msg){
                            console.log(msg.statusText);
                    }
            });
            }
        };
        var safeAjaxFun = safeAjax();
            //发送POST请求，保存修改后的界面
        var postMessage = function (str) { 
            safeAjaxFun('/heihei/HomePage/savelayout','POST',{layout: str},'json',function(data){
                if(data.result===1){
                   alert(data.data);
                   hideclosebutton();
                }
            });
        };
        var showclosebutton =function(){
            changebuttondisplay("block");
        };

        var hideclosebutton = function(){
            changebuttondisplay("none");
        };

        var changebuttondisplay =function(status){
            var clist = document.getElementsByName('close');
            for (var i = 0; i < clist.length; i++) {
                clist[i].style.display = status;
            };
        };

        //增加模块
        var addui = function(){
            //只显示已经被删除的模块
            for (var i = 0; i < layouts.length; i++) {
                if($("#"+layouts[i]).css('display')==="block")
                            $("#cb"+(i+1)).css('display',"none");
            };

            $('#chooseset').modal({
                keyboard: false
            });
        };

        //增加模块后保存
        var addsave = function(){
            var layout = "";
            for (var i = 0; i < layouts.length; i++) {
                       
                if($("#"+layouts[i]).css('display')==="block")
                {
                    layout+=layouts[i];
                    layout+=",";
                }
                else
                {
                    if( $("#cb"+(i+1)).is(':checked')){
                        $("#"+layouts[i]).css('display','block');
                        layout+=layouts[i];
                        layout+=",";
                    }
                }
            };
            postMessage(layout);
            $('#chooseset').modal('hide');
        };

        //关闭div
        var closediv = function(){
            event.srcElement.parentElement.style.display="none";
        };

        //显示大图片
        var showdefault = function(){
            if(event.srcElement.style.width<="210px")
                event.srcElement.style.width="480px";
            else
                event.srcElement.style.width="210px";
        };



        //保存界面
        var saveui = function(str){
            var layout="";
            for (var i = 0; i < layouts.length; i++) {
                if($("#"+layouts[i]).css('display') === "block")
                {
                    layout+=layouts[i];
                    layout+=",";
                }
            };
            if(str==layout)
            {
                $('#nosthsave').modal({
                        keyboard: false
                });
            }
            else
            {
                postMessage(layout);
            }
            hideclosebutton();
        };
        var message_submit = function(){
            var _data={'message':$("#heimessage").val()};
            safeAjaxFun('/heihei/HomePage/savemessage','POST',_data,'json',function(data){
                if(data.result===1){
                    alert(data.msg);
                    $('#heimessage').val('');
                    $('#heiMessageList').prepend(data.data.content);
                }

            });
        };
        var newnoteajax = function(){
            safeAjaxFun('/heihei/HomePage/newnoteajax','POST',{'lastTime':lastTime},'json',function(data){
                
                if(data.data.num===0){
                    $('#newnote_show').hide();
                }else{
                    $('#newnote_show').show();
                    $("#newnote_show").html("有（"+data.data.num+"）条新消息"); 
                }

            });
        };

        var moremessage = function(){
            safeAjaxFun('/heihei/HomePage/moreFriendmessage','POST',{},'html',function(data){
                $("#myfriendmessage").empty().append(data);
            });
        };
        var showNewMessage = function(){
            safeAjaxFun('/heihei/HomePage/showNewMessage','POST',{'lastTime':lastTime},'json',function(data){
                if(data.data.num!==0){
                    lastTime = data.data.time;
                    $("#myfriendmessage").prepend(data.data.data);
                    $('#newnote_show').hide();
                }
            });
        };
        $( "#friendtabs" ).tabs();
        $('#newnote_show').hide();
        $('#message_button').bind('click',message_submit);
        $('#modifyui').bind('click',showclosebutton);
        $('#addui').bind('click',addui);
        $('#saveui').bind('click',addsave);
        $('.hh_layout').bind('click',closediv);
        $('#layout_add_save').bind('click',addsave);
        $('#moressageButton').bind('click',moremessage);
        $('#newnote_show').bind('click',showNewMessage);
        $('#heiyoupanel').delegate('.addFriend','click',function(){
            var _id = $(this).attr('data-id');
            safeAjaxFun('/heihei/friend/friend/addfriend','POST',{addfriendid:_id},'json',function(data){
                    alert(data.data);
            });
        });
        $('#friendResult').delegate('.addFriend','click',function(){
            var _id = $(this).attr('data-id');
            safeAjaxFun('/heihei/friend/friend/addfriend','POST',{addfriendid:_id},'json',function(data){
                alert(data.data);
                $('#friendResult').find('.addFriend[data-id='+_id+']').parents('.sefriend').remove();
                if($('#friendResult').children().length==0){
                    $('#friendResult').append('<div>当前没有其他用户</div>');
                }
                console.log($('#friendResult').children().length);
            });
        });
        $('#friendManage').delegate('.deleteFriend','click',function(){
            var _id = $(this).attr('data-id');
            safeAjaxFun('/heihei/friend/friend/deletefriend','POST',{deletefriendid:_id},'json',function(data){
                alert(data.data);
                $('#friendManage').find('.deleteFriend[data-id='+_id+']').parents('.sefriend').remove();
                if($('#friendManage').children().length==1){
                    $('#friendManage').append('<div>您目前没有好友</div>');
                }
            });
        });
        $("#friendtabs").delegate("#name_serchfriend","click",function(e){
            var _name=$("#newfriendname").val();
            if(_name==""){
                alert("姓名不能为空");
                return false;
            }
            safeAjaxFun('/heihei/friend/friend/findfriend','POST',{name:_name},'json',function(data){
                $("#addfriends").empty().append(data.data.data);
            });
        });
        $("#myfriendmessage").delegate("a.comment_link","click",function(e){
            var $this = $(this);
            var _id = $this.attr('data-id');
            safeAjaxFun('/heihei/HomePage/comment','POST',{'message_id':_id},'json',function(data){
                if(data.result===1){
                   $this.parents('.messageinfo').find('.comment').empty().append(data.data.content); 
                }

            });
        });
        $("#myfriendmessage").delegate("button.comment_btn","click",function(e){
            var $now = $(this);
            var _id = $now.parents('.messageinfo').find('.comment_link').attr('data-id');
            var content = $now.parent().find('.heicomment').val();
            if(content!=''){
                safeAjaxFun('/heihei/HomePage/commentSubmit','POST',{'message_id':_id,'content':content},'json',function(data){
                    if(data.result===1){
                        alert(data.msg);
                       $now.parents('.messageinfo').find('.comment_link').text('评论('+data.data.num+')'); 
                       $now.parents('.comment').empty().append(data.data.content); 
                    }
                });
            }
            else{
                alert('评论不能为空！');
                return false;

            }
        });
        $("#myfriendmessage").delegate("a.comment_reply","click",function(e){
            var $now = $(this);
            var name = $now.parents('.commentdetail').find('.author_name');
            var content = $now.parents('.messageinfo').find('.heicomment');
            var _content = '回复@'+name.text() +':'+content.val();
            content.val(_content);
            console.log(_content,content)
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
             safeAjaxFun('/heihei/friend/friend/findfriend','POST',_data,'json',function(data){
                $("#addfriends").empty().append(data.data.data);
            });
        });
        $('#HhUsers_headphoto').bind('change',function(){
            var oFReader = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

            oFReader.onload = function (oFREvent) {
              document.getElementById("imageView").src = oFREvent.target.result;
            };
            if (document.getElementById("HhUsers_headphoto").files.length === 0) { return; }
                var oFile = document.getElementById("HhUsers_headphoto").files[0];
                if (!rFilter.test(oFile.type)) { alert("您上传的不是图片"); return; }
            oFReader.readAsDataURL(oFile);
        })
        setInterval(newnoteajax,20000);
    });
})(window);

