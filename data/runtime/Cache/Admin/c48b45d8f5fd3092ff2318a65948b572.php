<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/statics/js/jquery.js"></script>
    <script src="/statics/js/wind.js"></script>
    <script src="/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap jj">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('Money/client');?>">经纪人客户</a></li>
  </ul>
  <div class="common-form">
      <div class="table_list">
	    <table width="100%" class="table table-hover">
	        <thead>
	          <tr>
	            <th width="5%">ID</th>
	            <th width="200">客户名称</th>
	            <th width="200">电话</th>
	            <th width="200">性别</th>
	            <th width="200">楼盘区域</th>
	            <th width="200">意向房型</th>
	            <th width="200">意向面积</th>
	            <th width="200">意向价位</th>
	            <th width="200">意向楼盘</th>
	            <th width="200">修改状态</th>
	            <th width="200">成交状态</th>
	            <th >发放金额</th>
	            <th width="10%">操作</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php if(is_array($customer)): foreach($customer as $key=>$vo): ?><tr>
		            <td><?php echo ($vo["id"]); ?></td>
		            <td><?php echo ($vo["name"]); ?></td>
		            <td><?php echo ($vo["tel"]); ?></td>
			<?php if($vo['sex'] == '1'): ?><td>男</td>
			<?php else: ?>
			<td>女</td><?php endif; ?>
		            <td><?php echo ($vo["house"]); ?></td>
		            <td><?php echo ($vo["house"]); ?></td>
		            <td><?php echo ($vo["area"]); ?>M<sup>2</sup></td>
		            <td>&yen;<?php echo ($vo["price"]); ?>万元</td>
		            <td><?php echo ($vo["buliding"]); ?></td>
				<?php if($vo['status'] == 01): ?><td>
				<select name="s_id" class="s_id" >
					<option value="1" <?php if($vo['s_id'] == 1): ?>selected='selected'<?php endif; ?>>待审核</option>
					<option value="2" <?php if($vo['s_id'] == 2): ?>selected='selected'<?php endif; ?>>待预约</option>
					<option value="3" <?php if($vo['s_id'] == 3): ?>selected='selected'<?php endif; ?>>待到访</option>
					<option value="4" <?php if($vo['s_id'] == 4): ?>selected='selected'<?php endif; ?>>待认筹</option>
					<option value="5" <?php if($vo['s_id'] == 5): ?>selected='selected'<?php endif; ?>>待认购</option>
					<option value="6" <?php if($vo['s_id'] == 6): ?>selected='selected'<?php endif; ?>>待签约</option>
					<option value="7" <?php if($vo['s_id'] == 7): ?>selected='selected'<?php endif; ?>>待结佣<o/option>
					<option value="8" <?php if($vo['s_id'] == 8): ?>selected='selected'<?php endif; ?>>已结佣<o/option>
				</select>
			</td>
				<?php else: ?>
					<td>已发放</td><?php endif; ?>
			<?php if($vo['status'] == 01): if(($vo['s_id'] == 1)): ?><td>待审核</td>
			<?php elseif($vo['s_id'] == 2): ?>
			<!-- s_id为用户带看状态1.待预约2待到访3待认筹4待认购5待签约6待结佣 7待结佣 -->
						<td>待预约</td>
			<?php elseif($vo['s_id'] == 3): ?>
						<td>待到访</td>
			<?php elseif($vo['s_id'] == 4): ?>
						<td>待认筹</td>
			<?php elseif($vo['s_id'] == 5): ?>
						<td>待认购</td>
			 <?php elseif($vo['s_id'] == 6): ?>     
						<td>待签约</td>      
			 <?php elseif($vo['s_id'] == 7): ?> 
						<td>待结佣</td>    
		   	<?php elseif($vo['rstutas'] == 1): ?> 
						<td>已终结</td><?php endif; ?>    
			<?php else: ?>
			<td>已发放</td><?php endif; ?>     
			 <td><input type="text" name="num" class="textnum"/></td>
		            <td>
			            <a href="<?php echo U('Money/delclient',array('id'=>$vo['id']));?>">删除</a>/
				<a href="<?php echo U('Money/fmoney',array('id'=>$vo['id']));?>" class="num">发放佣金</a>
			</td>
	          	</tr><?php endforeach; endif; ?>
			</tbody>
	      </table>
	      <div class="pagination"><?php echo ($page); ?></div>
  	</div>
  </div>
</div>
<script src="/statics/js/common.js?"></script>
<script type="text/javascript">
$(function(){ 
	$(".s_id").change(function(){
		var val = $(this).children("option:selected").val();
		var id = $(this).parent().parent().find("td:first").html();
		$.ajax({
		         type: "POST",
		         url: "<?php echo U('Money/stutas');?>",
		         dataType:'text',
		         cache:'false',
		         data: {s_id:val,id:id},
		         success: function(data){
			       alert(data);
			       window.location.reload();
		         	}
		});
	});
	$('.num').click(function(){
		var num = $(this).parent().prev().children(".textnum").val();
		var id = $(this).parent().parent().find("td:first").html();
		$.ajax({
		         type: "POST",
		         url: "<?php echo U('Money/fmoney');?>",
		         dataType:'text',
		         cache:'false',
		         data: {num:num,id:id},
		         success: function(data){
			       alert(data);
			       window.location.reload();
		         	}
		});
	})
});	
</script>
</body>
</html>