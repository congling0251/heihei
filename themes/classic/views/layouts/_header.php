<?php
        $clientScript = Yii::app()->ClientScript;
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap-responsive.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/awesome.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/SLideShow.css');
		 $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/jquery-ui-1.10.3.custom.min.css');
?>
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
				<a class="brand" href="<?php echo Yii::app()->createUrl('HomePage/index'); ?>">嘿嘿</a>
				<ul class="nav homebar">
					<li class="active">
						<a href="<?php echo Yii::app()->createUrl('HomePage/index'); ?>">个人主页</a>
					</li>
					<li class="">
						<a href="<?php echo Yii::app()->createUrl('friend/friend/index'); ?>">嘿友</a>
					</li>
					<li class="dropdown" id ="setLauout">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							设置 <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a id="modifyui" tabindex="-1" onclick="showclosebutton()">删除模块</a>
								<a id="addui" tabindex="-1" onclick="addui()">增加模块</a>
								<a id="saveui" tabindex="-1" onclick="addsave()">保存界面</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							帐号中心 <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a tabindex="-1" href="<?php echo Yii::app()->createUrl('HomePage/EditUserInfo'); ?>">帐号修改</a>
							</li>
							<li>
								<a tabindex="-1" href="<?php echo Yii::app()->createUrl('HomePage/changePassword'); ?>">安全设置</a>
							</li>
							<li class="divider"></li>
							<li>
								<a tabindex="-1" href="<?php echo Yii::app()->createUrl('site/logout'); ?>">退出</a>
							</li>
						</ul>
					</li>
				</ul>
				<form class="form-search">
					<div class="input-append input-small">
						<input type="text" class="span2 search-query">	
						<button type="submit" class="btn"> <i class="icon-search"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    <script>
    if(!('<?php echo $this->uniqueId;  ?>'==='homePage' ))
        $("#setLauout").addClass("hide");
    </script>