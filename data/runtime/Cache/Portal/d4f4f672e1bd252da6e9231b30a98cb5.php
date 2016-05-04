<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>觅房网房产分销平台</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
	<link rel="stylesheet" href="/tpl/simplebootx/Public/css/main.css" type="text/css">
	<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.3.min.js"></script>
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
		<div class="box mt15">
			<ul class="innerBox">
				<li class="clearfix">
					<span class="fl tt">选择区域：&nbsp;&nbsp;</span>
					<p class="region fl">
						<span>
							<a href="<?php echo U('Fxlp/index');?>">不限</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'武昌区'));?>">武昌区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'江岸区'));?>">江岸区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'江汉区'));?>">江汉区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'硚口区'));?>">硚口区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'汉阳区'));?>">汉阳区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'洪山区'));?>">洪山区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'青山区'));?>">青山区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'东西湖区'));?>">东西湖区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'蔡甸区'));?>">蔡甸区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'江夏区'));?>">江夏区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'黄陂区'));?>">黄陂区</a>
						</span>
						<span>
							<a href="<?php echo U('Fxlp/index',array('qy'=>'新洲区'));?>">新洲区</a>
						</span>
					</p>
				</li>
				<li class="space"></li>
				<li>
					<div class="inputBox">
					<form action="<?php echo U('Fxlp/index',array('so'=>1,'qy'=>2));?>" method="post"  id="_form">	
						<input type="text" name="soss" class="keywords" placeholder="请输入楼盘名" onfocus="if(this.value=='请输入楼盘名') this.value='';"onblur="if(this.value=='') this.value='请输入楼盘名'; this.blur(); ">
	                       	 			<button class="check" onclick="document.getElementById('_form').submit();"></button>
	                       	 		</form>
	                       	 		</div>
		                        	</li>
	                        </ul>
		</div>
		<!-- 内容排序-->
		<div class="rank mt15">
			<ul class="title">
				<li>默认排序</li>
				<li class="active so2">佣金
					<span class=" down">
						<img src="/tpl/simplebootx/Public/images/top_arr.png" alt="">
					</span>
				</li >
				<li class="so3">最热
					<span class="up">
						<img src="/tpl/simplebootx/Public/images/down_arr.png" alt="">
					</span>
				</li>
				<li class="so4">最新
					<span class="down">
						<img src="/tpl/simplebootx/Public/images/down_arr.png" alt="">
					</span>
				</li>
			</ul>
			<ul class="houses">
			<?php if(is_array($fang)): foreach($fang as $key=>$vo): ?><li>
					<a href="#" class="viewImg">
						<img src="<?php echo ((isset($vo["picture_dir"]) && ($vo["picture_dir"] !== ""))?($vo["picture_dir"]):'./data/upload/556273ce4d120.png'); ?>" alt="" width="352px" height="221px">
					</a>
					<div class="right">
						<div class="name"><?php echo ($vo["name"]); ?></div>
						<p>优惠价格：<em><?php echo ($vo["discount"]); ?></em>元/平米</p>
						<p>市场价格：<em><?php echo ($vo["aveprice"]); ?></em>元/平米</p>
						<p>楼盘位置：<span>【<?php echo ($vo["city"]); ?>】</span><?php echo ($vo["addr"]); ?></p>
						<p>截止日期：<?php echo (date("Y-m-d",$vo["roomtime"])); ?></p>
						<p>
							<a href="javasctipt:void(0)
							" class="recomBtn">
							<img src="/tpl/simplebootx/Public/images/recomBtn.png" alt=""></a>
							<span><em><?php echo ($vo["involved"]); ?></em>人推荐</span>
						</p>
						<p class="countTime">
							<span>
								<img src="/tpl/simplebootx/Public/images/timer.png" alt="">
							</span>
							<em class="roomtime"><?php echo ($vo["roomtime"]); ?></em>
                						<em class='datedown'></em>
						</p>
						<div class="knowDetail">
							<a href="<?php echo U('Fxlp/fxlist',array('id'=>$vo['id']));?>">
							<span class="know_1">了解详情</span>
							<span class="know_2">￥<em><?php echo ($vo["num"]); ?></em>/套(佣金)</span></a>
						</div>
						<div class="clear"></div>
					</div>
				</li><?php endforeach; endif; ?>
			</ul>
		</div>
