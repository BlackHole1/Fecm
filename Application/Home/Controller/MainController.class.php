<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends Controller {
	public function _initialize(){
		if(!login()){
			header("Location: ../");
			return false;
		}
	}
	public function index(){
		$reportForm = M('bugdata');	//连接fecm_bugdata数据库
		$dateTimeLabels = [];
		$dateTimeTotal = [];
		for($i = 0;$i < 7;$i++){ 	//获取近7天的数据
			$time = date("Y-m-d",strtotime(-$i." day"));
			array_unshift($dateTimeLabels,$time);
			$data['time'] = array('like','%'.$time.'%');
			array_unshift($dateTimeTotal,$reportForm->where($data)->count());
		}
		$reportForm = json_encode(["Labels" => $dateTimeLabels,"Total" => $dateTimeTotal]);	//转化成json格式
		$this->assign('reportForm',$reportForm)->assign('total',total());	//交给前端模块
		$this->display();	//前端页面生成
	}
}
