<?php
     isset($_SESSION) || session_start();
    header('Content-Type:text/html; charset=UTF-8');
     require './common/db_connect.php';
    if(isset($_SESSION['username']) && trim($_SESSION['username'])){
        $username=$_SESSION['username'];
        $owninfo = $mydb->getOneData('*', 'user', 'username = "'.$username.'"');
        }else{
        	Header("Location: ./login.php"); 
        	exit;
        }
        $ownTZinfo = $mydb->getData('*', 'tiezi', 'status=1 AND fatherID=0 AND username="'.$_SESSION['username'].'"', 'tzaddtimes DESC');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>有伴</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="./img/logo.ico" type="image/x-icon"/>
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="./js/logout.js" type="text/javascript"></script>
</head>
<body>
<!-- 回到顶部 -->
	<div id="box" class="box hidden-xs">
	    <div class="box-in">
	    </div>
	</div>    
<script>
	var timer  = '';
	box.onclick = function(){
	    cancelAnimationFrame(timer);
	    timer = requestAnimationFrame(function fn(){
	        var toTop = document.body.scrollTop || document.documentElement.scrollTop;
	        if(toTop > 0){
	            document.body.scrollTop = document.documentElement.scrollTop = toTop - 100;
	            timer = requestAnimationFrame(fn);
	        }else{
	            cancelAnimationFrame(timer);
	        }    
	    });
	}
</script>
<!-- 回到顶部结束 -->
	<div class="bodyContent">
	<!-- 导航条 -->
		<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">有伴er</a>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="./mainnew.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
			        <li><a href="./mainpersonNew.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>个人主页</a></li>
			        <li class="lr">
				        <img class="userphoto" src="./img/photo.png" width="20px" height="20px" alt="">
				        <?php
echo   $owninfo['nickname']?"<a>".$owninfo['nickname']."</a>":"<a  href='./login.php'>登录</a>/<a href='./register.php'>注册</a>";
				        ?>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>设置<span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#" id="logout">注销</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">更换主题</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div>
			</div>
		</nav>
		<!-- 导航条结束 -->
		