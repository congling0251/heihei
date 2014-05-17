<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>嘿嘿网</title>
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo Yii::app()->createUrl('homepage/index'); ?>">嘿嘿</a>
				<p class="text-left slogan">在这里遇见更多的朋友。</p>
			</div>
		</div>
	</div>
	<div class="container mainlogin">
    <?php echo $content;?>
	</div>

<div class="footer">
	<div class="container">CopyRight@2014 上海大学 10122445 张树飞</div>
</div>
<?php
    $clientScript = Yii::app()->ClientScript;
    $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/login.js' );
?>
</body>

</html>