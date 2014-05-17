<div id="visitor" class="visitor well">
    <button class="hh_layout close" name="close">&times;</button>
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
                    <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/' . (isset($recentvisitor->visitor->headphoto)?$recentvisitor->visitor->headphoto:'head.jpeg'); ?>" title="<?php echo date('Y年n月j日 h时i分s秒',$recentvisitor->visitors_date); ?>" class="img-polaroid visitorimg">
                </a>
                <span><?php echo $recentvisitor->visitor->realname; ?></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>