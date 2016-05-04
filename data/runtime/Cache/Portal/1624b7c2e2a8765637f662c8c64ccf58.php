<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>觅房网房产分销平台</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/login_1.css" type="text/css">
		<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.3.min.js"></script>
		<style>
			body { overflow:-Scroll;overflow-x:hidden}
		</style>
	</head>
	<body>
		<div class="top layout clearfix">
			<a href="index.html" class="fl"><img src="/tpl/simplebootx/Public/images/logo.gif" alt=""></a>
			<div class="btns fr">
				<?php if(!empty($_SESSION['loginname'])): ?><div class="loginIn">
						<a href="" id="username"><?php echo (session('loginname')); ?></a>
						<div id="personMsg" style="display: none;">
						<?php if(($_SESSION['r_id'] == 1) OR empty($_SESSION['r_id'])): ?><a target="_self" href="<?php echo U('Myclient/index');?>">我的客户</a>
							<a target="_self" href="<?php echo U('Commission/index');?>">佣金结算</a>
							<!-- <a target="_self" href="<?php echo U('Index/home');?>">经纪人中心</a> -->
						<?php elseif($_SESSION['r_id'] == 2): ?>
							<a target="_self" href="<?php echo U('Fang/index');?>">我的房源</a>
						<?php elseif($_SESSION['r_id'] == 3): ?>
							<a target="_self" href="<?php echo U('Broker/index');?>">我的经纪人</a>
							<a target="_self" href="<?php echo U('Broker/add');?>">增加经纪人</a><?php endif; ?>
						</div>
						<a href="<?php echo U('Login/logout');?>">退出登录</a>
					</div><?php endif; ?>
			</div>
		</div>
		<div class="menu">
			<div class="layout menubar">
				<ul>
				<?php if(($_SESSION['r_id'] == 1) OR empty($_SESSION['r_id'])): ?><li><a href="<?php echo U('Index/index');?>">首页</a></li>
					<li><a href="<?php echo U('Fxlp/index');?>"  target="_self">分销楼盘</a></li>
					<li><a href="<?php echo U('Myclient/index');?>" target="_self">我的客户</a></li>
					<li><a href="<?php echo U('Distribution/index');?>" target="_self">分销规则</a></li>
					<li><a href="<?php echo U('Commission/index');?>" target="_self">佣金结算</a></li>
				<?php elseif($_SESSION['r_id'] == 2): ?>
					<li><a href="<?php echo U('Index/index');?>">首页</a></li>
					<li><a href="<?php echo U('Fxlp/index');?>"  target="_self">分销楼盘</a></li>
					<li><a href="<?php echo U('Fang/index');?>" target="_self">我的房源</a></li>
					<li><a href="<?php echo U('Distribution/index');?>" target="_self">分销规则</a></li>
				<?php elseif($_SESSION['r_id'] == 3): ?>
					<li><a href="<?php echo U('Index/index');?>">首页</a></li>
					<li><a href="<?php echo U('Fxlp/index');?>"  target="_self">分销楼盘</a></li>
					<li><a href="<?php echo U('Broker/index');?>" target="_self">我的经纪人</a></li>
					<li><a href="<?php echo U('Distribution/index');?>" target="_self">分销规则</a></li><?php endif; ?>
				</ul>
			</div>
		</div>
	<!-- //正文开始 -->
		<div class="layout ">
			<div class="box clearfix mt10 mb10">
				<div class="left ">
					<form action="<?php echo U('Login/doLogin');?>" method="post"  id="_form">
						<p>
							<span>用&nbsp;户&nbsp;名：</span>
							<input type="text" name="name" class="input1 txt" placeholder="请填写手机号码" onfocus="this.className='input2'" onblur="this.className='input1'"  autocomplete="off"  value="">
						</p>
						<p>
							<span>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</span>
							<input type="password"  class="input1 txt" placeholder="请填写密码" onfocus="this.className='input2'" onblur="this.className='input1'"  autocomplete="off" name="password"/>
						</p>
						<p>
							<span>验&nbsp;证&nbsp;码：</span>
							<input type="text"  class="input1 txt" placeholder="请填写验证码" onfocus="this.className='input2'" onblur="this.className='input1'"  autocomplete="off"  name="captcha"/>
						</p>
						<p>
							<span></span>
							<img src="<?php echo U('Login/captcha');?>" alt="" onclick="refresh(this)" style="cursor:pointer"/>
						</p>
						<p>
							<span></span>
							<input type="checkbox" name="chk" id="chk" value="2"  checked="checked"/>
							<label for="chk">下次自动登录</label>
						</p>
						<p class="btns">
							<span></span>
							<a href="javascript:void(0)" onclick="document.getElementById('_form').submit();" id="loginBtn">登录</a>&nbsp;
							<a href="<?php echo U('Login/forgetpwd');?>" class="forgetpwd">忘记密码？</a>
						</p>
					</form>
				</div>
				<div class="center"></div>
				<div class="right">
					<p>还没有觅房网账号？</p>
					<p><a href="<?php echo U('Login/reg');?>" id="regisBtn">注册新用户</a></p>
				</div>
			</div>
		</div>
		<div style="height:220px;"></div>
	<script type="text/javascript">
		$(function(){
			if($("[name='chk']").attr("checked")){
				$("#chk").val('1');
			}
			//获取选中复选框的值
			var value=$("#chk").val('2');
			// 固定footer
			var h = $(document.body).height();
			var _height = $(window).height();
			var changecss = {
				position:"absolute",
				bottom:"0"
			};
			if(h<=_height){
				$(".footer").css(changecss);
			}
		});
		function refresh(obj){
  		  obj.src="<?php echo U('Login/captcha');?>&id="+Math.random();


		}
	</script>
		  <div class="footer">
      <p class="p1">
          <a href="#">关于我们</a>&nbsp;|
          <a href="#">联系我们</a>&nbsp;|
          <a href="#">加入我们</a>&nbsp;|
          <a href="#">用户协议</a>&nbsp;|
          <a href="#">觅房微博</a>&nbsp;|
          <a href="#">觅房团</a>&nbsp;|
          <a href="#">网站地图</a>&nbsp;|
          <a href="#">楼盘导航</a>&nbsp;|
      </p>
    <p class="p2">客服热线：400-0608956&nbsp;&nbsp;
        <a href="tencent://message/?uin=2407573530&Site=fx.imifang.net&Menu=yes" style="color:#fff" class="kf">QQ客服：2407573530&nbsp;<img src="http://wpa.qq.com/pa?p=1:2407573530:4" border="0" alt="QQ" style="vertical-align:middle"></a>
    </p>
    <p class="p3">Copyright © 2011-2014 All Rights Reserved 广联智慧 版权所有 鄂ICP备15006602号</p>
</div>
	</body>
</html>