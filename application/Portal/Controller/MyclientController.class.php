<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 我的客户页面
 */
class MyclientController extends HomeBaseController{
	public   function _initialize() {
      		parent::_initialize();
        		if(empty($_SESSION['id'])){
		            $this->error('请先登陆',U('Login/login'));
		        }
	}
	public function index(){
		$status = I('get.status');
		$name = strip_tags(I('post.name','','htmlspecialchars'));
		$where['name']  = array('like', "%$name%");
		$where['a_id'] = $_SESSION['id'];
		if(empty($status) || $status == '0'){
			$count = M('Fx_customer')
					->where(array('a_id'=>$_SESSION['id']))
					->count();
			$page = new\Page($count,15);
			$show = $page->show();
			$data = M('Fx_customer')
					->order('id DESC')
					->where(array('a_id'=>$_SESSION['id']))
					->limit($page->firstRow.','.$page->listRows)
					->select();
			$this->assign('count',$count);
			$this->assign('page',$show);
			$this->assign('data',$data);
		}elseif ($status == '9') {
			$count = M('Fx_customer')
					->where($where)
					->count();
			$page = new\Page($count,15);
			$show = $page->show();
			$data = M('Fx_customer')
					->order('id DESC')
					->where($where)
					->limit($page->firstRow.','.$page->listRows)
					->select();
			$this->assign('count',$count);
			$this->assign('page',$show);
			$this->assign('data',$data);
		}else{
			$count = M('Fx_customer')
					->where(array('a_id'=>$_SESSION['id'],'s_id'=>$status))
					->count();
			$page = new\Page($count,15);
			$show = $page->show();
			$data = M('Fx_customer')
					->order('id DESC')
					->where(array('a_id'=>$_SESSION['id'],'s_id'=>$status))
					->limit($page->firstRow.','.$page->listRows)
					->select();
			$this->assign('count',$count);
			$this->assign('page',$show);
			$this->assign('data',$data);
		}
		$this->display();
	}
}