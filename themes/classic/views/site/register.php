
<header class="jumbotron subhead title" id="overview">
    <h1>嘿嘿网</h1>
    <p class="lead">未来最大的社交网站之一。</p>
</header>
<div class="imgshow">
    <div id="banner">
        <img class="img" src="<?php echo Yii::app()->theme->baseUrl . '/images/slide-' . rand(1, 4) . '.jpg'; ?>" alt="" />
    </div>
    <div id="btn_num" style="display: block; margin-top: -21px; z-index: 20"></div>
</div>
<div class="login">
     <form id="register"action="/heihei/site/register" method="post">
        <fieldset>
            <legend>注册</legend>
            <label>注册邮箱</label>
            <input name="email" type="email" placeholder="邮箱" required>
            <label>创建密码</label>
            <input id="password" name="password" type="password" placeholder="请输入密码" required>
            <label>重复密码</label>
            <input id="repassword" name="repassword" type="password" placeholder="请再次输入密码" required>
            <label>真实姓名</label>
            <input name="realname" type="text" placeholder="请输入姓名" required>
            <label>性别</label>
            <input name="sex" type="radio" value="male" checked="checked">男
            <input name="sex" type="radio" value="female" >女
            <label class="checkbox">
            <button type="submit" class="btn linebox" style="margin: 25px;">立刻注册</button>
        </fieldset>
    </form>
</div>
<script>
    ;( function () {
       if(   <?php echo $error ?>)
             alert("注册失败，请正确填写信息");
    })();
</script>