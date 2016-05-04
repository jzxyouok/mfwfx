<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>觅房网房产分销平台</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/khu.css" type="text/css">
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
	<!-- //正文开始 -->	
	<div class="layout">
	<div id="yj" class="mt10">
		<div class="yjjs_info">
			<div class="yjjs_infoL">
				<img src="/tpl/simplebootx/Public/images/member.gif">
			</div>
			<div class="yjjs_infoC">
				<form name="bankcard" id="bankcard" method="post" action="<?php echo U('Commission/dosave');?>">
					<!---->
					<div class="bdcont marbot_01">
						<div class="tit_01">手机号码：</div>
						<input type="text" disabled="disabled" class="input1" id="trueName" autocomplete="off" onfocus="this.className='input2'" onblur="this.className='input1'" value="<?php echo ($tel); ?>" readonly="readonly">
					</div>
					<div class="bdcont marbot_01">
						<div class="tit_01">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</div>
						<input type="text" name="bankcard_name" class="input1" onfocus="this.className='input2'" onblur="this.className='input1'" id="trueName" autocomplete="off" style="float:left;" value="">
						<div style="" class="inptips" id="error2">提交的姓名请务必与卡号开户姓名一致</div>
					</div>
					<div class="bdcont marbot_01">
						<table width="100%" border="0">
							<tbody>
								<tr>
									<td>
										<div class="tit_01">开户银行：</div>
										<input type="text" name="bankcard_bank" class="input1" onfocus="this.className='input2'" onblur="this.className='input1'" id="trueName" autocomplete="off" value="">
									</td>
									<td>
										<div class="tit_01">银行卡号：</div>
										<input type="text" name="bankcard_id" class="input1" onfocus="this.className='input2'" onblur="this.className='input1'" id="trueName" autocomplete="off" value="">
									</td>
									<td>
										<a id="bank_submit" href="javascript:void(0)" class="greenbut_01" onclick="document.getElementById('bankcard').submit();">提交</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!---->
				</form>
			</div>
			<!-- <div class="yjjs_infoR">
				<a href="<?php echo U('Commission/modify');?>" target="_blank">修改个人信息</a>
			</div> -->
		</div>

		<div class="yjjs_txt">
			系统显示佣金为税前值，实际发放佣金需依法扣缴个人所得税。具体应缴额度将依据各地区税务局规定的比例进行扣除，表中税后佣金为参考值（国家标准税率表）
		</div>
		<table id="yj_box" border="1" bordercolor="#cccccc" cellpadding="10"  >
			<tbody>
				<tr class="">
					<th width="16%">客户姓名</th>
					<th width="16%">电话</th>
					<th width="16%">成交楼盘</th>
					<!-- <th width="16%">佣金总额</th> -->
					<th width="16%">佣金余额</th>
					<th width="16%">发放状态</th>
				</tr>
			</tbody>
				<tr>
				<?php if(is_array($res)): foreach($res as $key=>$res): ?><td><?php echo (session('loginname')); ?></td>
					<td><?php echo ($tel); ?></td>
					<td><?php echo ($fang); ?></td>
					<!-- <td>￥<?php echo ($res["total_money"]); ?>元</td> -->
					<td>￥<?php echo ($res["agent_money"]); ?>元</td>
					<?php if($res['status'] == 00): ?><td>可申请</td>
					<?php elseif($res['status'] == 01): ?>
					<td>在审核</td>
					<?php elseif($res['status'] == 02): ?>
					<td>已发放</td><?php endif; endforeach; endif; ?>	
				</tr>
		</table>
		<ul class="ui-paging"></ul>
	</div>
</div>
<div class="mb10"></div>
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
		$(".menubar ul li").eq(4).addClass("active").siblings().removeClass("active");
	})
</script>
	</body>
</html>