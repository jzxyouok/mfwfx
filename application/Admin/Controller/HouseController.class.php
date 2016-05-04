<?php

/**
 * 房源管理
 */
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class HouseController extends AdminbaseController {
    function _initialize() {

	}
    //后台框架房源管理 
    public function index() {
            $count =  M('Fx_building')->count();
            $page = new \Page($count,10);
            $show = $page->show();
            $res  =  M('Fx_building')->limit($page->firstRow . ',' . $page->listRows)->select();
            $this->assign('Page',$show);
            //dump($res);
            $this->assign('res',$res);
            $this->display();
    }
    //显示添加房源
    public function add(){
            $outfit = M('Fx_institution')->where(array('status'=>01))->field('code,outfit')->select();
            $this->assign('outfit',$outfit);
    	$this->display();
    }

    //接收房源
    public function post(){
            $_validate = array(
                    array('picture_dir','require','房源图片不能为空'),
                    array('name','requite','楼盘名不能为空'),
                    array('addr','requite','楼盘地址不能为空'),
                    array('aveprice','requite','楼盘参考价不能为空'),
                    array('tel','requite','楼盘电话不能为空'),
                    array('propertytypes','requite','物业类型不能为空'),
                    array('redecorate','requite','装修情况不能为空'),
                    array('developer','requite','开发商不能为空'),
                    array('city','requite','区域不能为空'),
                    array('num','requite','客源佣金不能为空'),
                );
          if(M('Fx_building')->validate($_validate)->create()){
                $this->error('增加失败');
            }else{
                $arr = array(
                        'picture_dir'=>I('post.picture_dir','','htmlspecialchars'),
                        'distributor_id'=>I('post.distributor_id'),
                        'property'=>I('post.property'),
                        'floor'=>I('post.floor'),
                        'attribute'=>I('post.attribute'),
                        'selling'=>I('post.selling'),
                        'discount'=>I('post.discount'),
                        'commission_rule'=>I('post.commission_rule'),
                        'status'=>I('post.status','','htmlspecialchars'),
                        'name'=>I('post.name','','htmlspecialchars'),
                        'addr'=>I('post.addr','','htmlspecialchars'),
                        'aveprice'=>I('post.aveprice','','intval'),
                        'tel'=>I('post.tel','','intval'),
                        'opentime'=>strtotime(I('post.opentime')),
                        'roomtime'=>strtotime(I('post.roomtime')),
                        'propertytypes'=>I('post.propertytypes','','htmlspecialchars'),
                        'redecorate'=>I('post.redecorate','','htmlspecialchars'),
                        'developer'=>I('post.developer','','htmlspecialchars'),
                        'city'=>I('post.city','','htmlspecialchars'),
                        'num'=>I('post.num','','intval'),
                        'housetype_dir'=>json_encode(I('post.photos_url')),
                        'img_dir'=>json_encode(I('post.img_url')),
                        'outfit_id'=>I('post.outfit_id','','intval')
                    );
                if(M('Fx_building')->add($arr)){
                    $this->success('增加成功');
                }else{
                    $this->error('增加失败');
                }
            }
    }

    //房源编辑
    public function edit(){
        $this->display();
    }
    //删除房源
    public function delete(){
         if(isset($_GET['id'])){
            $id = intval(I("get.id"));
            if (M('Fx_building')->where("id=$id")->delete()) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        }
        if(isset($_POST['ids'])){
            $ids=join(",",$_POST['ids']);
            if (M('Fx_building')->where("id in ($ids)")->delete()) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        }
    }

    //审核房源
   public  function check(){
        if(isset($_POST['ids']) && $_GET["status"]){
            $data["status"]=01;
                
            $ids=join(",",$_POST['ids']);
            
            if ( M('Fx_building')->where("id in ($ids)")->save($data)!==false) {
                $this->success("审核成功！");
            } else {
                $this->error("审核失败！");
            }
        }
        if(isset($_POST['ids']) && $_GET["unstatus"]){
                
            $data["status"]=00;
            $ids=join(",",$_POST['ids']);
            if ( M('Fx_building')->where("id in ($ids)")->save($data)!==false) {
                $this->success("取消审核成功！");
            } else {
                $this->error("取消审核失败！");
            }
        }
    }
}

