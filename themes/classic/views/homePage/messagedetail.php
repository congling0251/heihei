
    <div class="heiyouphoto pull-left">
        <a href="#">
            <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/' . (isset($model->user->headphoto)?$model->user->headphoto:'head.jpeg'); ?>" title="头像" class="img-polaroid messageheadphoto"></a>
    </div>
    <div class="heiyoumessage pull-left"> <strong><a href="<?php echo Yii::app()->createUrl('HomePage/index?id='.$model->user->userid); ?>"><?php echo $model->user->realname; ?></a></strong> 
        <p>
          <?php echo $model->message; ?>
        </p>
        <div class="messageinfo pull-left">
            <span><?php echo date('Y年n月j日 H时i分s秒',$model->message_date); ?></span>
            <div class="pull-right">
                <a onclick="forwardmessge()">转发(<?php echo ($model->forward_amount==0)?0:$model->forward_amount; ?>)</a>
                <i class="S_txt3">|</i>
                <a href="<?php echo Yii::app()->createUrl('HomePage/message?messgeid='.$model->messageid); ?>">评论(<?php echo ($model->comment_amount==0)?0:$model->comment_amount; ?>)</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<div id="comments">
	<?php if($model->$comment_amount>=1): ?>
		<h3>
			<?php echo $model->$comment_amount>1 ? $model->$comment_amount . ' 条评论' : '还么有评论'; ?>
		</h3>

		<?php $this->renderPartial('_comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>评论</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>

	<?php endif; ?>

</div><!-- comments -->
