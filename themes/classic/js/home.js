
    //布局数组，很重要！
(function(window){
    var layouts = new Array("userinfo","userstatus","usermessage","visitor","heiyoupanel");

    var showdiv = function(str){
        
    }
    function showclosebutton(){
        changebuttondisplay("block");
    }

    function hideclosebutton(){
        changebuttondisplay("none");
    }

    function changebuttondisplay(status){
        var clist = document.getElementsByName('close');
        for (var i = 0; i < clist.length; i++) {
            clist[i].style.display = status;
        };
    }

    //增加模块
    function addui(){
        //只显示已经被删除的模块
        for (var i = 0; i < layouts.length; i++) {
            if($("#"+layouts[i]).css('display')==="block")
                        $("#cb"+(i+1)).css('display',"none");
        };

        $('#chooseset').modal({
            keyboard: false
        });
    }

    //增加模块后保存
    function addsave(){
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
    }

    //关闭div
    function closediv(){
        event.srcElement.parentElement.style.display="none";
    }

    //显示大图片
    function showdefault(){
        if(event.srcElement.style.width<="210px")
            event.srcElement.style.width="480px";
        else
            event.srcElement.style.width="210px";
    }

    //发送POST请求，保存修改后的界面
    function postMessage(str)
    { 
        $.ajax({
                url: "/heihei/HomePage/savelayout",
                type:"POST",
                data :{
                        layout: str
                     } ,
                dataType:'json',
                success:function(data){
                            if(data.result===1){
                               alert(data.data);
                               hideclosebutton();
                            }
                    },
                     error:function(msg){
                        alert(msg.statusText);
                     }
            }); 
    }

    //保存界面
    function saveui(str){
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
    }
    function message_submit(){
        var _data={'message':$(".heimessage").val()};
          
        $.ajax({
                url: '/heihei/HomePage/savemessage',
                type:"POST",
                data : _data ,
                dataType:'json',
                success:function(data){
                                alert(data.data);    
                               window.location.reload();
                },
                    error:function(msg){
                        alert(msg.statusText);
                    }
            }); 
    };
    function newnoteajax(){
            $.ajax({
                url: '/heihei/HomePage/newnoteajax',
                type:"POST",
                dataType:'json',
                data:'',
                success:function(data){
                                $("#newnote_show").html("有（"+data.data.num+"）条新消息"); 
                },
                    error:function(msg){
                       console.log(msg.statusText);
                    }
            }); 
    }

    function moremessage(_url){
            $.ajax({
                url: _url,
                type:"POST",
                dataType:'html',
                success:function(data){
                                $("#myfriendmessage").empty().append(data);
                },
                    error:function(msg){
                       console.log(msg.statusText);
                    }
            }); 
    }
})(window);


