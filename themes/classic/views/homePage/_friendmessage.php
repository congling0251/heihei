    <?php if ($friendmessage!= null): ?>
        <?php foreach ($friendmessage as $message): ?>
<div class="amessage">
    <div class="heiyouphoto pull-left">
        <a href="#">
            <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/' . (isset($message['headphoto'])?$message['headphoto']:'head.jpeg'); ?>" title="路人A" class="img-polaroid messageheadphoto"></a>
    </div>
    <div class="heiyoumessage pull-left"> <strong><a href="<?php echo Yii::app()->createUrl('HomePage/index?id='.$message['userid']); ?>"><?php echo $message['username']; ?></a></strong> 
        <p style="width: 300px;WORD-BREAK: break-all; WORD-WRAP: break-word">
          <?php echo $message['message']; ?>
        </p>
        <div class="messageinfo pull-left">
            <a href="#"><?php echo date('F j, Y \a\t h:i a',$message['message_date']); ?></a>
            <div class="pull-right">
                <a>转发(<?php echo ($message['forward_amount']==0)?0:$message['forward_amount']; ?>)</a>
                <i class="S_txt3">|</i>
                <a >评论(<?php echo ($message['comment_amount']==0)?0:$message['comment_amount']; ?>)</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php endforeach; ?>
                <?php else :{
               echo '<div>没有新消息</div>';
            }?>
    <?php endif; ?>