<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>觅房网房产分销平台</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
	<link rel="stylesheet" href="/tpl/simplebootx/Public/css/fang.css" type="text/css">
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
		<ul id="so" class="mt10">
			<div class="kh_content">房源总数为&nbsp;<span><?php echo ($count); ?></span>&nbsp;栋楼盘</div>
		</ul>
	
		<table id="yj_box" border="1" bordercolor="#cccccc" cellpadding="10"  >
			<tbody>
				<tr class="">
					<th>楼盘名</th>
					<th>参与人数</th>
					<th>所属区域</th>
					<th>参考价</th>
					<th>售楼电话</th>
					<th>开发商</th>
					<th>客源佣金</th>
					<th>状态</th>
				</tr>
			</tbody>
			<?php if(is_array($res)): foreach($res as $key=>$v): ?><tr>
						<td><?php echo ($v["name"]); ?></td>
						<td><?php echo ($v["involved"]); ?> 人</td>
						<td><?php echo ($v["city"]); ?></td>
						<td><?php echo ($v["aveprice"]); ?></td>
						<td><?php echo ($v["tel"]); ?></td>
						<td><?php echo ($v["developer"]); ?></td>
						<td>￥<?php echo ($v["num"]); ?>&nbsp;&nbsp;元</td>
						<td>
							<a href="<?php echo U('Fang/fanglist',array('id'=>$v['id'],'name'=>$v['name']));?>">查看客户</a>
						</td>
					</tr><?php endforeach; endif; ?>
		</table>
		    <!-- 分页-->
	<div class="AspNetPager"><div class="paginator"><?php echo ($page); ?></div></div>
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
		
	})
</script>
	</body>

</html>