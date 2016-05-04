<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>觅房网房产分销平台</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/login.css" type="text/css">
		<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="/tpl/simplebootx/Public/js/main.js"></script>
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
	<!-- <div class="whiteline"></div> -->
	<div class="loginBox">
		<div class="layout">
		<?php if(empty($_SESSION['loginname'])): ?><div class="boxinfo beforeLogin">
			<form action="<?php echo U('Login/doLogin');?>" method="post"  id="_form">
				<p><span>用户名：</span><input type="text" name="name" id="" value="" placeholder="请填写手机号码"/></p>
				<p><span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="password" id="pwd" value="" placeholder="请填写密码"/></p>
				<p><span>验证码：</span><input type="text" name="captcha" id="code" value="" placeholder="请填写验证码"/></p>
				<p class="t_c  codeImg"><img src="<?php echo U('Login/captcha');?>" onclick="refresh(this)" alt="" /></p>
				<p class="t_c"><a href="javascript:void(0)" id="loginBtn" onclick="document.getElementById('_form').submit();">登录</a></p>
				<p class="fjj"><a href="<?php echo U('Login/forgetpwd');?>">忘记密码？</a><a href="<?php echo U('Login/reg');?>">注册新用户</a></p>
				<p ><img src="/tpl/simplebootx/Public/images/phoneIcon.gif" alt=""  class="fl"/>
					<ul>
						<li class="tel">027-82727005</li>
						<li class="askTime">咨询时间：8:30-18:00</li>
					</ul>
				</p>
			</form>	
			</div>
		<?php else: ?>
			<?php if(($_SESSION['r_id'] == 1) OR empty($_SESSION['r_id'])): ?><div class="loginInbox ">
					<img src="./data/upload/<?php echo ((isset($img) && ($img !== ""))?($img):'member.gif'); ?> " alt=""  class="fl mr15" width="98px" height="99px"/> 
				<p class="mt10">用户名：<em><?php echo (session('loginname')); ?></em></p>
				<p >推荐客源：<em><?php echo ($num); ?></em>人</p>
				<p>成交套数：<em><?php echo ($fang); ?></em>套</p>
				<div  style="clear:both;">
				<?php if(is_array($money)): foreach($money as $key=>$money): ?><p>累计佣金：<em>￥<?php echo ($money["total_money"]); ?></em>元</p>
				<p>成交佣金：<em>￥<?php echo ($money["agent_money"]); ?></em>元</p><?php endforeach; endif; ?>
				</div>	
				<div class="clear"></div>
				<div  class="mt10  t_c fl">
					<img src="/tpl/simplebootx/Public/images/phoneIcon.gif" alt=""  class="fl mr10"/>
					<ul class="fl">
						<li class="tel">027-82727005</li>
						<li class="askTime">咨询时间：8:30-18:00</li>
					</ul>
				</div>
			</div>
			<?php elseif($_SESSION['r_id'] == 2): ?>
			<div class="loginInbox "><img src="./data/upload/<?php echo ((isset($img) && ($img !== ""))?($img):'member.gif'); ?> " alt=""  class="fl mr15" width="98px" height="99px"/> 
				<p class="mt10">房源商：<em><?php echo (session('loginname')); ?></em></p>
				<p >房源总套数：<em><?php echo ($distributor_id); ?></em>套</p>
				<p>成交套数：<em><?php echo ($fang); ?></em>套</p>
				<div  style="clear:both;">
				<?php if(is_array($money)): foreach($money as $key=>$money): ?><p>累计佣金：<em>￥<?php echo ($money["total_money"]); ?></em>元</p>
				<p>成交佣金：<em>￥<?php echo ($money["agent_money"]); ?></em>元</p><?php endforeach; endif; ?>
				</div>	
				<div class="clear"></div>
				<div  class="mt10  t_c fl">
					<img src="/tpl/simplebootx/Public/images/phoneIcon.gif" alt=""  class="fl mr10"/>
					<ul class="fl">
						<li class="tel">027-82727005</li>
						<li class="askTime">咨询时间：8:30-18:00</li>
					</ul>
				</div>
			</div>
			<?php elseif($_SESSION['r_id'] == 3): ?>
				<div class="loginInbox "><img src="./data/upload/<?php echo ((isset($img) && ($img !== ""))?($img):'member.gif'); ?> " alt=""  class="fl mr15" width="98px" height="99px"/> 
				<p class="mt10">机构名：<em><?php echo (session('loginname')); ?></em></p>
				<p >我的经纪人：<em><?php echo ($countnum); ?></em>人</p>
				<div  class="mt10  t_c fl">
					<img src="/tpl/simplebootx/Public/images/phoneIcon.gif" alt=""  class="fl mr10"/>
					<ul class="fl">
						<li class="tel">027-82727005</li>
						<li class="askTime">咨询时间：8:30-18:00</li>
					</ul>
				</div>
			</div><?php endif; endif; ?>
		</div>
	</div>
	<div class="layout">
		<div class="latest_1 mt10 ">
			<div class="ltTitle mb10 "><a href="<?php echo U('Fxlp/index');?>" class="more">更多楼盘&gt;&gt;</a></div>
			 <ul id="lplist">
			 	<?php if(is_array($building)): foreach($building as $key=>$v): ?><li>
					<div class="lpBox">
						<a href="<?php echo U('Fxlp/fxlist',array('id'=>$v['id']));?>" class="liimg"><img src="<?php echo ((isset($v["picture_dir"]) && ($v["picture_dir"] !== ""))?($v["picture_dir"]):'./data/upload/lpImh.gif'); ?>" height="240px" width="241px"></a>
						<div class="decrib"><p class="houTitle">【<?php echo ($v["city"]); ?>】<?php echo ($v["name"]); ?></p>
							<p>参考均价：<em><?php echo ($v["num"]); ?></em>/平方米</p>
							<p><em>最高客源佣金：<?php echo ($v["aveprice"]); ?></em></p>
							<p><em><?php echo ($v["involved"]); ?>人</em>正在参与</p>
							<em class="roomtime"><?php echo ($v["roomtime"]); ?></em>
							<em class='datedown'></em>
							<p><a href="#" class="recoClient"><img src="/tpl/simplebootx/Public/images/recomBtn.gif"></a></p>
						</div>
					</div>
				 </li><?php endforeach; endif; ?>
			 </ul>
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
	<div id="bg" style=""></div>
	<div id="tj" style="top: 30%;">
		<ul id="tit">
			<a href="javascript:void(0);" target="_top">X</a>
			<li class="c">推荐新客户</li>
		</ul>
	<?php if(empty($_SESSION['loginname'])): ?><div class="tj_box no_dl show">
		您还未登陆，请先<a href="<?php echo U('Login/login');?>">登录</a>或者<a href="<?php echo U('Login/reg');?>" class="btn2">免费注册</a>
	</div> 
	<?php else: ?>
	<div class="tj_box" id="tj_box0">
	<form action="" method="post" id="_form">
	<div class="debug"></div>
		<dl>
			<dt><i style="color:red">*&nbsp;&nbsp;</i>姓名</dt>
			<dd><input type="text" class="txt" id="cname" name="name"><span style="color:red">姓名不能为空</span></dd>
		</dl>
		<dl>
			<dt><i style="color:red">*&nbsp;&nbsp;</i>手机</dt>
			<dd><input type="text" class="txt" id="mobile" maxlength="11" name="tel"><span style="color:red">请输入正确的手机号</span></dd>

		</dl>
		<dl>
			<dt>区域</dt>
			<dd><input type="text" class="txt" id="region" readonly="" name="city"  ></dd>
		</dl>
		<dl>
			<dt>意向楼盘</dt>
			<dd><input type="text" class="txt" id="lpname" readonly="" name="buliding"></dd>
		</dl>
