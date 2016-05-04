<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>觅房网房产分销平台</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/register.css" type="text/css">
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
	<form action="<?php echo U('Login/doRegist');?>" method="post"  id="_form">
	<div class="layout">
		<div class="title clearfix">
			<img src="/tpl/simplebootx/Public/images/menberIcon.gif" alt=""  class="fl"/>
			<p class="fr">欢迎您注册觅房网会员，如果你拥有此账户，可在此
				<a href="<?php echo U('Login/login');?>" id="loginBtn">登录</a>
			</p>
		</div>
		<div class="regBox">
			<div class="Ttitle">新用户注册</div>
		<div class="t_c regInput">
			<div class="ll">
				<span>
					<em style="color:red">*</em>账号:&nbsp;
				</span> 
					<input type="text" placeholder="请输入您的手机号" id="phone">
				<span class="ui-tip-error" id="jjr_acc_err">
					<i class="lp-cuo" title="出错"></i><b>账号不能为空</b>
				</span>
			</div>
			<div class="ll">
				<span>
					<em style="color:red">*</em>手机验证:&nbsp;
				</span> 
					<input type="text" placeholder="请输入您的短信验证码" id="">
					<mark id="reg_yzm">获取验证码</mark>
				<span class="ui-tip-error" id="jjr_acc_err">
					<!-- <i class="lp-cuo" title="出错"></i><b>账号不能为空</b> -->
				</span>
			</div>
			<div class="ll">
				<span>真实姓名:&nbsp;</span> 
					<input type="text" placeholder="请输入您的真实姓名" id="nickname">
				<span class="ui-tip-error" id="jjr_nickname_err">
					<i class="lp-dui" title="正确"></i>
				</span>
			</div>
			<div class="ll">
				<span>
					<em style="color:red">*</em>密码:&nbsp;
				</span> 
					<input type="password" placeholder="6~18个字符，可以使用字母、数字" id="code">
				<span class="ui-tip-error" id="jjr_pwd1_err">
					<i class="lp-cuo" title="出错"></i>密码为6-16位字母和数字组成
				</span>
			</div>
			<div class="ll">
				<span>
					<em style="color:red">*</em>确认密码:&nbsp;
				</span> 
					<input type="password" placeholder="请重复输入密码" id="repeatCode">
				<span class="ui-tip-error" id="jjr_pwd2_err" >
					<i class="lp-cuo" title="出错"></i>两次密码输入不一致
				</span>
			</div>
			<div class="ll">
				<span>
					<em style="color:red">*</em>验证码:&nbsp;
				</span> 
					<input type="text" placeholder="请输入验证码" id="captcha">
				<span class="ui-tip-error"></span>
			</div>
			<div class="yzm" style="cursor:pointer;">
				<img src="<?php echo U('Login/captcha');?>" alt="" onclick="refresh(this)">
			</div>
			<div class="check">
				<input type="checkbox" id="chk" checked="checked">同意<a href="#">觅房协议</a>
			</div>
			<div class="finish mt20 mb10">
				<a href="javascript:void(0)" id="finishRegist">
					<img src="/tpl/simplebootx/Public/images/registerBtn.gif" alt="">
				</a>
			</div>
		</div>
		</div>
	</div>
	</form>
<div class="mb10"></div>
<script language="javascript">
	$(function(){
		$('#reg_yzm').click(function(e){
			e.preventDefault();
			get_mobile_code();
		});
	})
	function get_mobile_code(){
        		$.post("<?php echo U('Login/reg_verify');?>", {mp:jQuery.trim($('#phone').val()),send_code:<?php echo $_SESSION['send_code'];?>}, function(msg) {
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
		document.getElementById('reg_yzm').disabled = true;
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
				document.getElementById('reg_yzm').disabled = false;
			}else{
				Account = setTimeout("RemainTime()",1000);
				iTime=iTime-1;
			}
		}else{
			sTime='没有倒计时';
		}
		document.getElementById('reg_yzm').innerHTML = sTime;
	}	
    
