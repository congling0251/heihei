<div id="friendResult" class="pull-left" style="width: 500px;">
    <?php if (count($sefriends) > 0): ?>
        <?php foreach ($sefriends as $index => $sefriend): ?>
                <div class="thumbnail friends pull-left sefriend">
                    <img src="<?php echo Yii::app()->theme->baseUrl . '/images/uploads/'.(isset($sefriend['headphoto']) ? $sefriend['headphoto']: 'head.jpeg'); ?>" class="img-polaroid pull-left recommend">
                    <blockquote>
                        <strong><?php echo isset($sefriend['username']) ? $sefriend['username']:''; ?></strong>
                        <small><?php echo isset($sefriend['college']) ? $sefriend['college'] : ''; ?></small>
                        <small><?php echo isset($sefriend['company']) ? $sefriend['company'] : ''; ?></small>
                        <a class="addFriend" data-id="<?php echo isset($sefriend['userid'])?$sefriend['userid'] : '0'; ?>">
                            <i class="icon-plus"></i>
                            加为嘿友
                        </a>
                    </blockquote>
                </div>
        <?php endforeach; ?>
    <?php
    else : {
            echo '<div>没有搜到好友</div>';
        }
        ?>
<?php endif; ?>
</div>
<div class="pull-left well">
    <legend>筛选条件</legend>
    <form form>
        <label class="inline">姓名</label>
        <input id="newfriendname" type="text" class="input-large" placeholder="你想要找谁？">
        <input id="name_serchfriend" type="button"  value="查找">
                <hr/>
        <strong>按照资料查找</strong>
        <hr/>
        <label>性别</label>
        <select id="gender">
            <option value="male">男</option>
            <option value='female'>女</option>
        </select>
        <label>大学</label>
        <input id="school" type="text" class="input-large" placeholder="选择大学">
        <label>公司</label>
        <input id="company" type="text" class="input-large" placeholder="选择公司">
         <input id="detail_serchfriend" type="button" value="查找">
    </form>
</div>