<?php
require('./requirement/showselfHead.php');
?>
		<div class="container">
			<!-- 封面背景 -->
			<div class="row showselfHead">
				<!-- <div class="showHead"><img src="./img/fmbg9.jpg" width="100%" height="100%" alt=""> -->
				<!-- 头像等内容 -->
				<div class="showSelf">
					<div class="photoSet photoInfo showPhoto">
						<p class="photoWrap photoIn"><a href="javascript:void(0);"><img src="<?=$owninfo['headpic']?>" alt="用户名" class="photo"></a></p>
						<div class="usernameSet photoIn showUser">
							<h1 class="username"><?=$owninfo['nickname'];?></h1>
						</div>
						<div class="intro photoIn showIntro"><?=$owninfo['ownsign'];?></div>
					</div>
				</div>
				<!-- 头像等内容结束 -->
				<!-- </div> -->
			
			</div>
			<!-- 封面背景结束 -->
			
			<div class="row content">
				<div class="row rowpadding">
				<!-- 左边内容 -->
				<?php 
					require('./requirement/showSelfRight.php');
				 ?>
				<!-- 左边内容结束 -->

				<!-- 右边内容 -->
<?php 
					require('./requirement/showSelfLeft.php');
				 ?>
					<!-- 右边内容结束 -->
				</div>
			</div>
		</div>
		<div class="footer">@有伴er工作室</div>
	</div>
	<link rel="stylesheet" href="./css/main.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./js/mainNew.js"></script>
</body>
</html>

