<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class BrokerController extends AdminbaseController{
	public function index(){
		$keyword = I('post.keyword');
		$where['loginname'] = array('like',"$keyword");
		if(!empty($keyword)){
			$data = M('Fx_user')->where($where)->select();
			//echo M('Fx_user')->getLastSql();
			if(empty($data)){
				$this->error('没有查询到客户信息~！');
			}else{
				$this->assign('user',$data);
			}
		}else{
			$count = M('Fx_user')->count();
			$page = new\Page($count,12);
			$show = $page->show();
			$user = M('Fx_user')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('user',$user);
			$this->assign('count',$count);
			$this->assign('page',$show);
			
		}
		$this->display();
	}

	//删除
	function delete(){
	if(M('Fx_customer')->where(array('a_id'=>I('get.id')))->field()){
		$this->error('经纪人旗下已有客户，禁止删除！');
	}else{
		if(isset($_POST['id'])){
		            $id = implode(",", $_POST['id']);
		            if (M('Fx_user')>where("id in ($id)")->delete()) {
		                $this->success("删除成功！");
		            } else {
		                $this->error("删除失败！");
		            }
	       	}else{
		            if(isset($_GET['id'])){
		                $id = intval(I("get.id"));
		                if (M('Fx_user')->where(array('id'=>$id))->delete()) {
		                    $this->success("删除成功！");
		                }else{
		                    $this->error("删除失败！");
		                }
		            }
		        }
		}	
	}
	//机构帐号权限设定
	public function mechanism(){
		if(M('Fx_user')->where(array('id'=>I('get.id')))->save(array('r_id'=>'3'))){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
	}
	//房源商权限设定
	public function providers(){
		if(M('Fx_user')->where(array('id'=>I('get.id')))->save(array('r_id'=>'2'))){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
	}


}