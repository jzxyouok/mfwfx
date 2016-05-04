<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>觅房网房产分销平台</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/listDetail.css" type="text/css">
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
<?php if(is_array($fanglist)): foreach($fanglist as $key=>$vo): ?><div class="layout lpDetail  clearfix">
	<img src="<?php echo ((isset($vo["picture_dir"]) && ($vo["picture_dir"] !== ""))?($vo["picture_dir"]):'./data/upload/lpDetailImg.gif'); ?>" width="566px" height="300px" alt="" class="mt10">
	<div class="items mt10">
		<p class="itemTitle"><?php echo ($vo["name"]); ?></p>
		<p>参考均价：<em><?php echo ($vo["aveprice"]); ?></em>/平米</p>
		<p>地址：【<?php echo ($vo["city"]); ?>】<?php echo ($vo["addr"]); ?></p>
		<p class="discount">卖点：<em><?php echo ($vo["selling"]); ?></em></p>
		<ul class="itemDetail">
			<li>该楼盘已成交0套，已经推荐<?php echo ($vo["involved"]); ?>次,可得最高佣金：<?php echo ($vo["num"]); ?>元</li>
			<li>
				<em class="roomtime"><?php echo ($vo["roomtime"]); ?></em>
				<em class='datedown'></em>
			</li>
		</ul>
		<div class="yjDetail">
			<span>最高佣金：<?php echo ($vo["num"]); ?>元/套</span>
			<a href="javascript:void(0)"  class="recoClient"></a>
		</div>
		<div class="ask">
			<p>咨询电话：<strong><?php echo ($vo["tel"]); ?></strong></p>
			<p>咨询时间：8：30-18:00</p>
		</div>
	</div>
</div>
<div class="layout">
	<div class="basicInfo mt20">
	<div class="infoTitle">
		<a class="active" href="#info_1">佣金规则</a>
		<a href="#info_2">基本信息</a>
		<a href="#info_3">户型图</a>
		<a href="#info_4">楼盘相册</a>
	</div>
        <div class="info info_1 mb20" id="info_1">
	          <div class="ltTitle"></div>
	          <p>最高佣金：<em><?php echo ($vo["num"]); ?></em>元</p>
	          <p>现金奖：</p>
	          <p>佣金规则：<em><?php echo ($vo["commission_rule"]); ?></em></p>
        </div>
        <div class="info info_2 mb20" id="info_2">
		<div class="ltTitle"></div>
		<div class="left">
			<p><span>楼盘楼层：<?php echo ($vo["floor"]); ?></span><span>房屋属性：<?php echo ($vo["attribute"]); ?></span></p>
			<p><span>开盘时间：<?php echo (date('Y-m-d',$vo["opentime"])); ?></span><span>截止时间：<?php echo (date('Y-m-d',$vo["roomtime"])); ?></span></p>
			<p><span>物业类型：<?php echo ($vo["propertytypes"]); ?></span><span>装修情况：<?php echo ($vo["redecorate"]); ?></span></p>
			<p><span>开发商：<?php echo ($vo["developer"]); ?></span><span>物业公司：<?php echo ($vo["property"]); ?></span></p>
		</div>
			<img src="/tpl/simplebootx/Public/images/map.gif" alt="" class="addr">
        </div>

		<div class="info info_3 mb20 hxImglist" id="info_3">
			<div class="ltTitle"></div>
			<ul>
				<?php if(is_array($img)): foreach($img as $key=>$img): ?><li><img src="<?php echo ((isset($img) && ($img !== ""))?($img):'./data/upload/hxtu.gif'); ?>" width="310px" height="300px"><span>A户型图80/平米</span></li><?php endforeach; endif; ?>
			</ul>
		</div> 
	<div class="info info_4 mb20 hxImglist" id="info_4">
	<div class="ltTitle"></div>
		<ul>
			<?php if(is_array($img_dir)): foreach($img_dir as $key=>$img_dir): ?><li><img src="<?php echo ((isset($img_dir) && ($img_dir !== ""))?($img_dir):'./data/upload/lpxc.gif'); ?>" width="310px" height="300px" alt=""></li><?php endforeach; endif; ?>
		</ul>
	</div>
      </div> 
      </div> 
      </div><?php endforeach; endif; ?>
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
	<div id="tj" style="top: 50%;">
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
		<!-- 	<ul class="tab-list" style="z-index: 10; display: none;" id="foot_search_ul"></ul>
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
			$(".menubar ul li").eq(1).addClass("active").siblings().removeClass("active");
			$(".recoClient").live("click",function(){
				$("#bg,#tj").show();
				 var houseName=$(this).parents(".items").find(".itemTitle").text();
			 	 $("#lpname").val(houseName);
				var region=$(this).parents(".items").find("p").eq(2).text();
				
				var str=region.substr(3,region.length).split("】");
				$("#region").val(str[0].substr(1,str[0].length));
			});
			
			$("#tit a").click(function(){
				$("#bg,#tj").hide();
			});
			$("#more").click(function(){
				$(".tj_ct").toggle();
			});

	  	$(".recoClient").click(function(){
	  		var FLTend = $(this).parent().prev(".itemDetail").children().children(".datedown").html();
	  		if( FLTend =="活动已结束"){
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
		            	var day1=Math.floor(leftsecond/(60*60*24)); 
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
	</body>
</html>