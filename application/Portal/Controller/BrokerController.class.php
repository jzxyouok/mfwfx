<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 经纪人页面
 */
class BrokerController extends HomeBaseController{
	public   function _initialize() {
      		parent::_initialize();
        		if(empty($_SESSION['id'])){
		            $this->error('请先登陆',U('Login/login'));
		}
	}
	/*经纪人主页面*/
	public function index(){
		$count = M('Fx_user')->where(array('u_id'=>session('id')))->count();
		$res = M('Fx_user')->where(array('u_id'=>session('id')))->limit($page->firstRow.','.$page->listRows)->select();
		$page = new\Page($count,10);
		$show = $page->show();
		$this->assign('res',$res);
		$this->assign('page',$show);
		$this->assign('count',$count);
		$this->display();
	}
	/*经纪人增加页面*/
	public function add(){
		$this->display();
	}
	/*接收经纪人增加页面数据*/
	public function post(){
		$_validate = array(
			array('loginname','require','经纪人姓名不能为空！'), //默认情况下用正则进行验证  
			array('loginname','','帐号已经存在',1,'unique',3), // 在新增的时候验证name字段是否唯一    
			array('loginname', '/^(1){1}[0-9]{10}$/ ', '请以手机号码注册', 2, 'regex'),  
     			array('password','require','经纪人密码不能为空'), //默认情况下用正则进行验证    
     			array('password', '/^[0-9a-zA-Z]{6,16}$/', '请输入6-16位数字', 2, 'regex'),
     			array('rpassword','password','确认密码不一至',0,'confirm'), // 验证确认密码是否和密码一致 
     			array('name','require','经纪人真实姓名不能为空！'), //默认情况下用正则进行验证 
		);
		$data = array(
			'loginname'=>I('post.loginname'),
			'password'=>md5(I('post.password')),
			'name'=>I('post.name'),
			'sex'=>I('post.sex'),
			'u_id'=>I('post.u_id'),
		);
		if(M('Fx_user')->validate($_validate)->create()){
			$id= M('Fx_user')->data($data)->add();
			M('Fx_commission')->data(array('c_id'=>$id))->add();
			if($id){
				$this->success('增加成功');
			}else{
				$this->error('增加失败');
			}
		}else{
			$this->error(M('Fx_user')->getError());
		}
	}
	/*删除经纪人*/
	public function del(){
		if(M('Fx_user')->where(array('id'=>I('get.id')))->delete()){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}