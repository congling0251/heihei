<div class="footer">
	<div class="container">CopyRight@2013 上海大学 10122445 张树飞
</div>
<?php
        $clientScript = Yii::app()->ClientScript;
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap-responsive.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/awesome.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/SLideShow.css');
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery-1.10.1.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/bootstrap.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery-ui-1.10.3.custom.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery.ui.core.js' );

        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/home.js' );
        $clientScript -> registerScriptFile(Yii::app() -> theme -> baseUrl . '/js/friends.js');

?>