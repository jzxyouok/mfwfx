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
     <li class="active"><a href="<?php echo U('Money/index');?>">所有经纪人</a></li>
  </ul>
  <div class="common-form">
      <div class="table_list">
	    <table width="100%" class="table table-hover">
	        <thead>
	          <tr>
	            <th width="50">ID</th>
	            <th>登陆名</th>
	            <th>姓名</th>
	            <th>性别</th>
	            <th>用户头像</th>
	            <th width="120">操作</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
		            <td><?php echo ($vo["id"]); ?></td>
		            <td><?php echo ($vo["loginname"]); ?></td>
		            <td><?php echo ($vo["name"]); ?></td>
			<?php if($vo['status'] == '1'): ?><td>男</td>
			<?php else: ?>
			<td>女</td><?php endif; ?>
		            <td>
		            	<img src="/statics/images/<?php echo ((isset($vo["img"]) && ($vo["img"] !== ""))?($vo["img"]):'member.gif'); ?>" alt="" width="50px" height="50px">
		            </td>
		            <td>
			            <a href="<?php echo U('Money/del',array('id'=>$vo['id']));?>">删除</a>/
				<a href="<?php echo U('Money/client',array('id'=>$vo['id']));?>">我的客户</a>
			</td>
	          	</tr><?php endforeach; endif; ?>
			</tbody>
	      </table>
	      <div class="pagination"><?php echo ($page); ?></div>
  	</div>
  </div>
</div>
<script src="/statics/js/common.js?"></script>
</body>
</html>