</script>
<script>
	$(function(){
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
	})
</script>
<script>	
	function refresh(obj){
  		  obj.src="<?php echo U('Login/captcha');?>&id="+Math.random();
		}
	$(function(){
	function checkmobile(mobile) {
		var regmobile = new RegExp("^(1){1}[0-9]{10}$");
		if(mobile.length>0){
			if (!regmobile.test(mobile)) {
			$("#jjr_acc_err  b").text("手机号格式不对");
			$("#jjr_acc_err").addClass("show");
			return false;
			} else{
			$("#jjr_acc_err").removeClass("show");
			return true;}
		} else{ $("#jjr_acc_err  b").text("账号不能为空");
			$("#jjr_acc_err").addClass("show");
			return false;
		}
	}

	function checkcode(code) {
		var regcode = new RegExp("^[0-9]{6}$");
		if (!regcode.test(code)) {
			return false;
		}

		return true;
	}

	function checkemail(email) {
		var regMail = new RegExp("^[a-zA-Z0-9-_]+@([a-zA-Z0-9-_]+\\.)*[a-zA-Z0-9-_]+\\.[a-zA-Z]+$");
		if (!regMail.test(email)) {
			return false;
		}
		return true;
	}

	function checknickname(nickname) {
		var regnickname = new RegExp("^(\\w|[\\u4E00-\\u9FA5]|[_])*$");
		if (!regnickname.test(nickname)) {
			$("#jjr_nickname_err").removeClass("show");
			return false;
			
		}
		var len = nickname.match(/[^ -~]/g) == null ? nickname.length : nickname.length + nickname.match(/[^ -~]/g).length;
		if (len < 4) {
			 $("#jjr_nickname_err").removeClass("show");return false;
		} else if (len > 20) {
			$("#jjr_nickname_err").removeClass("show");return false; 
		}
		$("#jjr_nickname_err").addClass("show");return true; 
	}


	function check_pwd1(pwd) {
		var regPasswd = new RegExp("^[0-9a-zA-Z]{6,16}$");
		if (!regPasswd.test(pwd)) {
			$("#jjr_pwd1_err").addClass("show");
			return false;
			
		}
		$("#jjr_pwd1_err").removeClass("show");
		return true;
	}

	$("#phone").change(function(){
		var phone=$("#phone").val();
		
		checkmobile(phone);	
		});
	$("#nickname").change(function(){
		var nickname=$("#nickname").val();
		
		 checknickname(nickname);
		});
	$("#code").change(function(){
		var code=$("#code").val();
		
		 check_pwd1(code);
		});
	$("#repeatCode").change(function(){
		var code=$("#code").val();
		var repeatCode=$(this).val();
	 if(code!=repeatCode){
		$("#jjr_pwd2_err").addClass("show")
		return false;
	 } else{ 
	 	$("#jjr_pwd2_err").removeClass("show")
	 }
	 	return true;
	});

	$("#finishRegist").click(function(){
		if (!$("#chk").attr("checked")) {
			alert("请确认觅房网协议!");
			return false;
		}
	//ajax提交信息
		var phone = $("#phone").val();
		var nickname = $('#nickname').val();
		var code  = $('#code').val();
		var rcode = $('#repeatCode').val();
		var captcha = $('#captcha').val();
	     $.ajax({
	         type: "POST",
	         url: "<?php echo U('Login/doRegist');?>",
	         dataType:'text',
	         data: {loginname:phone,name:nickname,password:code,rpassword:rcode,captcha:captcha},
	         success: function(data){
		       alert(data);
		       if(data == "注册成功"){
		     	 window.location.href="<?php echo U('Login/login');?>"; 
		       }else{
		       	window.location.href="<?php echo U('Login/reg');?>"; 
		       }
	         	}
	     });
	});
})
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