<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 首页用户登陆页面
 */
class LoginController extends HomeBaseController{
    //首页用户登陆与注册页面
    public function login(){
        $this->display();
    }

    //登录
    public function doLogin(){
   //  dump(I());die;
        //验证规则
        $rules = array(
            array('name','require','用户名必须！'), //默认情况下用正则进行验证
            array('password','require','密码必须！'), //默认情况下用正则进行验证
            array('captcha','require','验证码不能为空！'), //默认情况下用正则进行验证
        );
        $user = M('fx_user');
        if($user->validate($rules)->create()){
            $name = I('post.name');
            $password = I('post.password');
            $code = I('post.captcha');      
            //var_dump($name);exit;     
            //根据登录类型
            if($this->check_verify($code)){
                if(!empty($name) && !empty($password)){
                            //用户登录              
                             $res = M('fx_user')->where(array('loginname'=>$name,'password'=>md5($password)))->select();
                    if($res){
                        //登录成功 写入session
                        session(null); // 清空当前的session
                        session('id',$res['0']['id'],3600);//用户ID
                        session('loginname',$res['0']['name'],3600);//用户名称
                        session('r_id',$res['0']['r_id'],3600);//所属角色ID
                        session('c_id',$res['0']['c_id'],3600);//所属机构ID
                        session('u_id',$res['0']['u_id'],3600);//所属经纪人ID
                        $this->redirect('Index/index'); 
                    }else{
                        $this->redirect('用户不存在',U('Login/login'));
                    }
                }else{
                    $this->redirect('登录失败',U('Login/login'));
                } 
            }else{
                $this->error('验证码错误');
            }  
        }else{
            $this->error($user->getError());
        }   
    }

    //产生验证码方法
    public function captcha(){
        $config = array(
            'fontSize'=>20,
            'length'=>4,
            'useNoise'=>true,
        );
          $Verify = new\Think\Verify($config);
          $Verify->entry();
    }
    //验证验证码是否正确方法
    public function check_verify($code,$id=''){
        $verify = new\Think\Verify();
        return $verify->check($code,$id);
    }

    //退出登录    
    public function logout(){
        session(null);
        if(!session(null)){
            $this->redirect(U('Index/index'));
        }
    }

    //注册页面
    public function reg(){
       // dump(session());
       $_SESSION['send_code'] = $this->random(6,1);
        $this->display();
    }

