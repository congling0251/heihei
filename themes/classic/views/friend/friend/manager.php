<div id="friendManage" class="pull-left" style="width: 500px;">
	<legend>全部好友</legend>
  <?php if (count($myfriends) > 0): ?>
        <?php foreach ($myfriends as $index => $myfriend): ?>
                <div class="thumbnail friends pull-left sefriend">
                    <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/'.(isset($myfriend->headphoto) ? $myfriend->headphoto : 'head.jpeg'); ?>" class="img-polaroid pull-left recommend">
                    <blockquote>
                        <a href="<?php echo Yii::app()->createUrl('HomePage/index?id='.$myfriend['userid']); ?>">
                            <strong><?php echo isset($myfriend->realname) ? $myfriend->realname:''; ?></strong>
                        </a>
                        <small><?php echo isset($myfriend->college) ? $myfriend->college : ''; ?></small>
                        <small><?php echo isset($myfriend->company) ? $myfriend->company : ''; ?></small>
                        <a class="deleteFriend" data-id="<?php echo isset($myfriend->userid)?$myfriend->userid:''; ?>">
                            <i class="icon-plus"></i>
                            删除嘿友
                        </a>
                    </blockquote>
                </div>
        <?php endforeach; ?>
    <?php
    else : {
            echo '<div>您还没有好友好友</div>';
        }
        ?>
<?php endif; ?>
</div>