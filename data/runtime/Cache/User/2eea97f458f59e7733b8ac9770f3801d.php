<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>跳转提示</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/error.css" type="text/css">
		<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.3.min.js"></script>
	</head>
	<body>
	<!--头部-->	
	<div class="layout">
		<div class="inner">
			<div class="box clearfix">
			<div class="left fl"><img src="/tpl/simplebootx/Public/images/face.gif"/></div>
			<div class="right fl">
				<?php if(isset($message)): ?><p class="big" style="font-size:24px"><?php echo($message); ?></p>
				<br/><br/>
				<?php else: ?>
				<p class="big" style="font-size:24px"><?php echo($error); ?></p>
				<br/><br/><?php endif; ?>
				<p class="small link">页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： 	<b id="wait"><?php echo($waitSecond); ?></b>
				</p>
				<br>
				<p class="link"><a href="<?php echo($jumpUrl); ?>">>>返回</a></p>
			</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		(function(){
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		var interval = setInterval(function(){
			var time = --wait.innerHTML;
			if(time <= 0) {
				location.href = href;
				clearInterval(interval);
			};
		}, 1000);
		})();
	</script>
	</body>
</html>