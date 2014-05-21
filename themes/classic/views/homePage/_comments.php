
<?php if(count($comments)>0): ?>
	<?php foreach($comments as $comment): ?>
		<div class="commentdetail" id="c<?php echo $comment->commentid; ?>">
			<div class="author">
				<a href="<?php echo Yii::app()->createUrl('HomePage/index?id='.$comment->userid); ?>">
                    <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/' . (isset($comment->user->headphoto)?$comment->user->headphoto:'head.jpeg'); ?>"  class="img-polaroid visitorimg">
                </a>
				<span class="author_name"><?php echo $comment->user->realname; ?></span>
				<span>:<?php echo nl2br(CHtml::encode($comment->comment)); ?></span>
			</div>

			<div class="time">
				<?php echo date('Y年n月j日 H时i分s秒',$comment->comment_date); ?>
				<div class="pull-right pointer">
                        <a class="comment_reply" data-id="<?php echo $comment['commentid']; ?>">回复</a>
                </div>
			</div>
		</div><!-- comment -->
	<?php endforeach; ?>
<?php endif; ?>
<div class="commentEdit">
    <form>
        <textarea  class="heicomment" rows="3" maxlength="255"></textarea>
        <button class="comment_btn btn pull-right" type="button">评论</button>
    </form>
</div>