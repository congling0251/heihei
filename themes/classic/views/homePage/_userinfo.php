    <div id="userinfo" class="userinfo well">
        <button class="hh_layout close" name="close">&times;</button>
        <a href="#">
            <img id="headphoto" class="headphoto" src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/'. ($model->headphoto?$model->headphoto:'head.jpeg'); ?>" align="absmiddle" alt="头像" title="头像" class="LargePortrait"></a>
        <span class="useredit">
            <!-- 长度范围，6个中文字符或14个英文字符 -->
            <a  id="username" class="username text-center" title="真实姓名" href="<?php echo !isset($visitorflag) ? (Yii::app()->createUrl('HomePage/EditUserInfo')):'#'; ?>">
               <?php echo $model->realname; ?>
            </a>
            <?php if (!isset($visitorflag) || !$visitorflag): ?>
                <span class="opts">
                    <a href="<?php echo Yii::app()->createUrl('HomePage/EditUserInfo'); ?>"> <i class="icon-edit"></i>修改资料
                    </a>
                    <a href="<?php echo Yii::app()->createUrl('HomePage/EditUserInfo'); ?>"> <i class="icon-picture"></i>更换头像
                    </a>
                </span>
            <?php endif; ?>
        </span>
        <div class="stat">
            <hr/>
            <a class="lbox" href="javascript:void(0);">关注(8)</a>
            <a class="lbox" href="#">粉丝(2)</a>
            <a class="lbox" href="<?php echo Yii::app()->createUrl('friend/friend'); ?>">好友</a>
            <a class="lbox" href="#">等级(1)</a>
        </div>
    </div>