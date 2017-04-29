<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller {
	public function deleteVul(){
		if(!login()){
			header("Location: ../");
			return false;
		}
		$vulId = I('get.id','','int');
		if(I('get.id','','int') == ""){
			$this->ajaxReturn(array(
				"typeMsg"   =>  "error",
				"errorText" =>  "请确认您要删除漏洞详情的Id是否正确",
				"refresh"   =>  "0"
			));
		}
		$bugData = M("bugdata");
		if(count($bugData->where("id = {$vulId}")->find()) == 0){
			$this->ajaxReturn(array(
				"typeMsg" =>  "error",
				"msgText" =>  "请确认您要删除私信的Id是否正确",
				"refresh" =>  "0"
			));
		}
		$bugData->where("id = {$vulId}")->delete();
		$this->ajaxReturn(array(
			"typeMsg" =>  "success",
			"msgText" =>  "删除成功",
			"refresh" =>  "1"
		));
	}
	public function fixesVul(){
		if(!login()){
			header("Location: ../");
			return false;
		}
		$vulId = I('get.id','','int');
		if(I('get.id','','int') == ""){
			$this->ajaxReturn(array(
				"typeMsg"   =>  "error",
				"errorText" =>  "请确认您要修改状态的漏洞Id是否正确",
				"refresh"   =>  "0"
			));
		}
		$bugData = M("bugdata");
		if(count($bugData->where("id = {$vulId} and fixes = 0")->find()) == 0){
			$this->ajaxReturn(array(
				"typeMsg" =>  "error",
				"msgText" =>  "请确认您要修改状态的漏洞Id是否正确",
				"refresh" =>  "0"
			));
		}
		$bugData->where("id = {$vulId}")->setField('fixes','1');
		$this->ajaxReturn(array(
			"typeMsg" =>  "success",
			"msgText" =>  "修改成功",
			"refresh" =>  "1"
		));
	}
	public function findVul(){
		if(!login()){
			header("Location: ../");
			return false;
		}
		$vulId = I('get.id','','int');
		if(I('get.id','','int') == ""){
			$this->ajaxReturn(array(
				"typeMsg"   =>  "error",
				"errorText" =>  "请确认您要查询的漏洞Id是否存在",
			));
		}
		$bugData = M("bugdata");
		if(count($bugData->where("id = {$vulId}")->find()) == 0){
			$this->ajaxReturn(array(
				"typeMsg" =>  "error",
				"msgText" =>  "请确认您要查询的漏洞Id是否存在",
			));
		}
		$this->ajaxReturn(array(
			"typeMsg" =>  "success",
			"msgText" =>  $bugData->where("id = {$vulId}")->find(),
		));
	}
	public function addVul(){
		if(I('get.category','','int') == ""){
			$this->ajaxReturn(array(
				"typeMsg" =>  "error",
				"msgText" =>  "漏洞类型错误",
			));
		}
		switch (I('get.category','','int')) {
			case '1':
				$vul['category'] = "触发alret函数";
				break;
			case '2':
				if(I('get.url') == ""){
					$this->ajaxReturn(array(
						"typeMsg" =>  "error",
						"msgText" =>  "url为空",
					));
				}
				$vul['category'] = "在页面中的javascript里发现了xss攻击代码";
				$vul['xssurl'] = I('get.url');
				break;
			default:
				$this->ajaxReturn(array(
					"typeMsg" =>  "error",
					"msgText" =>  "漏洞类型错误",
				));
				break;
		}
		if($_SERVER['HTTP_X_FORWARDED_FOR'] === null){
			$vul['hxff_ip'] = "攻击者没有通过代理服务器访问";
		}else{
			$vul['hxff_ip'] = I('server.HTTP_X_FORWARDED_FOR');	//获取攻击者的HTTP_X_FORWARDED_FOR
		}
		if($_SERVER['HTTP_CLIENT_IP'] === null){
			$vul['hci_ip'] = "攻击者数据包头部没有HTTP_CLIENT_IP";
		}else{
			$vul['hci_ip'] = I('server.HTTP_CLIENT_IP');//获取攻击者的HTTP_CLIENT_IP
		}
		$vul['ra_ip'] = I('server.REMOTE_ADDR');	//获取攻击者的REMOTE_ADDR
		$vulcookie    = I('cookie.');	//获取攻击者的cookies
		for($i = 0;$i<count($vulcookie);$i++){
			$vul['cookies'] .= array_keys($vulcookie)[$i].'='.$vulcookie[array_keys($vulcookie)[$i]].'; ';	//拼接成方便查看的cookies格式
		}
		$vul['url']   = I('server.HTTP_REFERER');	//获取攻击者攻击成功的url
		$vul['ua']    = I('server.HTTP_USER_AGENT');	//获取攻击者的User-Agent
		$vul['time']  = date("Y-m-d");	//获取攻击者攻击的时间
		$vul['fixes'] = 0;	//默认为漏洞未修复
		$bugData = M('bugdata');	//连接fecm_bugdata数据库
		if($bugData->where("url='".$vul['url']."'")->find() == null){
			$bugData->data($vul)->add();	//添加到数据库中
		}
	}
	public function downPage(){
	if(I('get.url') == ""){
		$this->ajaxReturn(array(
			"typeMsg" =>  "error",
			"msgText" =>  "url为空",
		));
	}
	header("Access-Control-Allow-Origin: *");
	$url = base64_decode(I('get.url'));
	$ch =curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	$result =curl_exec($ch);
	curl_close($ch);
	echo $result;
	}
}
