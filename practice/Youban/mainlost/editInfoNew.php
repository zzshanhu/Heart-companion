<?php
	require('./requirement/head.php');
?>
<div class="container">
<!-- 封面背景 -->
	<div class="row showselfHead ">
		
	</div>
<!-- 封面背景 -->
<div class ="row content">

<!-- 左边头像等内容 -->
	<?php
		require('./requirement/editInfoLeftContent.php');
	?>
<!-- 左边内容结束 -->

<!-- 右边内容 -->
	<div class="col-xs-12 col-lg-8 col-md-8 col-sm-12 bodyRight rightCon">
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
					<div class="pTxt"><?=$_SESSION['username'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">昵&nbsp &nbsp称</div>
					<div class="pTxt"><?=$owninfo['nickname'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">真实姓名</div>
					<div class="pTxt"><?=$owninfo['realname'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">所在地</div>
					<div class="pTxt"><?=$owninfo['address'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">性&nbsp &nbsp别</div>
					<div class="pTxt"><?=$owninfo['sex']==1?"男":"女";?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">感情状况</div>
					<div class="pTxt"><?=$owninfo['emotional'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">邮&nbsp &nbsp箱</div>
					<div class="pTxt"><?=$owninfo['email'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">电&nbsp &nbsp话</div>
					<div class="pTxt"><?=$owninfo['tel']?$owninfo['tel']:"保密";?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">生&nbsp &nbsp日</div>
					<div class="pTxt"><?=$owninfo['birthday'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">职&nbsp &nbsp业</div>
					<div class="pTxt"><?=$owninfo['job'];?></div>
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
					<div class="pTxt"><a href="javascript:void(0)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?=$owninfo['mark'];?></a></div>
				</div>
				<div class="btns btnEdit">
				<a class="editBtn edit" href="javascript:void(0)"><span>修改</span>
				</a>
			</div>
			</div>
			<!-- 个人信息列表结束 -->

			<!-- 个人信息修改 -->
			<div class="editView" style="display: none">
<form role="form" id="changeInfo">
				<div class="pInfo">
					<div class="pTit">登录名</div>
					<div class="pTxt" id="changeUser"><?=$_SESSION['username'];?></div>
				</div>
				<div class="pInfo">
					<div class="pTit"><span class="must" style="color: red">*</span>昵&nbsp &nbsp称</div>
					<div class="pTxt"><input name="nickname" class="nickname" type="text" value="<?=$owninfo['nickname'];?>" placeholder="请输入昵称"></div>
				</div>
				<div class="pInfo">
					<div class="pTit">真实姓名</div>
					<div class="pTxt"><input name="realname" type="text" value="<?=$owninfo['realname'];?>" placeholder="请输入姓名"></div>
				</div>
				<div class="pInfo">
					<div class="pTit">所在地</div>
					<div class="pTxt">
						<select name="province" id="province" width="100px">
						   
						</select>
						<select name="city" id="city" width="100px">
						    <option value="请选择城市">请选择城市</option>
						</select>
					</div>
				</div>
				<div class="pInfo">
					<div class="pTit">性&nbsp &nbsp别</div>
					<div class="pTxt"><input type="radio" name="sex" value="1" <?=$owninfo['sex']==1?"checked":"";?> />&nbsp男 &nbsp &nbsp<input type="radio" name="sex" value="2" <?=$owninfo['sex']==2?"checked":"";?>/>&nbsp女</div>
				</div>
				<div class="pInfo">
					<div class="pTit">感情状况</div>
					<div class="pTxt">
						<select name="emotional">
						  <option value ="已婚">已婚</option>
						  <option value ="热恋">热恋</option>
						  <option value="单身待解救">单身待解救</option>
						</select>
					</div>
				</div>
				<div class="pInfo">
					<div class="pTit">邮&nbsp &nbsp箱</div>
					<div class="pTxt"><input name="email" type="email" value="<?=$owninfo['email'];?>" placeholder="请输入邮箱地址"></div>
				</div>
				<div class="pInfo">
					<div class="pTit">电&nbsp &nbsp话</div>
					<div class="pTxt"><input name="tel" type="text" value="<?=$owninfo['tel'];?>" placeholder="请输入手机号"></div>
				</div>
				<div class="pInfo">
					<div class="pTit">生&nbsp &nbsp日</div>
					<div class="pTxt">
						<select id="year" name="year" onchange="mydate.changeDate('year','month','day')">
						</select >年
						<select id="month" name="month" onchange="mydate.changeDate('year','month','day')">
						</select>月
						<select id="day" name="day">
						</select>日
					</div>
				</div>
				<div class="pInfo">
					<div class="pTit">职&nbsp &nbsp业</div>
					<div class="pTxt"><input name="job" type="text" value="<?=$owninfo['job'];?>" placeholder="请输入职业"></div>
				</div>
				<div class="pInfo">
					<div class="pTit">简&nbsp &nbsp介</div>
					<div class="pTxt"><textarea name="ownsign" id="desc" cols="50" rows="4" placeholder="写点儿什么吧~"><?=$owninfo['ownsign'];?></textarea></div>
				</div>
				<div class="pInfo">
					<div class="pTit">伴&nbsp &nbsp龄</div>
					<div class="pTxt"><?php
                               echo  floor((time()-strtotime($owninfo['regtimes']))/(3600*24)).' 天';

							?></div>
				</div>
				<div class="pInfo">
					<div class="pTit">标&nbsp &nbsp签</div>
					<div class="pTxt"><a><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><input name='mark' type="text" value="<?=$owninfo['mark'];?>" placeholder="马上添加"></a></div>
				</div>
				<div class="btns btnServ">
				<a class="editBtn save" href="javascript:void(0)"><span id="saveInfo">保存</span>
				</a>
			</div>
</form>
			</div>
			<!-- 个人信息修改结束 -->

				
			
		</div>
	</div>
		<!-- 右边内容结束 -->
		</div>
		</div>
	</div>
	<div class="footer">@有伴er工作室</div>
</div>
	<link rel="stylesheet" href="./css/main.css">
	<script src="./js/mydate.js"></script>
    <script src="./js/provinceCity.js"></script>
    <script src="./js/editInfo.js"></script>
    <script src="./js/changeInfo.js"></script>
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
