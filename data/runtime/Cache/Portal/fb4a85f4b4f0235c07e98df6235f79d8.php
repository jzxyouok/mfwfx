<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>觅房网房产分销平台</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/public.css" type="text/css">
		<link rel="stylesheet" href="/tpl/simplebootx/Public/css/client.css" type="text/css">
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
		<ul id="so" class="mt10">
			<li>
				<i>客户状态</i>
				<b>
					<a href="<?php echo U('Myclient/index',array('status'=>0));?>" class="c">不限</a>
					<a href="<?php echo U('Myclient/index',array('status'=>1));?>">审核</a>
					<a href="<?php echo U('Myclient/index',array('status'=>2));?>">预约</a>
					<a href="<?php echo U('Myclient/index',array('status'=>3));?>">到访</a>
					<a href="<?php echo U('Myclient/index',array('status'=>4));?>">认筹</a>
					<a href="<?php echo U('Myclient/index',array('status'=>5));?>">认购</a>
					<a href="<?php echo U('Myclient/index',array('status'=>6));?>">签约</a>
					<a href="<?php echo U('Myclient/index',array('status'=>7));?>">结佣 </a>
				</b>
			</li>
			<form action="<?php echo U('Myclient/index',array('status'=>9));?>" method="post"  id="_form">
				<input type="text" class="txt" name="name" id="k" onblur="if(this.value=='') this.value='输入客户姓名或手机号码进行查询';" onfocus="if(this.value=='输入客户姓名或手机号码进行查询') this.value='';" value="输入客户姓名或手机号码进行查询">
				<input type="submit" class="btn" value="查 询" onclick="document.getElementById('_form').submit();">
				<!--<a href="javascript:void(0);" id="lurukehu" class="btn2">录入客户</a>-->
		</ul>
		<ul id="so" class="mt10">
			<div class="kh_content">客户总数为<span><?php echo ($count); ?></span>位</div>
		</ul>
			<div class="add_tab">
				
			</div>
		<table id="yj_box" border="1" bordercolor="#cccccc" cellpadding="10"  >
			<tbody>
				<tr class="">
					<th width="6%">客户ID</th>
					<th width="12%">客户姓名</th>
					<th width="12%">区域</th>
					<th width="12%">电话</th>
					<th width="12%">意向楼盘</th>
					<th width="12%">意向户型</th>
					<th width="12%">意向面积</th>
					<th width="12%">意向价位</th>
					
					<th width="12%">客户状态</th>
				</tr>
			</tbody>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="f-li">
						<td><?php echo ($v["id"]); ?></td>
						<td><?php echo ($v["name"]); ?></td>
						<td><?php echo ($v["city"]); ?></td>
						<td><?php echo ($v["tel"]); ?></td>
						<td><?php echo ($v["buliding"]); ?></td>
						<td><?php echo ($v["house"]); ?></td>
						<td><?php echo ($v["area"]); ?>&nbsp;M<sup>2</sup></td>
						<td>￥<?php echo ($v["price"]); ?>&nbsp;&nbsp;万元</td>

			<?php if($v['rstutas'] == '1'): if(($v['s_id'] == 1)): ?><td class="changeBtn last">
							待审核
							<span class="dataspan"></span>
						</td>
			<?php elseif($v['s_id'] == 2): ?>
			<!-- s_id为用户带看状态1.待确认2已确认3带看中4带看有效5待结佣6已结佣 7无效客户 -->
						<td class="changeBtn last">
							待预约
							<span class="dataspan"></span>
						</td>
			<?php elseif($v['s_id'] == 3): ?>
						<td class="changeBtn last">
							待到访
							<span class="dataspan"></span>
						</td>
			<?php elseif($v['s_id'] == 4): ?>
						<td class="changeBtn last">
							待认筹
							<span class="dataspan"></span>
						</td>
			<?php elseif($v['s_id'] == 5): ?>
						<td class="changeBtn last">
							待认购
							<span class="dataspan"></span>
						</td>
			 <?php elseif($v['s_id'] == 6): ?>     
						<td class="changeBtn last">
							待签约
							<span class="dataspan"></span>
						</td>      
			 <?php elseif($v['s_id'] == 7): ?> 
						<td class="changeBtn last">
							待结佣
							<span class="dataspan"></span>
						</td> 
			 <?php elseif($v['s_id'] == 8): ?> 
						<td class="changeBtn last">
							已结佣
							<span class="dataspan"></span>
						</td><?php endif; ?>         
			   <?php else: ?>
			   <td>已终结</td><?php endif; ?>
					</tr><?php endforeach; endif; ?>
		</table>
		<ul class="ui-paging"></ul>
	</div> 
    <!-- 分页-->
	<div class="AspNetPager"><div class="paginator"><?php echo ($page); ?></div></div>
		