    //注册页面短信验证
    public function reg_verify(){
        $user=M('Fx_user');
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
        $mp = $_POST['mp'];
        $send_code = $_POST['send_code'];
        $mobile_code = $this->random(6,1);

        if (isset($mp)){
            if (!preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/',trim($mp))){
                //$this->error('手机号填写不正确',U('Index/registration'));
                exit('手机号填写不正确');
            }
        }
        if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
            //防用户恶意请求
            exit('请求超时，请刷新页面后重试');
        }
             if(!$user->where(array('loginname'=>$mp))->find()){
                    if(!$user->where(array('loginname'=>$mp))->find()){
                        $post_data = "account=cf_1531227&password=office556677&mobile=".$mp."&content=".rawurlencode("您本次操作的验证码是：【".$mobile_code."】。请不要把验证码泄露给其他人。如非本人操作，可不用理会！");
                        //密码可以使用明文密码或使用32位MD5加密
                        $gets = $this->xml_to_array($this->Post($post_data, $target));
                        if($gets['SubmitResult']['code']==2){
                            $_SESSION['mp'] = $mp;
                            $_SESSION['mobile_code'] = $mobile_code;
                        }
                        echo $gets['SubmitResult']['msg'];  
                    }else{
                        $gets['SubmitResult']['msg']="此号码已经注册";
                        echo $gets['SubmitResult']['msg'];
                    }
                }else{
                    $gets['SubmitResult']['msg']="系统无此电话号码";
                    echo $gets['SubmitResult']['msg'];
                }
    }

    //注册经纪人
    public function doRegist(){
        $_validate = array(
                 array('loginname','require','帐号不能为空！'), //默认情况下用正则进行验证    
                  array('loginname','','帐号已经存在',1,'unique',3), // 在新增的时候验证name字段是否唯一      
                 array('password', '/^[0-9a-zA-Z]{6,16}$/', '密码不少于6位！', 2, 'regex'),
                 array('rpassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致 
                 array('captcha','require','验证码不能为空！'), //默认情况下用正则进行验证
             );
        $regist = array(
                'loginname'=>I('post.loginname'),
                'name'=>I('post.name'),
                'password'=>md5(I('post.password')),
                'repassword'=>md5(I('post.repassword')),
                'captcha'=>I('post.captcha'),
            );
       // dump($regist);
          $User = M('Fx_user');
            if($User->validate($_validate)->create()){
               if(!empty($_SESSION['send_code']) or $send_code==$_SESSION['send_code']){
                    if($this->check_verify($regist['captcha'])){
                        $id  = $User->data($regist)->add();
                        $res = M('Fx_commission')->data(array('c_id'=>$id))->add();
                        if(!empty($id) && !empty($res)){
                            session(NULL);
                            echo "注册成功";
                        }else{
                            echo '注册失败';
                        }
                    }else{
                         echo '验证码错误';
                    }
                }else{
                        echo "手机验证码不正确";
                }
            }else{
                    exit($User->getError());
            }
    }

    //找回密码
     public function forgetpwd(){
        $_SESSION['send_code'] = $this->random(6,1);
        $this->display();
     }

    //验证找回密码表单
    public function GetPwd(){
        //验证规则
        $rules = array(
            array('loginname','require','电话号不能为空！'), //默认情况下用正则进行验证
            array('loginname', '/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/', '手机号填写不正确', 2, 'regex'),
            array('captcha','require','验证码不能为空！'), //默认情况下用正则进行验证
        );
        $tel = array(
                'loginname'=>I('post.loginname'),
                'captcha'=>I('post.captcha'),
            );
        if(M('Fx_user')->validate($rules)->create()){
                if($this->check_verify($tel['captcha'])){
                    if(M('Fx_user')->where(array('loginname'=>$tel['loginname']))->getField()){
                        echo "1";
                    }else{
                        echo '用户不存在';
                    }
                }else{
                        echo '验证码不正确！';
                }         
            }else{
                        echo M('Fx_user')->getError();
            }
    }
//验证手机验证码
    public function GetPwd_two(){
        $code = intval(I('post.code'));
        if(empty($_SESSION['mobile_code']) or $code !=$_SESSION['mobile_code']){
            echo "验证码不正确！";
        }else{
            echo 1;
        }
    }

//修改密码
    public function forpwd(){
             //验证规则
        $rules = array(
             array('password','require','密码不能为空！'), //默认情况下用正则进行验证
             array('rpassword','require','密码不能为空！'), //默认情况下用正则进行验证
             array('rpassword','password','确认密码不一至',0,'confirm'), // 验证确认密码是否和密码一致 
             array('password','/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/','密码不符合要求！'),
        );
        $data = array(
            'loginname'=>I('post.loginname'),
            'password'=>md5(I('post.password')),
        );
        if(M('Fx_user')->validate($rules)->create()){
                if(M('Fx_user')->where(array('loginname'=>$data['loginname']))->save(array('password'=>$data['password']))){
                    echo '1';
                }else{
                    echo "找回失败";
                }
            }else{
                    echo M('Fx_user')->getError();
             }
    }

    public function checkreg_verify(){
        $user=M('Fx_user');
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";

        $mp = $_POST['mp'];
        $send_code = $_POST['send_code'];
        $mobile_code = $this->random(6,1);

        if (isset($mp)){
            if (!preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/',trim($mp))){
                //$this->error('手机号填写不正确',U('Index/registration'));
                exit('手机号填写不正确');
            }
        }
        
        
        if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
            //防用户恶意请求
            exit('请求超时，请刷新页面后重试');
        }

            $users=$user->where(array('loginname'=>$mp))->find();
            if($users){
                 
                        $post_data = "account=cf_1531227&password=office556677&mobile=".$mp."&content=".rawurlencode("您本次操作的验证码是：【".$mobile_code."】。请不要把验证码泄露给其他人。如非本人操作，可不用理会！");
                        //密码可以使用明文密码或使用32位MD5加密
                        $gets = $this->xml_to_array($this->Post($post_data, $target));
                        if($gets['SubmitResult']['code']==2){
                            $_SESSION['mp'] = $mp;
                            $_SESSION['mobile_code'] = $mobile_code;
                        }
                        echo $gets['SubmitResult']['msg'];  
               
                   
                }else{
                    $gets['SubmitResult']['msg']="系统无此电话号码";
                    echo $gets['SubmitResult']['msg'];
                }
        
    }
  /*$this->random,$this->Post,$this->xml_to_array,三个方法为短信验证使用*/
    public function random($length = 6 , $numeric = 0) {
            PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
                if($numeric) {
                    $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
                } else {
                    $hash = '';
                    $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
                    $max = strlen($chars) - 1;
                    for($i = 0; $i < $length; $i++) {
                        $hash .= $chars[mt_rand(0, $max)];
                    }
                }
                return $hash;
            }
    public function Post($curlPost,$url){

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
            $return_str = curl_exec($curl);
            curl_close($curl);
            return $return_str;
    }
    public function xml_to_array($xml){
            $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
            if(preg_match_all($reg, $xml, $matches)){
                    $count = count($matches[0]);
                    for($i = 0; $i < $count; $i++){
                    $subxml= $matches[2][$i];
                    $key = $matches[1][$i];
                        if(preg_match( $reg, $subxml )){
                            $arr[$key] =$this->xml_to_array( $subxml );
                        }else{
                            $arr[$key] = $subxml;
                        }
                    }
                }
                return $arr;
        }
}
