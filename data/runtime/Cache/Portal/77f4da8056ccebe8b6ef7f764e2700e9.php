<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>觅房网房产分销平台</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/fanglist.css" type="text/css">
		<script type="text/javascript" src="/tpl/simplebootx/Public/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="/tpl/simplebootx/Public/js/main.js"></script>
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
			<table id="yj_box" border="1" bordercolor="#cccccc" cellpadding="10">
				<tbody >
					<tr>
						<th>客户ID</th>
						<th>客户姓名</th>
						<th>客户电话</th>
						<th>客户姓别</th>
						<th>意向区域</th>
						<th>意向房型</th>
						<th>意向面积</th>
						<th>意向价位</th>
						<th>所属楼盘</th>
						<th>当前状态</th>
					</tr>
				</tbody>
				<?php if(is_array($res)): foreach($res as $key=>$v): ?><tr class="f-li">
							<td><?php echo ($v["id"]); ?></td>
							<td><?php echo ($v["name"]); ?></td>
							<td><?php echo ($v["tel"]); ?></td>
							<?php if($v['sex'] == 1): ?><td>男</td>
							<?php else: ?>
							<td>女</td><?php endif; ?>
							<td><?php echo ($v["city"]); ?></td>
							<td><?php echo ($v["house"]); ?></td>
							<td><?php echo ($v["area"]); ?>m<sup>2</sup></td>
							<td>￥<?php echo ($v["price"]); ?>&nbsp;&nbsp;万元</td>
							<td><?php echo ($v["buliding"]); ?></td>
							<?php if($v['rstutas'] == '1'): if($v['s_id'] == '1'): ?><td class="changeBtn last">
								待审核
								<span class="dataspan"></span>
							</td>
							<?php elseif($v['s_id'] == '2'): ?>
							<td class="changeBtn last">
								待预约
								<span class="dataspan"></span>
							</td>
							<?php elseif($v['s_id'] == '3'): ?>
							<td class="changeBtn last">
								待到访
								<span class="dataspan"></span>
							</td>
							<?php elseif($v['s_id'] == '4'): ?>
							<td class="changeBtn last">
								待认筹
								<span class="dataspan"></span>
							</td>
							<?php elseif($v['s_id'] == '5'): ?>
							<td class="changeBtn last">
								待认购
								<span class="dataspan"></span>
							</td>
							<?php elseif($v['s_id'] == '6'): ?>
							<td class="changeBtn last">
								待签约
								<span class="dataspan"></span>
							</td>
							<?php elseif($v['s_id'] == '7'): ?>
							<td class="changeBtn last">
								待结佣
								<span class="dataspan"></span>
							</td>
							<?php elseif($v['s_id'] == '8'): ?>
							<td>已结佣</td><?php endif; ?>
							<?php else: ?>
							<td>已终结</td><?php endif; ?>
						</tr><?php endforeach; endif; ?>
			</table>
		</div>
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
		<li class="c">修改状态</li>
			<span class="c-st">待审核</span>
		</foreach>
	</ul>
	<div class="tj_box" id="tj_box0">
		<form action="" method="post">
<!-- 			<dl class="choice">
				<dd>
					<input type="radio" name="state" id="" value="1">
					<span>审核</span>	
					<input type="radio" name="state" id="" value="2">
					<span>预约</span>
					<input type="radio" name="state" id="" value="3">
					<span>到访</span>
					<input type="radio" name="state" id="" value="4">
					<span>认筹</span>
					<input type="radio" name="state" id="" value="5">
					<span>认购</span>	
					<input type="radio" name="state" id="" value="6">
					<span>签约</span>	
					<input type="radio" name="state" id="" value="7">
					<span>结佣</span>
				</dd>
			</dl> -->
			<dl class="fanglist-btn">
				<span class="agree" >同意</span>
				<span class="refuse">拒绝</span>
			</dl>		
			<dl class="success">
				<dd>
					<dt>成功原因：</dt>
					<textarea name="success" id="success" cols="72" rows="8" required></textarea>
				</dd>
			</dl>
			<dl class="fail">
				<dd>
					<dt>失败原因：</dt>
					<textarea name="fail" id="fail" cols="72" rows="8" required></textarea>
				</dd>
			</dl>
			<dl class="sub">
				<input type="hidden" name="id" class="id">
				<a href="javascript:void(0);"  class="btn" id="addclient">修改信息</a>
				<a href="javascript:void(0);" class="return btn">返回</a>
			</dl>
		</form>
	</div>	
</div>
<script type="text/javascript">
	$(function(){
		$(".menubar ul li").eq(2).addClass("active").siblings().removeClass("active");
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

		$(".f-li").hover(
			function(){
				$(this).addClass("focus");
				$(this).children(".last").addClass("gps");
				$(this).children(".last").children("span").show();
				var id = $(this).find("td:first").html();
				//alert(id);
				$.ajax({
				         type: "POST",
				         url: "<?php echo U('Fang/reason');?>",
				         dataType:'text',
				         data: {id:id},
				         success: function(data){
				      		$(".dataspan").html(data);
				         	}
				     });

			},
			function(){
				$(this).removeClass("focus");
				$(this).children(".last").removeClass("gps");
				$(this).children(".last").children("span").hide();
			}
		)

		$(".changeBtn").click(function(){
			var id = $(this).parent(".f-li").find("td:first").html();
			//alert(id);
			$("input[name=id]").val(id); //赋给hidden域
			$("#bg,#tj").show();
			$.ajax({
			         type: "POST",
			         url: "<?php echo U('Fang/rstutas');?>",
			         dataType:'text',
			         data: {id:id},
			         success: function(data){
			      		$('.c-st').html(data);
			         	}
			     });
		});
		$('#addclient').click(function(){
			var id = $("input[name=id]").val();
			//alert(id);
			var success = document.getElementById('success').value;
			var fail = document.getElementById('fail').value;
			$.ajax({
			         type: "POST",
			         url: "<?php echo U('Fang/status');?>",
			         dataType:'text',
			         data: {id:id,success:success,fail:fail},
			         success: function(data){
			      		alert(data);
			      		$("#bg,#tj").hide();
			      		history.go(0);
			         	}
			     });
		})
		
		$("#tit a").click(function(){
			$("#bg,#tj").hide();
		});
		$(".agree").click(function(){
			$(".success,.sub").show();
			$(".fail,.fanglist-btn").hide();
		})
		$(".refuse").click(function(){
			$(".fail,.sub").show();
			$(".success,.fanglist-btn").hide();
		})
		$(".return").click(function(){
			//$('input[type="radio"]:checked').attr("checked",false); 
			document.getElementById('success').value= '';
			document.getElementById('fail').value= '';
			$(".fanglist-btn").show();
			$(".success,.fail,.sub").hide();
		})
	});	
</script>
	</body>
</html>