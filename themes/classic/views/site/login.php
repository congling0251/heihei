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
     <form action="/heihei/site/login" method="post">
        <fieldset>
            <legend>登录</legend>
            <label>用户邮箱</label>
            <input name="LoginForm[username]" type="text" placeholder="用户名">
            <label>密码</label>
            <input name="LoginForm[password]" type="password" placeholder="请输入密码">
            <label class="checkbox">
            <input name="LoginForm[rememberMe]" type="checkbox">下次自动登录</label>
            <button type="submit" class="btn linebox margin_25">登录</button>
            <a  class="btn linebox margin_25" id="register_button"  href="/heihei/site/register">注册</a>
        </fieldset>
    </form>
</div>
<?php
if($error) {
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'errorDialog',//弹窗ID
    // additional javascript options for the dialog plugin
    'options'=>array(//传递给JUI插件的参数
        'title'=>'错误',
        'autoOpen'=>true,//是否自动打开
        'width'=>'auto',//宽度
        'height'=>'auto',//高度
        'buttons'=>array(
            '关闭'=>'js:function(){ $(this).dialog("close");}',//关闭按钮
        ),

    ),
));
echo '您输入的用户名或者密码错误，请重新输入！';
$this->endWidget('zii.widgets.jui.CJuiDialog');
}
?>