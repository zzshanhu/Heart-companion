<?php
	require './php/register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
     <script src="./js/headimg.js"></script>
    <script src="./js/register.js"></script>
    <link rel="stylesheet" href="./css/registermym.css">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon"/>
</head>
<body>
	<div class="header"></div>
	<div class="con">
		<h3>有伴er</h3>
		<div class="left_line"></div>
		<h4>小伴er注册</h5>
		<span class="login">已有账号？ </span>
		<a href="./login.php" id="login">登录</a>
		<div class="con_left">
			
			<div class="line"></div>
		</div>
		<div class="con_right">
			<div class="top_line"></div>
			<button type="button" id="j_upload_img_btn">上传头像</button>
				<div id ="upload"> 
		        	<div id="upload_img_wrap"></div>
	        	</div>
			<form role="form" id="register"  class="inline-block">
			<textarea id="uploadEditor" style="display: none;"></textarea>
				<input type="hidden" id="imgval" name="imgval" value="">
				<span class="imgerror"></span>
				<div class="form-group" id="nick">
					<span class="nick" class="span1">昵称：</span>
					<input type="text" class="form-control" name="nickname" id="nickname" placeholder="请输入昵称">
					<span class="help-block"></span>
				</div>
				<div class="form-group" id="user">
					<span class="user" class="span1">账号：</span>
					<input type="text" class="form-control" name="username" id="username" placeholder="请输入账号（邮箱）">
					<span class="help-block"></span>
				</div>
				<div class="form-group" id="pwd">
					<span class="passwd" class="span1">密码：</span>
				 	<input type="password" class="form-control" name="passwd" id="passwd" placeholder="请输入密码">
				 	<span class="help-block"></span>
				</div>
				<div class="form-group" id="repwd">
					<span class="repwd">确认密码：</span>
				 	<input type="password" class="form-control" name="repasswd" id="repasswd" placeholder="请再次输入密码">
				 	<span class="help-block"></span>
				</div>
				<div class="form-group" id="telnum">
					<span class="telnum">电话号码：</span>
				 	<input type="text" class="form-control" name="tel" id="tel" placeholder="请输入手机号码">
				 	<span class="help-block"></span>
				</div>
				<span class="sex" class="span1">性别：</span>
				<div class="form-group" id="sex">
				 	<input type="radio" name="sex" value="1" checked> 男
            		<input type="radio" name="sex" value="2"> 女
				</div>
				<div class="form-group" id="date">
					<span class="day">出生年月：</span>
					<div class="date">
					 	<select id="year" name="year"><option value="">请选择</option></select> 年
					    <select id="month" name="month"><option value="">请选择</option></select> 月
					    <select id="day" name="day"><option value="">请选择</option></select> 日
				    </div>
				    <span class="help-block" id="verifydate"></span>
				</div>
				<div class="form-group" id="hob">
					<span class="hob" class="span1">爱好：</span>
				 	<input type="text" class="form-control" name="hobby" id="hobby" placeholder="请填写爱好">
				</div>
				<div class="form-group" id="mt">
					<span class="mt">个性签名：</span>
				 	<input type="textarea" rows="5" cols="20" class="form-control" name="motto" id="motto" placeholder="请输入个性签名（座右铭）">
				</div>
				<input type="button" name="submit" value="注&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp册" id="registerbtn" class="btn" />
			</form>
		</div>	
	</div>
</body>
</html>