<div class="left">
     <?php 
        if ( strpos($layout, 'userinfo') > -1)
            echo $this->renderPartial(
                    '_userinfo', array(
                        'model' => $model,
                		'visitorflag'=>$visitorflag
                    )
            );
    ?>
    <?php if ( strpos($layout, 'userstatus') > -1): ?>
        <div id="userstatus" class="userstatus well">
            <button class="hh_layout close" name="close">&times;</button>
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $message,
                'itemView' => '_messagelist',
                'template' => "{items}\n{pager}",
            ));
            ?>
        </div>
    <?php endif; ?>
</div>
<div class="middle">
    <?php if ( strpos($layout, 'usermessage') > -1)
        echo $this->renderPartial('_message');
    ?>
    <div class="allmessages">
       
    	<a class="notes" id="newnote_show" href="<?php echo Yii::app()->createUrl('HomePage/index?id='.$model->userid); ?>"></a>
        <div id="myfriendmessage">
            <?php if ( strpos($layout, 'usermessage') > -1)
            echo $this->renderPartial('_friendmessage', array(
                'friendmessage' => $friendmessage
            ));
            ?>
        </div>
        <div class="clearfix"></div>
    </div>
        <hr/>
        <ul class="pager">
            <li>
                <a onclick="moremessage('<?php echo Yii::app()->createUrl('HomePage/moreFriendmessage'); ?>')">更多</a>
            </li>
        </ul>
</div>
<div class="right">
    <?php
    echo $this->renderPartial('_recentvisitor', array(
        'recentvisitors' => $recentvisitors,
        'model' => $model
    ));
    ?>
    <?php
    echo $this->renderPartial('//friend/friend/_friends', array(
        'prefriends' => $prefriends
    ));
    ?>
</div>
<!-- 模态对话框 -->
<div id="chooseset" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">请选择</h3>
    </div>
    <div class="modal-body">
        <strong>你要增加什么模块？</strong>
        <label class="checkbox">
            <input id="cb1" type="checkbox"> 用户信息
        </label>
        <label class="checkbox">
            <input id="cb2" type="checkbox"> 嘿嘿状态
        </label>
        <label class="checkbox">
            <input id="cb3"type="checkbox"> 嘿一记
        </label>
        <label class="checkbox">
            <input id="cb4" type="checkbox"> 来访信息
        </label>
        <label class="checkbox">
            <input id="cb5" type="checkbox"> 推荐嘿友
        </label>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
        <button class="btn btn-primary" id="layout_add_save">确定</button>
    </div>
</div>
<div id="saveok" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">提示</h3>
    </div>
    <div class="modal-body">
        <strong>界面修改保存成功！</strong>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
        <!-- <button class="btn btn-primary">Save changes</button> -->
    </div>
</div>
<div id="nosthsave" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">提示</h3>
    </div>
    <div class="modal-body">
        <strong>没有模块被修改。</strong>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
        <!-- <button class="btn btn-primary">Save changes</button> -->
    </div>
</div>

<?php
$layoutList = Array("userinfo", "userstatus", "usermessage", "visitor", "heiyoupanel");
echo "<script>
	";
foreach ($layoutList as $l) {
    if (strpos($layout, $l) > -1)
        echo "$(\"#{$l}\").css('display','block');";
    else {
        echo "$(\"#{$l}\").css('display','none');";
    }
}
echo "
</script>
";
?>