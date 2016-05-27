<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>FECM平台-数据可视化</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/library/bootstrap/bootstrap.css" /><link rel="stylesheet" type="text/css" href="/Public/css/library/sweetalert.css" /><link rel="stylesheet" type="text/css" href="/Public/css/base/base.css" />
</head>
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
<div class="container">
	<blockquote>
		<h3>近七天漏洞发现数量对比图</h3>
	</blockquote>
	<canvas id="Statistics" style="width: 848px; height: 250px;"></canvas>
</div>
</body>
<script type="text/javascript" src="/Public/js/library/jquery.js"></script><script type="text/javascript" src="/Public/js/library/bootstrap.js"></script><script type="text/javascript" src="/Public/js/library/Chart.js"></script><script type="text/javascript" src="/Public/js/base/base.js"></script>
<script type="text/javascript">
	var lineChartData = {
		labels :eval(<?php echo ($reportForm); ?>)['Labels'],
		datasets : [
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,1)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				data : eval(<?php echo ($reportForm); ?>)['Total']
			}
		]
	}
	var myLine = new Chart(document.getElementById("Statistics").getContext("2d")).Line(lineChartData);
</script>
</html>