<?php
	require('./requirement/personhead.php');
?>
<div class="container">
<?php  
echo '<input type="hidden" id="whichnum" value="2" username='.$_SESSION['username'].'>';
	?>
	<!-- 封面背景 -->
	<div class="row showselfHead">
		<!-- <div class="showHead"><img src="./img/fmbg9.jpg" width="100%" height="100%" alt="">
		</div> -->
	</div>
	<!-- 封面背景结束 -->
	<div class="row content">
	<!-- 左边头像等内容 -->
		<?php
		require('./requirement/leftContent.php');
		?>
		<!-- 左边内容结束 -->

		<!-- 右边文章内容 -->
		<?php
			require('./requirement/personRight.php');
		?>
		<!-- 右边文章内容结束 -->
		</div>
	</div>
	<div class="footer">@有伴er工作室</div>
</div>
	<link rel="stylesheet" href="./css/main.css">
	
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./js/mainNew.js"></script>
</body>
</html>

