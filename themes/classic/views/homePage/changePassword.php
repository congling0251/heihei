
<div class="changePassword_form well">
    <form id="changePassword_form" action="changePassword" method="post">
        <fieldset>
            <legend>修改密码</legend>
            <label>旧密码</label>
            <input name="password" onblur="pcheck(this)" type="password" placeholder="请输入旧密码">
            <span class="perror"></span>
               <label>新密码</label>
            <input name="newpassword" onblur="npcheck(this)" type="password" placeholder="请输入新密码">
            <span  class="nperror"></span>
            <label>重复密码</label>
            <input name="repassword" onblur="rpcheck(this)" type="password" placeholder="请再输入一次密码">
            <span  class="rperror"></span>
            <button type="submit" onclick="ajaxform()" class="btn linebox" style="margin: 25px;float: left">修改密码</button>
        </fieldset>
    </form>
</div>
<script>
     function ajaxform(){
        info_submit($("#changePassword_form"), function(data){
            alert(data.msg);
        });
        return false;
    };
    var $newpassword =$("[name='newpassword']");
    var $repassword =$("[name='repassword']");
    var $formdiv =$(".changePassword_form");
    function pcheck(e){
        if(e.value==="")
            $formdiv.find(".perror").html("旧密码不能为空！");
        else
            $formdiv.find(".perror").empty();
    };
    function npcheck(e){
        if(e.value==="")
            $formdiv.find(".nperror").html("新密码不能为空！");
        else
            $formdiv.find(".nperror").empty();
    };
    function rpcheck(e){
        if(e.value==="")
            $formdiv.find(".rperror").html("密码不能为空！");
        else if(e.value!== $newpassword.val())
            $formdiv.find(".rperror").html("两次密码必须一致！");
        else
            $formdiv.find(".rperror").empty();
    };
    function info_submit(frm, fn){
       var dataPara = getFormJson(frm);
         $.ajax({
	        url: frm.action,
	        type:frm.method,
	        data : dataPara ,
                datatype:'json',
                success: fn
	    }); 
    }
//将form中的值转换为键值对。
function getFormJson(frm) {
    var o = {};
    var a = $(frm).serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });

    return o;
}

</script>
    