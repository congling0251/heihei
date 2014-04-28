<?php
$clientScript = Yii::app()->ClientScript;
// register app script
$clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/login.js');
?>
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
     <form action="/heihei/site/register" method="post">
        <fieldset>
            <legend>注册</legend>
            <label>注册邮箱</label>
            <input name="email" type="email" placeholder="邮箱">
            <label>创建密码</label>
            <input name="password" type="password" placeholder="请输入密码">
            <label>真实姓名</label>
            <input name="username" type="text" placeholder="请输入姓名">
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
             alert("该邮箱已经注册，请重新输入！");
    })();
</script>