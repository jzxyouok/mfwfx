<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 楼盘分销页面
 */
class FxlpController extends HomeBaseController{
	//楼盘页面首页
	public function index(){
		$where['city']= I('get.qy');
		$so['name'] = I('get.so');
		$getsoss = trim(strip_tags(I('post.soss','','htmlspecialchars')));
		$soss['name']  = array('like', "%$getsoss%");
		if($where['city'] == NULL){
				$count = M("Fx_building")->count();//查询分页中的楼盘总数
				$page = new\Page($count,5);
				$show = $page->show();
				$fang = M('Fx_building')
					->order('id DESC')
					->limit($page->firstRow.','.$page->listRows)
					->select();//查询所有楼盘.
				$this->assign('fang',$fang);
				$this->assign('page',$show);
			}elseif ($so['name'] == 1) {
				$count = M("Fx_building")->where($soss)->count();//查询分页中的楼盘总数
				$page = new\Page($count,5);
				$show = $page->show();
				$fang = M('Fx_building')
					->order('id DESC')
					->where($soss)
					->limit($page->firstRow.','.$page->listRows)
					->select();//查询所有楼盘.
				$this->assign('fang',$fang);
				$this->assign('page',$show);	
			}else{
				$count = M("Fx_building")->where($where)->count();//查询分页中的楼盘总数
				$page = new\Page($count,5);
				$show = $page->show();
				$fang = M('Fx_building')
					->order('id DESC')
					->where($where)
					->limit($page->firstRow.','.$page->listRows)
					->select();//查询所有楼盘.
				$this->assign('fang',$fang);
				$this->assign('page',$show);
			}
			$this->display();
	
	}
	//楼盘详细页面
	public function fxlist(){
		$fanglist = M('Fx_building')->where(array('id'=>I('get.id')))->select();
		$img_dir = json_decode($fanglist['0']['img_dir'],true);
		$fang = json_decode($fanglist['0']['housetype_dir'],true);
		$this->assign('img_dir',$img_dir);
		$this->assign('img',$fang);
		$this->assign('fanglist',$fanglist);
		$this->display();
	}
	//最新最热
	public function so(){
		$count = M("Fx_building")->order('num ASC')->count();//查询分页中的楼盘总数
		$page = new\Page($count,5);
		$show = $page->show();
		$fang = M('Fx_building')
			->order('num ASC')
			->limit($page->firstRow.','.$page->listRows)
			->select();//查询所有楼盘.
			//$this->ajaxReturn($fang);
			//dump($fang);
			echo json_encode($fang);
			$this->assign('page',$show);
	}

	public function hot(){
		$count = M("Fx_building")->order('involved DESC')->count();//查询分页中的楼盘总数
			$page = new\Page($count,5);
			$show = $page->show();
			$fang = M('Fx_building')
				->order('involved DESC')
				->limit($page->firstRow.','.$page->listRows)
				->select();//查询所有楼盘.
			echo json_encode($fang);
			$this->assign('page',$show);	
	}
	public function news(){
		$count = M("Fx_building")->order('id DESC')->count();//查询分页中的楼盘总数
			$page = new\Page($count,5);
			$show = $page->show();
			$fang = M('Fx_building')
				->order('id DESC')
				->limit($page->firstRow.','.$page->listRows)
				->select();//查询所有楼盘.
			echo json_encode($fang);
			$this->assign('page',$show);	
	}
}