<?php
        $clientScript = Yii::app()->ClientScript;
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/friends.css');

?>
<div class="left">
    <?php
    echo $this->renderPartial(
            '//homePage/_userinfo', array(
        'model' => $model
            )
    );
    ?>
    <?php
    echo $this->renderPartial('_friends', array(
        'prefriends' => $prefriends
    ));
    ?>
</div>
<div id="friendtabs" class="big-right">
	<ul>
		<li><a>好友</a></li>
		<li><a href="#addfriends">添加好友</a></li>
		<li><a href="#manager">好友管理</a></li>
	</ul>
  <div id="addfriends">
      <?php
    echo $this->renderPartial(
            'addfriends', array(
        'sefriends' => $sefriends
            )
    );
    ?>
 </div>
  <div id="manager">
     <?php
    echo $this->renderPartial(
            'manager', array(
        'myfriends' => $myfriends
            )
    );
    ?>
 </div>
</div>
<script>
$(document).ready(function(){
	var _ajax =function(_url){
		$.ajax({
		url: _url,
		type:"POST",
		dataType:'html',
		success:function(data){
					_showData(data);
				}
		});
	};
    $( "#friendtabs" ).tabs();
});
</script>
