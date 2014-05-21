<?php
        $clientScript = Yii::app()->ClientScript;
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/friends.css');

?>
<div class="left">
    <?php
    echo $this->renderPartial(
            '//homePage/_userinfo', array(
                'model' => $model,
                'myfriendNum' =>$myFriendNum,
                'befriendNum'=>$beFriendNum
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
		<li><a href="#addfriends">添加好友</a></li>
		<li><a href="#manager">好友管理</a></li>
        <li><a href="#bemanager">粉丝管理</a></li>
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
    <div id="bemanager">
     <?php
    echo $this->renderPartial(
            'bemanager', array(
            'befriends' => $befriends
            )
    );
    ?>
    </div>
</div>