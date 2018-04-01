<?php
	require './php/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录页面</title>
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./js/login.js"></script>
    <link rel="stylesheet" href="./css/loginmym.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon"/>
</head>
<body>
	<div class="header">
		<h3>有伴er</h3>
		<span>有伴er，想和您有个伴儿</span>
	</div>
	<div class="con">
	<div class="container" >
		<div class="con_left">
			<span class="con_left1">我</span>
				<span class="con_left2">知</span>
				<span class="con_left3">道</span>
				<span class="con_left4">你</span>
				<span class="con_left5">会</span>
				<span class="con_left6">来</span>
				<!-- <span class="con_left7">，</span> -->
				<br>
				<span class="con_left8">所</span>
				<span class="con_left9">以</span>
				<span class="con_left10">我</span>
				<span class="con_left11">等</span>
				<span class="con_left12">，</span>
				<span class="con_left13">等</span>
				<span class="con_left14">你</span>
				<span class="con_left15">来</span>
				<span class="con_left16">做</span>
				<span class="con_left17">伴</span>
				<span class="con_left18">儿</span>
		</div>
		</div>
		<div class="con_right">
			<div class="headimg">
			<div class="headimg2">
					<img id="h_img" src="./img/6.jpg" alt="">
				</div>
				</div>
			<form role="form" id="login" class="inline-block">
				<div class="form-group" id="user">
					<span class="user">账号：</span>
					<input type="text" class="form-control" name="username" id="username" placeholder="请输入账号（邮箱）" value="<?php
					echo isset($_COOKIE['username'])?$_COOKIE['username']:'';?>">
					<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" id="usererror"></span>
				</div>
				<span class="passwd">密码：</span>
				<div class="form-group" id="pwd">
				 	<input type="password" class="form-control" name="passwd" id="passwd" placeholder="请输入密码" value="<?php
				 	echo isset($_COOKIE['passwd'])?$_COOKIE['passwd']:'';?>">
				 	<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" id="passwderror"></span>
				</div>
				<div class="form-group" id="coderdiv">
					<span class="coder">验证码：</span>
					<input type="text" name="coder" class="form-control" id="coder" placeholder="请输入验证码">
					<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" id="codererror"></span>
				</div>
				<img src="./captcha.php" alt="" id="coderimg">
				<div class="form-group" id="rememberdiv">
            		<input name="savesid" value="1" id="remember" type="checkbox"><span>记住密码</span>
				</div>
				<button type="button" id="loginbtn" class="btn">登&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp录</button> 
				<span class="re">还没账号？</span>
				<a href="./register.php" id="reloginbtn">立即注册</a>
			</form>
		</div>	
	</div>
	
</body>
</html>
