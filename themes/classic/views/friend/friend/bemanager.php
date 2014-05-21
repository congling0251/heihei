<div id="befriendManage" class="pull-left" style="width: 500px;">
	<legend>全部粉丝</legend>
  <?php if (count($befriends) > 0): ?>
        <?php foreach ($befriends as $index => $befriend): ?>
                <div class="thumbnail friends pull-left sefriend">
                    <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/'.(isset($befriend->user->headphoto) ? $befriend->user->headphoto : 'head.jpeg'); ?>" class="img-polaroid pull-left recommend">
                    <blockquote>
                        <a href="<?php echo Yii::app()->createUrl('HomePage/index?id='.$befriend['userid']); ?>">
                            <strong><?php echo isset($befriend->user->realname) ? $befriend->user->realname:''; ?></strong>
                        </a>
                        <small><?php echo isset($befriend->user->college) ? $befriend->user->college : ''; ?></small>
                        <small><?php echo isset($befriend->user->company) ? $befriend->user->company : ''; ?></small>
                    </blockquote>
                </div>
        <?php endforeach; ?>
    <?php
    else : {
            echo '<div>您还没有粉丝</div>';
        }
        ?>
<?php endif; ?>
</div>