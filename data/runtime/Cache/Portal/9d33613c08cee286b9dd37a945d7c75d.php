<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>觅房网房产分销平台</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
	<link rel="stylesheet" href="/tpl/simplebootx/Public/css/mima.css" type="text/css">
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
	<div class="layout">
		<p class="mm-txt mt10">找回密码</p>
		<div class="mt15">
			<div id="mm-1">
				<div>
					<img src="/tpl/simplebootx/Public/images/01.jpg" alt="">
				</div>
				<div class="mm-form">
					<form action="" >
						<span>输入手机号：</span>
						<input class="mtel-1" type="text" maxlength="11" placeholder="请输入手机号码">
						<span class="error-txt"></span><br>
						<span>验证码：</span>
						<input class="mcode-1" type="text" placeholder="请输入验证码">
						<span class="error-txt">验证码不能为空</span><br>
						<img src="<?php echo U('Login/captcha');?>" onclick="refresh(this)" alt="验证码"><br>
						<a href="javascript:void(0);"  class="next" >下一步</a>
					</form>
				</div>	
			</div>
			<div id="mm-2">
				<div>
					<img src="/tpl/simplebootx/Public/images/02.jpg" alt="">
				</div>
				<div class="mm-form form">
					<form action="">
						<span>手机号码：</span>
						<input class="mtel-2" type="text" readonly maxlength="11" placeholder="请输入手机号">
						<span class="error-txt"></span><br>
						<span>验证码：</span>
						<input class="mcode-2" type="text" placeholder="请输入验证码">
						<mark id="mtime">获取验证码</mark>
						<span class="error-txt">验证码不能为空</span><br>
						<a href="javascript:void(0);"class="next_1">下一步</a>
					</form>
				</div>	
			</div>
			<div id="mm-3">
				<div>
					<img src="/tpl/simplebootx/Public/images/03.jpg" alt="">
				</div>
				<div class="mm-form">
					<form action="">
						<span>密码：</span>
						<input class="mmm" type="password" placeholder="请输入新密码">
						<span class="error-txt"></span><br>
						<span>确认密码：</span>
						<input class="mmmdd" type="password" placeholder="请再次输入密码">
						<span class="error-txt"></span><br>
						<a href="javascript:void(0);" class="next_2">下一步</a>
					</form>
				</div>	
			</div>
			<div id="mm-4">
				<div>
					<img src="/tpl/simplebootx/Public/images/04.jpg" alt="">
				</div>
				<div class="mm-login">
					<img src="/tpl/simplebootx/Public/images/gou.png" alt="">
					<span>恭喜您，新密码已经设置成功</span>
					<a href="<?php echo U('Login/login');?>">登录</a>
				</div>	
			</div>
		</div>
	</div>
	<!-- 底部 -->
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
<script>
	//验证码
	function refresh(obj){
	  obj.src="<?php echo U('Login/captcha');?>&id="+Math.random();
	};

	$('.next').click(function(){
		var tel= $(".mtel-1").val();
		var captcha = $(".mcode-1").val();
	  	$.ajax({
		         type: "POST",
		         url: "<?php echo U('Login/GetPwd');?>",
		         dataType:'text',
		         data: {loginname:tel,captcha:captcha},
		         success: function(data){
			         	if(data == "1"){
			         		$('#mm-1').hide().next().show();
			         		// 赋值给手机2
					var tel = $(".mtel-1").val();
					$(".mtel-2").val(tel);
			         	}else{
				      alert(data);	
			         	}
		         	}
		});
	})

	$('.next_1').click(function(){
		var code = $('.mcode-2').val();
		$.ajax({
		         type: "POST",
		         url: "<?php echo U('Login/GetPwd_two');?>",
		         dataType:'text',
		         data: {code:code},
		         success: function(data){
			         	if(data == "1"){
		         			$('#mm-2').hide().next().show();
			         	}else{
				     	 alert(data);	
			         	}
		         	}
		});
	})

	$('.next_2').click(function(){
		var loginname = $(".mtel-1").val();
		var password = $(".mmm").val();
		var rpassword = $(".mmmdd").val();
		$.ajax({
		         type: "POST",
		         url: "<?php echo U('Login/forpwd');?>",
		         dataType:'text',
		         data: {loginname:loginname,password:password},
		         success: function(data){
			         	if(data == "1"){
		         			$('#mm-3').hide().next().show();
			         	}else{
				     	 alert(data);	
			         	}
		         	}
		});
	})

	$(function(){
		/*$(".mm-form a").click(function(e){
			var $mmP = $(this).parent().parent().parent();
			if($(".mm-form").find("span").hasClass("error")){					
				e.preventDefault();
			}else if ($(this).parents(".mm-form").find("input").val()=="") {
				alert("请填写信息！");
				e.preventDefault();
			}else if($('.mcode-1').val() == ""){
				alert("请填写信息!");
				e.preventDefault();
			}else{		
				$mmP.next().show().siblings().hide();
			}
			// 赋值给手机2
			var tel = $(".mtel-1").val();
			$(".mtel-2").val(tel);
		})*/
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

		// 表单验证
		$(".mtel-1").blur(function(){
			reg=/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;

			if( $(".mtel-1").val()==""){ 
				$(this).next("span").html("请输入手机号").show().addClass("error");
			}else if($(".mtel-1").val().length<11){   
	        			$(this).next("span").html("手机号长度有误！").show().addClass("error");
	       		}else if(!reg.test($(".mtel-1").val())){   
	        			$(this).next("span").html("请输入正确的手机号！").show().addClass("error");
	        		}else{
	        			$(this).next("span").html("").show().removeClass("error");
	        		}
		})
		$(".mtel-2").blur(function(){
			reg=/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;

			if( $(".mtel-2").val()==""){ 
				$(this).next("span").html("请输入手机号").show().addClass("error");
			}else if($(".mtel-2").val().length<11){   
	        			$(this).next("span").html("手机号长度有误！").show().addClass("error");
	       		 }else if(!reg.test($(".mtel-2").val())){   
	        			$(this).next("span").html("请输入正确的手机号！").show().addClass("error");
	        		}else{
	        			$(this).next("span").html("").show().removeClass("error");
	        		}
		})
		$(".mmm").blur(function(){
			var Pmm = $(".mmm").val();
			if( Pmm ==""){
				$(this).next("span").html("请填写密码").show().addClass("error");
			}else if(Pmm.length>16 || Pmm.length<6){   
	        			$(this).next("span").html("密码应为6-16个字符").show().addClass("error");
	        		}else{
	        			$(this).next("span").html("").show().removeClass("error");
	        		}
		});
		$(".mmmdd").blur(function(){
			var Pmm = $(".mmm").val();
			var Pmmdd = $(".mmmdd").val();
			if( Pmmdd !== Pmm){
				$(this).next("span").html("密码不一致").show().addClass("error");
			}else{
	        			$(this).next("span").html("").show().removeClass("error");
	       		 }
		});

		 /*//获取短信验证码
		 var validCode=true;
		 $("#mtime").click(function(){
		 	var time=60;
		 	var code=$(this);
		 	if (validCode) {
		 		validCode=false;
		 		// code.addClass("msgs1");
		 	var t=setInterval(function  () {
		 		time--;
		 		code.html(time+"秒后重发");
		 		if (time==0) {
		 			clearInterval(t);
		 		code.html("重新获取");
		 			validCode=true;
		 		// code.removeClass("msgs1");
		 		}
		 	},1000)
		 	}
		 })*/
	})
