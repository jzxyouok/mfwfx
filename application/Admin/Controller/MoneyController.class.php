<?php
/**
 * 资金管理
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class MoneyController extends AdminbaseController {
	//查询所有经纪人
	public function index(){
		$count = M('Fx_user')->where(array('r_id'=>1))->count();
		$page = new\Page($count,8);
		$show = $page->show();
		$user = M('Fx_user')->limit($page->firstRow.','.$page->listRows)->where(array('r_id'=>1))->select();
		$this->assign('user',$user);
		$this->assign('page',$show);
		$this->display();
	}
	//删除经纪人，如果有旗下有客户禁止删除
	public function del(){
		if(M('Fx_customer')->where(array('a_id'=>I('get.id')))->field()){
			$this->error('经纪人旗下已有客户，禁止删除！');
		}else{
			if(M('Fx_user')->where(array('id'=>I('get.id')))->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		 
		}
	}
	//查询经纪人旗下客户
	public function client(){ 
		$customer = M('Fx_customer')->where(array('a_id'=> I('get.id','intval')))->select();
		if($customer){	
			$this->assign('customer',$customer);
		}else{
			$this->error('没有客户');
		}
		$this->display();
	}
	//删除经纪人旗下客户
	public function delclient(){
		if(M('Fx_customer')->where(array('id'=>I('get.id')))->delete()){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
	}

	//修改经纪旗下客户状态
	public function stutas(){
		if(M('Fx_customer')->where(array('id'=>I('post.id')))->save(array('s_id'=>I('post.s_id')))){
			echo "修改成功";
		}else{
			echo "修改失败";
		}
	}

	//接收发放佣金
	public function fmoney(){
		$id = I('post.id');
		$num = I('post.num');
		$where= array(
				'rstutas'=>'1',
				'id'=>$id,
				'status'=>'02',
			);
		$where['s_id'] =array('ELT','8');
		if(M('Fx_customer')->where($where)->select()){ //查询当前客户状态佣金状态
			echo "客户状态不能结佣金！";
		}elseif (M('Fx_customer')->where(array('rstutas'=>2))->select()) {
			echo "客户状态已终结不能结佣金！";	
		}else{
			$a_id = M('Fx_customer')->where(array('id'=>$id))->getField('a_id');//查询当前客户所属经纪人ID
			if(!empty($a_id)){
				//$num = M('Fx_building')->where(array('name'=>$a_id['0']['buliding']))->getField('num');
				if(!empty($num)){
					if(M('Fx_commission ')->where(array('c_id'=>$a_id))->field('agent_money')->setInc('agent_money',$num)){
						M('Fx_customer')->where(array('id'=>$id))->save(array('s_id'=>'8','status'=>'02'));
						echo "发放成功";
					}else{
						echo "发放佣金失败";
					}
				}else{
					echo "发放佣金失败";
				}
				
			}else{
				echo "发放佣金失败";
			}
		}

	}
}