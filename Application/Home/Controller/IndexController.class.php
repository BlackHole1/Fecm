<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		if(login()){
			header("Location: Main"); 
		}
		$this->display("Login/index");
	}
	public function verify(){
		$Verify = new \Think\Verify();
		$Verify->useImgBg = true; 
		$Verify->entry();
	}
	public function checkLogin(){
		$verify = I('post.verify','');
		$email = I('post.email');
		$password = I('post.password');
		if(!check_verify($verify)){  
			$this->error("验证码错误！",$this->site_url,3);
		}
		if(empty($email) || empty($password)){
			$this->error("账号或密码错误",$this->site_url,3);
		}
		$user = M("user");
		$userCheck = $user->where('email = "'.$email.'" and password = "'.new_md5($password).'"')->find();
		if(is_null($userCheck)){
			$this->error("邮箱或密码错误！",$this->site_url,3);
		}
		cookie(null);
		$username = new_md5($userCheck['name']);
		$passwd = new_md5($password);
		$passwd = create_cookie_password($username,$passwd,$userCheck);
		cookie('uid',$username);
		cookie('flag',$passwd);
		$this->success('登陆成功', '/Main',2);
	}
}