</script>
<script language="javascript">
	$(function(){
		$('#mtime').click(function(e){
			e.preventDefault();
			get_mobile_code();
		});
	})
	function get_mobile_code(){
        		$.post("<?php echo U('Login/checkreg_verify');?>", {mp:jQuery.trim($('.mtel-2').val()),send_code:<?php echo $_SESSION['send_code'];?>}, function(msg) {
	           		 if(jQuery.trim(unescape(msg))=='提交成功'){
	            			if(msg=='提交成功'){
					RemainTime();
				}	
			}else{
	            			alert(jQuery.trim(unescape(msg)));
	 		}
        		});
	};
	var iTime = 59;
	var Account;
	function RemainTime(){
		document.getElementById('mtime').disabled = true;
		var iSecond,sSecond="",sTime="";
		if (iTime >= 0){
			iSecond = parseInt(iTime%60);
			iMinute = parseInt(iTime/60)
			if (iSecond >= 0){
				if(iMinute>0){
					sSecond = iMinute + "分" + iSecond + "秒";
				}else{
					sSecond = iSecond + "秒";
				}
			}
			sTime=sSecond;
			if(iTime==0){
				clearTimeout(Account);
				sTime='重新获取';
				iTime = 59;
				document.getElementById('mtime').disabled = false;
			}else{
				Account = setTimeout("RemainTime()",1000);
				iTime=iTime-1;
			}
		}else{
			sTime='没有倒计时';
		}
		document.getElementById('mtime').innerHTML = sTime;
	}	
    
</script>	
</body>
</html>