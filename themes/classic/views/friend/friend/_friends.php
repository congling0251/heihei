<div id="heiyoupanel" class="heiyoupanel well">
    <button class="close" name="close" onclick="closediv()">&times;</button>
    <legend>
        <small>可能认识的嘿友哦！</small>
    </legend>
    <?php if ($prefriends!= null): ?>
        <?php foreach ($prefriends as $prefriend): ?>
            <div class="heiyou">
                <img style ="margin-left:10px;margin-bottom:10px"src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/' . (isset($prefriend['headphoto'])?$prefriend['headphoto']:'head.jpeg'); ?>" class="img-polaroid pull-left recommend">
                <blockquote>
                    <strong><?php echo isset($prefriend['username'])?$prefriend['username']:''; ?></strong>
                    <small><?php echo isset($prefriend['college'])?$prefriend['college']:''; ?></small>
                    <br/>
                    <small><?php echo isset($prefriend['company'])?$prefriend['company']:''; ?></small>
                    <a class="addFriend" data-id =<?php echo isset($prefriend['userid'])?$prefriend['userid'] : '0'; ?>" >
                        <i class="icon-plus"></i>
                        加为嘿友
                    </a>
                </blockquote>
            </div>
            <hr/>
        <?php endforeach; ?>
                <?php else :{
               echo '<div>没有可能的好友</div>';
            }?>
    <?php endif; ?>
</div>