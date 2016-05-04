<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 首页
 */
class IndexController extends HomeBaseController{
	//首页查询方法
	public function index(){
		$num['num'] = M('Fx_customer')->where(array('a_id'=>$_SESSION['id']))->field('a_id')->count();// 查询用户推荐客源
		$distributor_id = M('Fx_building')->where(array('a_id'=>$_SESSION['id']))->field('distributor_id')->count();
		//dump($distributor_id);
		$img['img'] = M('Fx_user')->where(array('id'=>$_SESSION['id']))->getField('img');//查询当前用户头像
		//s_id为用户带看状态1.审核2.预约3.到访4.认筹5.认购6.签约7.结佣
		$fang['fang'] = M('Fx_customer')->where(array('a_id'=>$_SESSION['id'],'s_id'=>7))->count();//查询当前用户成交房源套数
		$total_money = M('Fx_commission')->where(array('c_id'=>$_SESSION['id']))->field('total_money,agent_money')->select();//当前用户总佣金
		$building = M('Fx_building')->order('id desc')->limit('8')->select();//查询活动楼盘
		//dump($building);
		$count['countnum'] = M('Fx_user')->where(array('u_id'=>session('id')))->count();//我的经纪人总数
		$this->assign($count);
		$this->assign('distributor_id',$distributor_id);
		$this->assign('building',$building);
		$this->assign('money',$total_money);
		$this->assign($fang);
		$this->assign($img);
		$this->assign($num);
		$this->display();
	}
	//接收首页提交推荐用户信息
	public function dosave(){
		$data = array(
			'name'=>I('post.name'),
			'tel'=>I('post.tel'),
			'city'=>I('post.city'),
			'buliding'=>I('post.buliding'),
			'sex'=>I('post.sex'),
			'house'=>I('post.house'),
			'area'=>I('post.area'),
			'price'=>I('post.price'),
			'a_id'=>I('post.a_id'),
		);
	 //验证规则
	        $validate = array(
	            array('name','require','姓名不能为空！'), //默认情况下用正则进行验证
	            array('tel','','客户已被推荐！',1,'unique',3), // 在新增的时候验证name字段是否唯一   
	            array('tel','require','手机号码不能为空'), //默认情况下用正则进行验证
	            array('tel', '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/', '手机号码不正确错误', 2, 'regex'),
	            array('city','require','区域不能为空！'), //默认情况下用正则进行验证
	            array('buliding','require','意向楼盘不能为空！'), //默认情况下用正则进行验证
	            array('area','require','意向面积不能为空！'), //默认情况下用正则进行验证
	            array('price','require','意向价格不能为空！'), //默认情况下用正则进行验证
	        );
	        if(M('Fx_customer')->validate($validate)->create()){
	        	if($_SESSION['r_id'] == '2'){
			echo '房源商不能推荐客户';
		}elseif($_SESSION['r_id'] == '3'){
			echo '机构不能推荐客户';
		}else{
			//$num = M('Fx_building')->where(array('name'=>$data['buliding']))->getField('num');
			if(/*M('Fx_commission')->where(array('c_id'=>session('id')))->setInc('total_money',$num)&& */M('Fx_building')->where(array('name'=>$data['buliding']))->setInc('involved') && M('Fx_customer')->data($data)->add()){
				echo '推荐成功';
			}else{
				echo '推荐失败';
			}
		}
	        }else{
	        	echo M('Fx_customer')->getError();
	        }
	}


}