<!-- 分页-->
		<div class="AspNetPager">
			<div class="paginator">
				<?php echo ($page); ?>
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
	<!-- <div class="tj_ct hide" style="display: none;"> -->
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
	<!-- </div> -->
		<dl>
			<input type="hidden" name="a_id" value="<?php echo (session('id')); ?>" id="a_id" >
			<a href="javascript:void(0);"  class="btn" id="addclient">提交推荐信息</a>
		</dl>
	</form>
	</div><?php endif; ?>
	</div>
<script type="text/javascript">
	$(function(){
	// tab标签切换
	$(".rank ul.title li").click(function(){
		$(this).children().children().attr("src","/tpl/simplebootx/Public/images/top_arr.png");
		$(this).siblings().children().children().attr("src","/tpl/simplebootx/Public/images/down_arr.png");
	});
	
//最新最热ajax
	$(".so2").bind("click",function(){
		var href = "<?php echo U('Fxlp/so');?>";
		var href1 =  "<?php echo U('Fxlp/fxlist');?>";
		$.post(
			href,
			function(data){
				str = "";
				for(var i = 0, j = data.length;i<j;i++){
					str += '<li><a href="#" class="viewImg"><img src="'+data[i].picture_dir+'" alt="" width="352px" height="221px"></a><div class="right"><div class="name">'+data[i].name+'</div><p>优惠价格：<em>'+data[i].discount+'</em>元/平米</p><p>市场价格：<em>'+data[i].aveprice+'</em>元/平米</p><p>楼盘位置：<span>【'+data[i].city+'】</span>'+data[i].addr+'</p><p>开盘日期：'+getLocalTime(data[i].opentime)+'</p><p><a href="javasctipt:void(0)" class="recomBtn"><img src="/tpl/simplebootx/Public/images/recomBtn.png" alt=""></a><span><em>'+data[i].involved+'</em>人推荐</span></p><p class="countTime"><span><img src="/tpl/simplebootx/Public/images/timer.png" alt=""></span><em class="roomtime" style="display:none;">'+data[i].roomtime+'</em><em class="datedown"></em></p><div class="knowDetail"><a href="'+href1+'&id='+data[i].id+'"><span class="know_1">了解详情</span><span class="know_2">￥<em>'+data[i].num+'</em>/套(佣金)</span></a></div><div class="clear"></div></div></li>';	
					//alert(data[i]['picture_dir']);			
				}
				$('.houses').html('');
				$('.houses').html(str);
			},
			"json"
		);
	})

	//最新最热ajax
	$(".so3").bind("click",function(){
		var href = "<?php echo U('Fxlp/hot');?>";
		var href1 =  "<?php echo U('Fxlp/fxlist');?>";
		$.post(
			href,
			function(data){
				str = "";
				for(var i = 0, j = data.length;i<j;i++){
					str += '<li style="background: rgb(255, 255, 255);"><a href="#" class="viewImg"><img src="'+data[i].picture_dir+'" alt="" width="352px" height="221px"></a><div class="right"><div class="name">'+data[i].name+'</div><p>优惠价格：<em>'+data[i].discount+'</em>元/平米</p><p>市场价格：<em>'+data[i].aveprice+'</em>元/平米</p><p>楼盘位置：<span>【'+data[i].city+'】</span>'+data[i].addr+'</p><p>开盘日期：'+getLocalTime(data[i].opentime)+'</p><p><a href="javasctipt:void(0)" class="recomBtn"><img src="/tpl/simplebootx/Public/images/recomBtn.png" alt=""></a><span><em>'+data[i].involved+'</em>人推荐</span></p><p class="countTime"><span><img src="/tpl/simplebootx/Public/images/timer.png" alt=""></span><em class="roomtime" style="display:none;">'+data[i].roomtime+'</em><em class="datedown"></em></p><div class="knowDetail"><a href="'+href1+'&id='+data[i].id+'"><span class="know_1">了解详情</span><span class="know_2">￥<em>'+data[i].num+'</em>/套(佣金)</span></a></div><div class="clear"></div></div></li>';	
					//alert(data[i]['picture_dir']);			
				}
				$('.houses').html('');
				$('.houses').html(str);
			},
			"json"
		);
	})
	//最新最热ajax
	$(".so4").bind("click",function(){
		var href = "<?php echo U('Fxlp/news');?>";
		var href1 =  "<?php echo U('Fxlp/fxlist');?>";
		$.post(
			href,
			function(data){
				str = "";
				for(var i = 0, j = data.length;i<j;i++){
					str += '<li><a href="#" class="viewImg"><img src="'+data[i].picture_dir+'" alt="" width="352px" height="221px"></a><div class="right"><div class="name">'+data[i].name+'</div><p>优惠价格：<em>'+data[i].discount+'</em>元/平米</p><p>市场价格：<em>'+data[i].aveprice+'</em>元/平米</p><p>楼盘位置：<span>【'+data[i].city+'】</span>'+data[i].addr+'</p><p>开盘日期：'+getLocalTime(data[i].opentime)+'</p><p><a href="javasctipt:void(0)" class="recomBtn"><img src="/tpl/simplebootx/Public/images/recomBtn.png" alt=""></a><span><em>'+data[i].involved+'</em>人推荐</span></p><p class="countTime"><span><img src="/tpl/simplebootx/Public/images/timer.png" alt=""></span><em class="roomtime" style="display:none;">'+data[i].roomtime+'</em><em class="datedown"></em></p><div class="knowDetail"><a href="'+href1+'&id='+data[i].id+'"><span class="know_1">了解详情</span><span class="know_2">￥<em>'+data[i].num+'</em>/套(佣金)</span></a></div><div class="clear"></div></div></li>';	
					//alert(data[i]['picture_dir']);			
				}
				$('.houses').html('');
				$('.houses').html(str);
			},
			"json"
		);
	})
	
	function getLocalTime(nS) {     
	   return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');     
	}

			$(".menubar ul li").eq(0).addClass("active").siblings().removeClass("active");


		$(".recomBtn").live("click",function(){
			$("#bg,#tj").show();
			 var houseName=$(this).parents(".right").find(".name").text();
			
 			$("#lpname").val(houseName);
 			var region=$(this).parents(".right").find("p").eq(2).children("span").text().split("【");
 			$("#region").val(region[1].substr(0,region[1].length-1));

		});
		
		$("#tit a").click(function(){
			$("#bg,#tj").hide();
		});
		$("#more").click(function(){
			$(".tj_ct").toggle();
		});

	$(".recomBtn").click(function(){
		var Tend = $(this).parent().next(".countTime").children(".datedown").html();
		if( Tend =="活动已结束"){
			alert("活动已结束!");
			return false;
			// e.preventDefault();
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
	$('#addclient').click(function(){
			var name = $("#cname").val();
			var tel = $('#mobile').val();
			var city  = $('#region').val();
			var buliding = $('#lpname').val();
			var area = $('#area').val();
			var price =$('#price').val();
			var a_id = $('#a_id').val();
			var sex =($('input[name="sex"]:checked').val());
			var house =($('input[name="house"]:checked').val());
		$.ajax({
		         type: "POST",
		         url: "<?php echo U('Index/dosave');?>",
		         dataType:'text',
		         data: {name:name,sex:sex,house:house,area:area,price:price,tel:tel,city:city,buliding:buliding,a_id:a_id,},
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
	};
	window.setInterval(update,1000);
});
</script>
<script src="/tpl/simplebootx/Public/js/main.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function(){
		$(".menubar ul li").eq(1).addClass("active").siblings().removeClass("active");
	})
</script>
</body>
</html>