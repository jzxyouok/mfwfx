<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 *房源商页面
 *
 */
class FangController extends HomeBaseController{
	public   function _initialize() {
      		parent::_initialize();
        		if(empty($_SESSION['id'])){
		            $this->error('请先登陆',U('Login/login'));
		        }
	}
	public function index(){
		$count = M('Fx_building')->where(array('distributor_id'=>session('id')))->count();
		$page = new\Page($count,15);
		$show = $page->show();
		$res = M('Fx_building')->where(array('distributor_id'=>session('id')))->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('res',$res);
		$this->assign('count',$count);
		$this->assign('page',$show);
		$this->display();
	}
	public function fanglist(){
		$name= I('get.name');
		$id= I('post.id');
		$count = M('Fx_customer')->where(array('buliding'=>$name))->count();
		$page = new\Page($count,15);
		$show = $page->show();
		$res = M('Fx_customer')->where(array('buliding'=>$name))->limit($page->firstRow.','.$page->listRows)->select();
		if(empty($res)){
			$this->error('该楼盘没有客户');
		}else{
			$this->assign('res',$res);
			$this->assign('page',$show);	
		}
		$this->display();
	}
	public function rstutas(){
		$id = I('post.id');
		$rstutas = M('Fx_customer')->where(array('id'=>$id))->field('s_id,rstutas')->select();
		if(empty($rstutas)){
			echo "修改失败";
		}else{
			if($rstutas['0']['rstutas'] == 1){
				if($rstutas['0']['s_id'] == 1){
					echo "当前客户状态为待审核";
				}elseif ($rstutas['0']['s_id'] == 2) {
					echo "当前客户状态为待预约";
				}elseif ($rstutas['0']['s_id'] == 3) {
					echo "当前客户状态为待到访";
				}elseif ($rstutas['0']['s_id'] == 4) {
					echo "当前客户状态为待认筹";
				}elseif ($rstutas['0']['s_id'] == 5) {
					echo "当前客户状态为待认购";
				}elseif ($rstutas['0']['s_id'] == 6) {
					echo "当前客户状态为待签约";
				}elseif ($rstutas['0']['s_id'] == 7) {
					echo "当前客户状态为待结佣";
				}
			}else{
				echo "当前客户状态为客户已终结";
			}
		}
	}
	public function dosave(){
		if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('s_id'=>I('post.s_id')))){
			echo "修改成功";
		}else{
			echo "修改失败";
		}
	}

	public function reason(){
		$reason = M('Fx_customer')->where(array('id'=>I('post.id')))->getField('reason');
		if(empty($reason)){
			echo "没有相关信息";
		}else{
			echo "$reason";
		}
	}
	public function status(){
		$s_id = M('Fx_customer')->where(array('id'=>I('post.id')))->getField('s_id');
		$rstutas = M('Fx_customer')->where(array('id'=>I('post.id')))->getField('rstutas');
		$fail = I('post.fail');
		$id = I('post.id');
		$success = I('post.success');
		//dump(I());die;
		switch ($s_id) {
			case '1':
				if($rstutas == '2'){
					echo "客户已终结，不能修改！";
					continue;
				}
				if(!empty($success)){
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$success)) &&M('Fx_customer')->where(array('id'=>I('post.id')))->setInc('s_id') ){
						echo '修改成功';
					}else{
						echo '修改失败';
					}
					//echo M('Fx_customer')->getLastSql();
				}elseif (!empty($fail)) {
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$fail,'rstutas'=>'2'))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}else{
					echo "修改失败";
				}
				break;
			case '2':
				if($rstutas == '2'){
					echo "客户已终结，不能修改！";
					continue;
				}
				if(!empty($success)){
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$success)) &&M('Fx_customer')->where(array('id'=>I('post.id')))->setInc('s_id') ){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}elseif (!empty($fail)) {
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$fail,'rstutas'=>'2'))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}else{
					echo "修改失败";
				}
				break;
			case '3':
				if($rstutas == '2'){
					echo "客户已终结，不能修改！";
					continue;
				}
				if(!empty($success)){
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$success)) &&M('Fx_customer')->where(array('id'=>I('post.id')))->setInc('s_id') ){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}elseif (!empty($fail)) {
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$fail,'rstutas'=>'2'))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}else{
					echo "修改失败";
				}
				break;
			case '4':
				if($rstutas == '2'){
					echo "客户已终结，不能修改！";
					continue;
				}
				if(!empty($success)){
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$success)) &&M('Fx_customer')->where(array('id'=>I('post.id')))->setInc('s_id') ){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}elseif (!empty($fail)) {
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$fail,'rstutas'=>'2'))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}else{
					echo "修改失败";
				}
				break;	
			case '5':
				if($rstutas == '2'){
					echo "客户已终结，不能修改！";
					continue;
				}
				if(!empty($success)){
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$success)) &&M('Fx_customer')->where(array('id'=>I('post.id')))->setInc('s_id') ){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}elseif (!empty($fail)) {
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$fail,'rstutas'=>'2'))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}else{
					echo "修改失败";
				}
				break;	
			case '6':
				if($rstutas == '2'){
					echo "客户已终结，不能修改！";
					continue;
				}
				if(!empty($success)){
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$success)) &&M('Fx_customer')->where(array('id'=>I('post.id')))->setInc('s_id') ){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}elseif (!empty($fail)) {
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$fail,'rstutas'=>'2'))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}else{
					echo "修改失败";
				}
				break;	
			case '7':
				if($rstutas == '2'){
					echo "客户已终结，不能修改！";
					continue;
				}
				/*if($state == "7"){
					$buliding = M('Fx_customer')->where(array('id'=>$id))->getField('buliding');
					$num = M('Fx_building ')->where(array('name'=>$buliding))->getField('num');
					M('Fx_commission  ')->where(array('c_id'=>$_SESSION['id']))->setInc('total_money',$num);
				}*/
				if(!empty($success)){
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$success))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}elseif (!empty($fail)) {
					if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('reason'=>$fail,'rstutas'=>'2'))){
						echo '修改成功';
					}else{
						echo "修改失败";
					}
					//echo M('Fx_customer')->getLastSql();
				}else{
					echo "修改失败";
				}
				break;		
			default:
					echo "客户已终结，不能修改！";
				break;
		}
	}
}