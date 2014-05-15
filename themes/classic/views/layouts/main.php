<?php
        $clientScript = Yii::app()->ClientScript;
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap-responsive.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/awesome.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/SLideShow.css');
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>嘿嘿网</title>
	<script type="text/javascript">
	// $(document).ready(function() {
	// 		//判断是否为IE
	// 		if(!!(window.attachEvent && navigator.userAgent.indexOf('Opera') === -1))
	// 		$("#btn_num").css({
	// 			"display":"none"
	// 		});
	// 	});
	// })
	// jQuery(function(){
	// 	var offset = $("#banner").offset();
	// 	$("#btn_num").css({ "top":offset.top-100  ,  "left":offset.left -160 });
	// 	jQuery('#banner').cycle({ 
	// 			fx:'scrollLeft',
	// 			pager:'#btn_num'
	// 	});
	// })
	</script>
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
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery-1.11.0.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/login.js' );

?>
</body>

</html>