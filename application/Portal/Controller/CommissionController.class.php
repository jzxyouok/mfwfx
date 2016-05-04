<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 佣金结算页面
 */
class CommissionController extends HomeBaseController{
	public   function _initialize() {
      		parent::_initialize();
        		if(empty($_SESSION['id'])){
		            $this->error('请先登陆',U('Login/login'));
		        }
	}
	public function index(){
		$tel = M('Fx_user')->where(array('id'=>session('id')))->getField('loginname');//查询当前登陆手机号码
		$res = M('Fx_commission')->where(array('c_id'=>session('id')))->select(); // 查询当前用户佣金表信息
		$fang = M('Fx_customer')->where(array('a_id'=>$_SESSION['id'],'s_id'=>7))->count();//查询当前用户成交房源套数
		$this->assign('fang',$fang);
		$this->assign('res',$res);
		$this->assign('tel',$tel);
		$this->display();
	}
	public function dosave(){
		$_validate = array(
			array('bankcard_name','require','真实姓名不能为空！'), //默认情况下用正则进行验证    
     			array('bankcard_bank','require','银行名称不能为空'), //默认情况下用正则进行验证    
     			array('bankcard_id', '/^\d{16}|\d{19}$/', '银行卡位数错误', 2, 'regex'),
			array('bankcard_bank','','银行名称不能为空',1,'unique',3), // 在新增的时候验证name字段是否唯一    
			array('bankcard_id','','银行卡不能为空',1,'unique',3), // 在新增的时候验证name字段是否唯一        
		);
		$data = array(
			'bankcard_name'=>I('post.bankcard_name'),
			'bankcard_bank'=>I('post.bankcard_bank'),
			'bankcard_id'=>I('post.bankcard_id'),
		);
		$commission  = M('Fx_commission');

		if($commission->validate($_validate)->create()){
			if($commission->where(array('c_id'=>session('id')))->save($data)){
				$this->success('增加成功');
			}else{
				$this->error('增加失败');
			}
		}else{
		 	$this->error($commission->getError());
		}
	}
	public function modify(){
		$this->display();
	}

}