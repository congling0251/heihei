<div class="footer">
	<div class="container">CopyRight@2013 上海大学 10122445 张树飞
</div>
<?php
        $clientScript = Yii::app()->ClientScript;
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery-1.11.0.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/bootstrap.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery-ui-1.10.4.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery.ui.core.js' );

        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/home.js' );
        $clientScript -> registerScriptFile(Yii::app() -> theme -> baseUrl . '/js/friends.js');

?>