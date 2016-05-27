<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>FECM平台-漏洞详情</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/library/bootstrap/bootstrap.css" /><link rel="stylesheet" type="text/css" href="/Public/css/library/sweetalert.css" /><link rel="stylesheet" type="text/css" href="/Public/css/base/base.css" /><link rel="stylesheet" type="text/css" href="/Public/css/branch/details.css" /></head>
<body>
	<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">FECM平台</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="/Main">数据可视化<span class="sr-only">(current)</span></a></li>
				<li><a href="/Details">漏洞详情</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://wpa.qq.com/msgrd?v=3&uin=158099591&site=qq&menu=yes" target="_blank">By:Black-Hole</a></li>
			</ul>
		</div>
	</div>
</nav>
	<?php if((count($bugDataInfo)) > "0"): ?><div class="container">
		<ul class="details-list">
		<?php if(is_array($bugDataInfo)): $i = 0; $__LIST__ = $bugDataInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
				<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
				<div class="item-card">
					<span><?php echo ($vo["url"]); ?></span>
					<small class="<?php echo ($vo["fixes"]); ?>"></small>
					<span><?php echo ($vo["time"]); ?></span>
				</div>
				</a>
				<div class="btn-group">
					<button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">功能</button>
					<ul class="dropdown-menu pull-right">
					<span class="hidden"><?php echo ($vo["id"]); ?></span>
					<?php if(($vo["fixes"]) == "background-red"): ?><li>
							<a onclick="fixesVul(this)"><span class="glyphicon glyphicon-edit"></span>已修复</a>
						</li><?php endif; ?>
						<li>
							<a onclick="deleteVul(this)"><span class="glyphicon glyphicon-trash"></span>删除</a>
						</li>
					</ul>
				</div>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<?php else: ?>
	<blockquote>
		<span>暂无攻击，请继续保持</span>
	</blockquote><?php endif; ?>
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">漏洞详情</h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="/Public/js/library/jquery.js"></script><script type="text/javascript" src="/Public/js/library/bootstrap.js"></script><script type="text/javascript" src="/Public/js/library/sweetalert.js"></script><script type="text/javascript" src="/Public/js/library/Chart.js"></script><script type="text/javascript" src="/Public/js/base/base.js"></script>
<script type="text/javascript">
function deleteVul(val){
	swal({
		type: "warning",
		title: "",
		text: '你将会删除此漏洞详情',
		html: true,
		showCancelButton: true,
		cancelButtonText:"取消",
		confirmButtonText:"确定"
	},
	function(){
		var valId = $(val).parents("ul:first").find("span:first").text();
		$.getJSON('/Api/deleteVul/id/' + valId,function(json){
			swal(json.typeMsg, json.msgText, json.typeMsg);
			if(json.refresh == 1){
				location.reload(true);
			}
		});
	});
}
function fixesVul(val){
	swal({
		type: "warning",
		title: "",
		text: '此漏洞状态将会修改为“已修复”',
		html: true,
		showCancelButton: true,
		cancelButtonText:"取消",
		confirmButtonText:"确定"
	},
	function(){
		var valId = $(val).parents("ul:first").find("span:first").text();
		$.getJSON('/Api/fixesVul/id/' + valId,function(json){
			swal(json.typeMsg, json.msgText, json.typeMsg);
			if(json.refresh == 1){
				location.reload(true);
			}
		});
	});
}
$(".details-list>li>a").click(function(){
	var valId = $(this).next().find("ul span:first").text();
	$.getJSON('/Api/findVul/id/' + valId,function(json){
		if(json.typeMsg == "error"){
			location.reload(true);
		}
		$(".modal-body").html('\
			<p>\
				<span class="glyphicon glyphicon-link"></span>\
				<b><span>URL：</span></b>\
				<i>'+json.msgText.url+'</i>\
			</p>\
			<p>\
				<span class="glyphicon glyphicon-bookmark"></span>\
				<b><span>Category：</span></b>\
				<i>'+json.msgText.category+'</i>\
			</p>\
			<p>\
				<span class="glyphicon glyphicon-certificate"></span>\
				<b><span>Cookie：</span></b>\
				<i>'+json.msgText.cookies+'</i>\
			</p>\
			<p>\
				<span class="glyphicon glyphicon-user"></span>\
				<b><span>User-Agent：</span></b>\
				<i>'+json.msgText.ua+'</i>\
			</p>\
			<p>\
				<span class="glyphicon glyphicon-user"></span>\
				<b><span>HTTP_X_FORWARDED_FOR：</span></b>\
				<i>'+json.msgText.hxff_ip+'</i>\
			</p>\
			<p>\
				<span class="glyphicon glyphicon-user"></span>\
				<b><span>HTTP_CLIENT_IP：</span></b>\
				<i>'+json.msgText.hci_ip+'</i>\
			</p>\
			<p>\
				<span class="glyphicon glyphicon-user"></span>\
				<b><span>REMOTE_ADDR：</span></b>\
				<i>'+json.msgText.ra_ip+'</i>\
			</p>\
			<p>\
				<span class="glyphicon glyphicon-time"></span>\
				<b><span>Time：</span></b>\
				<i>'+json.msgText.time+'</i>\
			</p>\
		');
	});
});
</script>
</html>