<!--底部 
	 <p id="bg" style=" display: none;"></p>
	<div id="tj" style="top: 130px; display: none;">
		<ul id="tit">
			<li class="c">新增客户</li>
		</ul>
		<div class="add_kh_close">
			<a id="closeBtn1" class="close_btn1" title="关闭窗口" href="javascript:void(0)" style="color: rgb(153, 153, 153);">×</a>
		</div>
		<form id="tj_form" action="/index.php/fenxiao/add_client" method="post">
		<input type="hidden" class="txt" id="cid" name="=cid" value="">
		<div class="tj_box">
			<dl>
				<dt><i>*</i>姓名</dt>
				<dd><input type="text" class="txt" id="tj_name" name="cname"></dd>
			</dl>
			<dl>
				<dt><i>*</i>手机</dt>
				<dd><input type="text" class="txt" id="tj_mobile" name="mobile"></dd>
			</dl>
			<dl id="lp_str_dl">
				<dt>意向楼盘</dt>
				<dd><input type="text" class="txt" id="lp_str" readonly="true"></dd>
				<input type="hidden" class="txt" id="lp_id_str" name="=fx_id" value="">
			</dl>
			<dl>
				<div class="tanchuang" style="display: none;border: 1px solid #e4e5eb;" id="tanchuang">
					<table width="100%" border="0" cellpadding="6" cellspacing="1">
						<tbody>
							<tr>
								<td colspan="2" bgcolor="#FFF7F2" style="border-bottom:1px solid #e4e5eb;">
									<a id="closeBtn" class="close_btn" title="关闭窗口" href="javascript:void(0)" style="color: rgb(153, 153, 153);">×</a>
								</td>
							</tr>
							<tr>
								<td>
									金科世界城<input type="checkbox" class="chb" id="fx_68" value="68" data-name="金科世界城">
								</td>
								<td>
									浩龙音乐界<input type="checkbox" class="chb" id="fx_180" value="180" data-name="浩龙音乐界">
								</td>    
							</tr>
							<tr>
								<td>
									旷远洋湖18克拉<input type="checkbox" class="chb" id="fx_178" value="178" data-name="旷远洋湖18克拉">
								</td>
								<td>
									梅溪湖金茂悦<input type="checkbox" class="chb" id="fx_179" value="179" data-name="梅溪湖金茂悦">
								</td>    
							</tr>
						</tbody>
					</table>
				 </div>
			</dl>
			<dl>
				<a href="javascript:void(0);" class="btn" target="_top" id="tj_btn" data-subtype="3">提交推荐信息</a>
			</dl>
		</div>
		</form>
	</div>
        <!--底部-->
        <script type="text/javascript">
        	$(function(){
        		$(".menubar ul li").eq(2).addClass("active").siblings().removeClass("active");

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
        		 
        		/*$("#lp_str").click(function(){
        		$("#tanchuang").show();
        		});
        		
        		$("#closeBtn").click(function(){
        		$("#tanchuang").hide();	
        		});
        		
        		$(".chb").click(function(){
                                 var name_str='',id_str='';
                            $(".chb").each(function(){
                                     if($(this).prop("checked") && !$(this).prop("disabled"))
                                {
                                    name_str += $(this).attr("data-name") + ",";
                                    id_str += $(this).val() + ",";
                                }
                            })
                                     name_str = name_str.replace(/(,$)/g, "");
                                      id_str = id_str.replace(/(,$)/g, "");
                            $("#lp_str").val(name_str);
                            $("#lp_id_str").val(id_str);
            })
        		
        		$("#bg").height($(window).height());
        		$("#closeBtn1").click(function(){
        			$("#tj,#bg").hide();
        		});
        		$("#so .btn2").click(function(){
        			$("#tj,#bg").show();
        		});*/
        	})
        </script>
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
	</body>
</html>