<!-- 			<ul class="tab-list" style="z-index: 10; display: none;" id="foot_search_ul"></ul>
		<dl id="more">补充更多信息<i class=""></i></dl> -->
		<dl>
			<dt>性别</dt>
			<dd>
				<label for="s1"><input type="radio" value="1" id="s1" name="sex" checked="checked">男</label>
				<label for="s2"><input type="radio" value="2" id="s2" name="sex">女</label>
			</dd>
		</dl>       
		<dl>
			<dt>意向户型</dt>
			<dd>
				<label for="hx1"><input type="radio" value="一室" id="hx1" name="house">一室</label>
				<label for="hx2"><input type="radio" value="二室" id="hx2" name="house" >二室</label>
				<label for="hx3"><input type="radio" value="三室" id="hx3" name="house" checked="checked">三室</label>
				<label for="hx4"><input type="radio" value="四室" id="hx4" name="house">四室</label>
				<label for="hx5"><input type="radio" value="五室" id="hx5" name="house">五室</label>
			</dd>
		</dl>     
		<dl>
			<dt>意向面积</dt>
			<dd><input type="text" class="txt" id="area" name="area">/平方米&nbsp;&nbsp;&nbsp;<span style="color:red">请填写数字</span></dd>
		</dl>    
		<dl>
			<dt>意向价格</dt>
			<dd><input type="text" class="txt" id="price" name="price">万元&nbsp;&nbsp;&nbsp;<span style="color:red">请填写数字</span></dd>
		</dl>                    
		<dl>
			<input type="hidden" name="a_id" value="<?php echo (session('id')); ?>" id="a_id" >
			<a href="javascript:void(0);"  class="btn" id="addclient">提交推荐信息</a>
		</dl>
	</form>
	</div><?php endif; ?>
	</div>
	<script type="text/javascript">
		function refresh(obj){
	  		  obj.src="<?php echo U('Login/captcha');?>&id="+Math.random();
			};
	$(function(){
		$(".menubar ul li").eq(0).addClass("active").siblings().removeClass("active");
		$(".recoClient").live("click",function(){
			$("#bg,#tj").show();
			 var houseName=$(this).parents(".decrib").find(".houTitle").text();
			 var arr=houseName.split("】");
 			$("#lpname").val(arr[1]);
 			$("#region").val(arr[0].substr(1,arr[0].length));
				
		});
		
		$("#tit a").click(function(){
			$("#bg,#tj").hide();
		});
		$("#more").click(function(){
			$(".tj_ct").toggle();
		});
  

		$(".recoClient").click(function(){
			var ITend = $(this).parent().prev(".datedown").html();
			if( ITend =="活动已结束" ){
				alert("活动已结束!");
				return false;
			}	
		})

		$("#area").change(function(){
				var txt=$(this).val();
				if(txt.length>0&&(/^[0-9]*$/.test(txt))){
				$(this).next("span").hide();
				 return true;
			} else{	
				$(this).next("span").show(); 
				 return false;	
			}
		});
		$("#price").change(function(){
				var txt=$(this).val();
				if(txt.length>0&&(/^[0-9]*$/.test(txt))){
				$(this).next("span").hide();
					 return true;
			} else{	
				 $(this).next("span").show(); 	
				 return false;
			}
		});

		 $("#cname").change(function(){
				var txt=$(this).val();
				if(txt.length>0){
				$(this).next("span").hide();
					 return true;
			} else{	
				 $(this).next("span").show(); 	
				 return false;
			}
		});
	 	$("#mobile").change(function(){
				var txt=$(this).val();
				if(txt.length>0&&(/^(1){1}[0-9]{10}$/.test(txt))){
				$(this).next("span").hide();
					 return true;
			} else{	
				 $(this).next("span").show(); 	
				 return false;
			}
		});
		//提交信息
		// $('#addclient').click(function(e){
		// 	e.preventDefault();
		// });

		$('#addclient').click(function(){
			var name = $("#cname").val();
			var tel = $('#mobile').val();
			var city  = $('#region').val();
			var buliding = $('#lpname').val();
			var area = $('#area').val();
			var price =$('#price').val();
			var a_id = $('#a_id').val();
			var sex = $('input[name="sex"]:checked').val();
			var house = $('input[name="house"]:checked').val();
		     $.ajax({
		         type: "POST",
		         url: "<?php echo U('Index/dosave');?>",
		         dataType:'text',
		         data: {name:name,sex:sex,house:house,area:area,price:price,tel:tel,city:city,buliding:buliding,a_id:a_id},
		         success: function(data){
			       alert(data);
			       $('#tj,#bg').hide();
		         	}
		     });
		});

	/*倒计时*/

		function update(){
			var now = new Date();
			var nowTimes = now.getTime();
			var years = document.getElementsByClassName('roomtime');
			var datedowns = document.getElementsByClassName('datedown');
		            for(var i=0;i<years.length;i++){
		            	//datedowns[i].innerHTML = Math.floor(nowTimes/1000);
		            	var leftsecond = parseInt((years[i].innerHTML-Math.floor(nowTimes/1000)));
		            	var day1=Math.floor(leftsecond/(3600*24)); 
		   	 	var hour=Math.floor((leftsecond-day1*24*60*60)/3600); 
		   	 	var minute=Math.floor((leftsecond-day1*24*60*60-hour*3600)/60); 
		   	 	var second=Math.floor(leftsecond-day1*24*60*60-hour*3600-minute*60); 
		            	//years[i].innerHTML = (nowTimes-years[i].innerHTML);
		            	if(day1<=0){
				        var string = "活动已结束";

				}else{
				        var string = "距离活动结束时间还有:"+day1+"天"+hour+"小时"+minute+"分"+second+"秒";

				}
		            	datedowns[i].innerHTML =string;
		            }
		}

		window.onload=function(){
		    $(".roomtime").hide();
		    $(".datedown").hide();
		};
		window.setInterval(update,1000);


	});

	
	</script>
	</body>
</html>