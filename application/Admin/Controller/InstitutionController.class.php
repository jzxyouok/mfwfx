<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
//机构管理控制器
class InstitutionController extends AdminbaseController
{
	public function index(){
		//查询所有机构
		$inst_model = M('fx_institution');
		$count=$inst_model->where(array("status"=>'01'))->count();
		$page = $this->page($count, 5);
		$results=$inst_model->order(array("create_time"=>"DESC"))->limit($page->firstRow . ',' . $page->listRows)->select();		
		//var_dump($page);exit;
		//var_dump($results);exit;
		$this->assign('Page',$page->show('Admin'));
		$this->assign('list',$results);
		$this->display();
	}
	//显示添加页面
	public function addInst(){
		$this->display();
	}
	//执行添加
	public function doAdd(){
		$_validate = array(
			array('outfit','require','机构级别不能为空！'), //默认情况下用正则进行验证  
			array('outfit','','机构级别已经存在',1,'unique',3), // 在新增的时候验证outfit字段是否唯一    
			array('code','require','机构代码不能为空！'), //默认情况下用正则进行验证  
			array('u_id','require','所属用户ID不能为空！'), //默认情况下用正则进行验证  
			array('desc','require','机构备注不能为空！'), //默认情况下用正则进行验证
			array('name','require','机构名称不能为空！'), //默认情况下用正则进行验证
		);
		$data = array(
			'code'=>I('post.code'),
			'outfit'=>I('post.outfit'),
			//'u_id'=>I('post.u_id'),
			'status'=>'01',
			'desc'=>I('post.desc'),
			'level'=>I('post.level'),

		);
		if(M('Fx_institution')->validate($_validate)->create()){
			if(M('Fx_institution')->add($data)){
				$this->success('添加成功',U("Institution/index"),3);
			}else{
				$this->error('添加失败',U("Institution/addInst"),3);
			}
		}else{
			$this->error(M('Fx_user')->getError());
		}
	}
	//修改机构信息
	public function modInst(){
		$id=I('get.id');
		$results = M('fx_institution')->where(array('id'=>$id))->find();
		$this->assign('results',$results);
		$this->display();
	}
	//修改机构信息
	public function doMod(){
		$id = $_POST['id'];
		if(!empty($_POST)){
			$res = M('fx_institution')->where(array('id'=>$id))->save($_POST);
			if($res){
				$this->success('修改成功',U("Institution/index"),3);
			}else{
				$this->error('修改失败',U("Institution/index"),3);
			}
		}
	}
	
	//删除机构信息方法  不删除数据，更改状态值
	public function delInst(){
		if(M('fx_institution') ->where(array('id'=>I('get.id')))->delete()){
			$this->success('删除成功',U("Institution/index"));
		}else{
			$this->error('删除失败',U("Institution/index"));
		}
	}
}
