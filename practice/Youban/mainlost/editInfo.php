<?php
     isset($_SESSION) || session_start();
    header('Content-Type:text/html; charset=UTF-8');
     require './common/db_connect.php';
    if(isset($_SESSION['username']) && trim($_SESSION['username'])){
       
        $username=$_SESSION['username'];
        $owninfo = $mydb->getOneData('*', 'user', 'username = "'.$username.'"');
        }else{
        	$_SESSION['username']='';
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
    <link rel="stylesheet" href="./css/main.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./js/provinceCity.js" defer="defer"></script>
    <script src="./js/mydate.js" defer="defer"></script>
</head>
<body>
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
			        <li><a href="./main.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
			        <li><a href="./mainperson.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>个人主页</a></li>
			        <li><a href="#"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>游戏</a></li>
			        <li>
				        <img class="userphoto" src="./img/photo.png" width="20px" height="20px" alt="">
				        <?php
echo   $_SESSION['username']?"<a>".$_SESSION['username']."</a>":"<a  href='./login.html'>登录</a>/<a href='./register.html'>注册</a>";
				        ?>
			        </li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">设置<span class="caret"></span></a>
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
		<div class="container">
			<!-- 封面背景 -->
			<div class="row">
				<img class="fmbg" src="./img/fmbg9.jpg" alt="封面背景">
			</div>
			<!-- 封面背景 -->
			<div class="row content">
			<!-- 左边头像等内容 -->
				<div class="col-md-3 col-lg-4 bodyLeft hidden-sm hidden-xs">
					<div class="photoSet">
						<p class="photoWrap"><a href="javascript:void(0);"><img src="./img/photo.png" alt="用户名" class="photo"></a></p>
						<div class="usernameSet">
							<h1 class="username"><?=$owninfo['nickname'];?></h1>
						</div>
						<div class="intro"><?=$owninfo['ownsign'];?></div>
					</div>
					<div class="personInfo">
						<div class="title">
							<h4 class="objname">个人信息</h4>
						</div>
						<div class="personDetail">
							<ul class="ulDetail">
								<li class="item">
									<span class="glyphicon glyphicon-map-marker" aria-hidden="true">
									</span>
									<span class="itemText">所在地（如成都市 武侯区）</span>
								</li>
								<li class="item">
									<span class="glyphicon glyphicon-education" aria-hidden="true">
									</span>
									<span class="itemText">毕业于 某学校</span>
								</li>
								<li class="item">
									<span class="glyphicon glyphicon-heart-empty" aria-hidden="true">
									</span>
									<span class="itemText">感情状况（单身/已婚）</span>
								</li>
								<li class="item">
									<span class="glyphicon glyphicon-time" aria-hidden="true">
									</span>
									<span class="itemText">出生日期：<?=$owninfo['birthday']?></span>
								</li>
								<li class="item">
									<span class="glyphicon glyphicon-book" aria-hidden="true">
									</span>
									<span class="itemText">兴趣</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="editInfo">
							<a class="editItem" href="./editInfo.php">编辑个人信息<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
					</div>
					<!-- 相册 -->
					<div class="photoList">
						<div class="photoTitle">
							<h4 class="objname">相册</h4>
						</div>
						<div class="innerwrap">
							<div class="userwrap">
								<ul class="photoFix clearUl">
								<?php 
               $ownTZpic = $mydb->getData('*', 'tiezi', 'status=1 AND fatherID=0 AND username="'.$_SESSION['username'].'"', 'tzaddtimes DESC');
                   $n=0;
                     foreach ($ownTZpic as $key => $val) {
                     	if($val['picaddress']){
                     			$imgclass='simg';
                     		echo '<li><img class="'.$imgclass.'" src="'.$val['picaddress'].'" alt=""></li>';
                     	$n++;
                     	}
                     	if($n>=5){
                     		break;
                     	}
                     }
                     unset($n);
								?>
								</ul>
							</div>
						</div>
						<div class="editInfo">
							<a class="editItem" href="./photoInfo.html">查看更多<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
						</div>
					</div>
					<!-- 相册结束 -->
				</div>

			<!-- 右边内容 -->
			<div class="col-xs-12 col-lg-8 col-md-9 col-sm-12 bodyRight rightCon">
				<div class="basicInfo">
					<form class="infoTtitle">
						<fieldset class="infoLine">
							<legend class="titleTxt">基本信息
							</legend>
						</fieldset>
					</form>
					<!-- 个人信息列表 -->
					<div class="basicView" >
						<div class="pInfo">
							<div class="pTit">登录名</div>
							<div class="pTxt"><?=$owninfo['username'];?></div>
						</div>
						<div class="pInfo">
							<div class="pTit">昵&nbsp &nbsp称</div>
							<div class="pTxt"><?=$owninfo['nickname'];?></div>
						</div>
						<div class="pInfo">
							<div class="pTit">真实姓名</div>
							<div class="pTxt">balabal</div>
						</div>
						<div class="pInfo">
							<div class="pTit">所在地</div>
							<div class="pTxt">四川 成都</div>
						</div>
						<div class="pInfo">
							<div class="pTit">性&nbsp &nbsp别</div>
							<div class="pTxt"><?=$owninfo['sex']==1?"男":"女";?></div>
						</div>
						<div class="pInfo">
							<div class="pTit">感情状况</div>
							<div class="pTxt">单身</div>
						</div>
						<div class="pInfo">
							<div class="pTit">邮&nbsp &nbsp箱</div>
							<div class="pTxt">750273017@qq.com</div>
						</div>
						<div class="pInfo">
							<div class="pTit">Q&nbsp &nbspQ</div>
							<div class="pTxt">750273017</div>
						</div>
						<div class="pInfo">
							<div class="pTit">生&nbsp &nbsp日</div>
							<div class="pTxt">1996-09-10</div>
						</div>
						<div class="pInfo">
							<div class="pTit">职&nbsp &nbsp业</div>
							<div class="pTxt">前端开发</div>
						</div>
						<div class="pInfo">
							<div class="pTit">简&nbsp &nbsp介</div>
							<div class="pTxt"><?=$owninfo['ownsign'];?></div>
						</div>
						<div class="pInfo">
							<div class="pTit">伴&nbsp &nbsp龄</div>
							<div class="pTxt"><?php
                               echo  floor((time()-strtotime($owninfo['regtimes']))/(3600*24)).' 天';

							?></div>
						</div>
						<div class="pInfo">
							<div class="pTit">标&nbsp &nbsp签</div>
							<div class="pTxt"><a href="javascript:void(0)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>马上填写</a></div>
						</div>
					</div>
					<!-- 个人信息列表结束 -->

					<!-- 个人信息修改 -->
					<div class="editView" style="display: none">
						<div class="pInfo">
							<div class="pTit">登录名</div>
							<div class="pTxt"><?=$owninfo['username'];?></div>
						</div>
						<div class="pInfo">
							<div class="pTit"><span class="must" style="color: red">*</span>昵&nbsp &nbsp称</div>
							<div class="pTxt"><input class="nickname" type="text" value="<?=$owninfo['nickname'];?>" placeholder="请输入昵称"></div>
						</div>
						<div class="pInfo">
							<div class="pTit">真实姓名</div>
							<div class="pTxt"><input type="text" value="张珊珊" placeholder="请输入姓名"></div>
						</div>
						<div class="pInfo">
							<div class="pTit">所在地</div>
							<div class="pTxt">
								<select name="province" id="province">
								    <option value="请选择城市">请选择省份</option>
								</select>
								<select name="city" id="city">
								    <option value="请选择城市">请选择城市</option>
								</select>
							</div>
						</div>
						<div class="pInfo">
							<div class="pTit">性&nbsp &nbsp别</div>
							<div class="pTxt"><input type="radio" name="sex" value="1"/>&nbsp男 &nbsp &nbsp<input type="radio" name="sex" value="2"/>&nbsp女</div>
						</div>
						<div class="pInfo">
							<div class="pTit">感情状况</div>
							<div class="pTxt">
								<select>
								  <option value ="已婚">已婚</option>
								  <option value ="热恋">热恋</option>
								  <option value="单身待解救">单身待解救</option>
								</select>
							</div>
						</div>
						<div class="pInfo">
							<div class="pTit">邮&nbsp &nbsp箱</div>
							<div class="pTxt"><input type="email" value="750273017@qq.com" placeholder="请输入邮箱地址"></div>
						</div>
						<div class="pInfo">
							<div class="pTit">Q&nbsp &nbspQ</div>
							<div class="pTxt"><input type="text" value="750273017" placeholder="请输入QQ账号"></div>
						</div>
						<div class="pInfo">
							<div class="pTit">生&nbsp &nbsp日</div>
							<div class="pTxt">
								<select id="year" onchange="mydate.changeDate('year','month','day')">
								</select >年
								<select id="month" onchange="mydate.changeDate('year','month','day')">
								</select>月
								<select id="day">
								</select>日
							</div>
						</div>
						<div class="pInfo">
							<div class="pTit">职&nbsp &nbsp业</div>
							<div class="pTxt"><input type="text" value="前端开发" placeholder="请输入职业"></div>
						</div>
						<div class="pInfo">
							<div class="pTit">简&nbsp &nbsp介</div>
							<div class="pTxt"><textarea name="desc" id="desc" cols="50" rows="4" placeholder="<?=$owninfo['ownsign'];?>" value="hahahaha"></textarea></div>
						</div>
						<div class="pInfo">
							<div class="pTit">伴&nbsp &nbsp龄</div>
							<div class="pTxt"><?php
                               echo  floor((time()-strtotime($owninfo['regtimes']))/(3600*24)).' 天';

							?></div>
						</div>
						<div class="pInfo">
							<div class="pTit">标&nbsp &nbsp签</div>
							<div class="pTxt"><a href="javascript:void(0)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>马上填写</a></div>
						</div>
					</div>
					<!-- 个人信息修改结束 -->

					<div class="btns btnEdit">
						<a class="editBtn" href="javascript:void(0)"><span>修改</span>
						</a>
					</div>	
					<div class="btns btnServ">
						<a class="editBtn" href="javascript:void(0)"><span>保存</span>
						</a>
					</div>
				</div>
			</div>
			<!-- 右边内容结束 -->
			</div>
			
			</div>
		</div>
		<div class="footer">@有伴er工作室</div>
	</div>
</body>
</html>
<script>
	$('.btnEdit').click(function(event) {
		console.log(111);
		$('.basicView').css('display', 'none');
		$('.editView').css('display', 'block');
		$('.nickname').focus();
	});
	$('.btnServ').click(function(event) {
	});
</script>
<script>	
	window.onload=function(){
		mydate.loadDate("year","month","day",1960)
	}
	
</script>
