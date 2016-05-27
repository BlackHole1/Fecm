<?php
function new_md5($value){
	return md5(md5(md5($value)));
}
function total(){
	$total = M('bugdata');
	$total = $total->count();
	return $total;
}
function htmlencoded($value){
	htmlspecialchars($value,ENT_QUOTES);
}
function create_cookie_password($username,$passwd,$userInfo){
	return substr($passwd,0,2).substr($username,3,6).substr($passwd,5,6).substr($username,6,7).substr($passwd,8,11).substr($passwd,18,22).substr($passwd,-8,4).substr($username,-10,3).substr(md5($userInfo['create_date']),19,22).substr(md5($userInfo['create_date']),-7,14);
}
function check_verify($code, $id = ""){  
    $verify = new \Think\Verify();  
    return $verify->check($code, $id);  
}
function login($model='0'){
	$cookie_username = cookie('uid');
	$cookie_password = cookie('flag');
	if($cookie_username == "" && $cookie_password == ""){
		return false;
	}
	$user = M("user");
	$userInfo = $user->where('md5name = "'.$cookie_username.'"')->find();
	if(is_null($userInfo)){
		return $userInfo;
	}
	$passwd = create_cookie_password($cookie_username,$userInfo['password'],$userInfo);	//以数据库中的数据生成的标识符
	if($cookie_password == $passwd){ 	//数据库中生成的标识符和cookies里的FECM_flag对比，如果一样就说明登陆成功
		if($model == "0"){	//login(0)返回当前是否登陆
			return true;
		}elseif($model == "info"){	//login("info")返回登陆后的用户信息
			return $userInfo;
		}
		// return '<span class="glyphicon glyphicon-user"></span><a href="/User/'.$userInfo["name"].'">'.$userInfo["name"].'</a><span class="glyphicon glyphicon-envelope"><i class="'.$redRound.'"></i></span><a href="/User/'.$userInfo["name"].'/PrivateMessage">消息</a><span class="glyphicon glyphicon-cog"></span><a href="">设置</a><span class="glyphicon glyphicon-off"></span><a href="/Login/signout" title="退出">退出</a>';
	}
}