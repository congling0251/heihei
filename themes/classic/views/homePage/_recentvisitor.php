<div id="visitor" class="visitor well">
    <button class="close" name="close" onclick="closediv()">&times;</button>
    <legend>
        <small>
            <i class="icon-user"></i>
        </small>
        <small>最近访客</small>
        <small id="vcount" >   <?php echo count($recentvisitors); ?></small>
    </legend>
    <div class="visitorphoto">
        <?php if (count($recentvisitors) > 0): ?>
            <?php foreach ($recentvisitors as $recentvisitor): ?>
                <a href="<?php echo Yii::app()->createUrl('HomePage/index?id='.$recentvisitor->visitid); ?>">
                    <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/' . (isset($recentvisitor->visitor->headphoto)?$recentvisitor->visitor->headphoto:'head.jpeg'); ?>" title="<?php echo $recentvisitor->visitor->username; ?>" class="img-polaroid visitorimg">
                </a>
                <?php echo $recentvisitor->visitor->username; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>