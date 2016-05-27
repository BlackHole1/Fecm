<?php
namespace Home\Controller;
use Think\Controller;
class DetailsController extends Controller {
	public function index(){
		if(!login()){
			header("Location: ../");
			return false;
		}
		$bugData = M('bugdata');
		$bugDataInfo = $bugData->order('id desc')->select();
		for($i = 0;$i<count($bugDataInfo);$i++){
			$bugDataInfo[$i]['fixes'] = ($bugDataInfo[$i]['fixes'] == 0)?"background-red":"background-green";
		}
		$x = "";
    	$this->assign('bugDataInfo',$bugDataInfo)->assign('x',$x);
		$this->display();
	}
}
