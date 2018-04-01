<?php
	require('./requirement/photoInfohead.php');
?>
<div class="container">
	<!-- 封面背景 -->
	<div class="row showselfHead">
	<!-- <div class="showHead"><img src="./img/fmbg9.jpg" width="100%" height="100%" alt=""></div> -->
	</div>
	<!-- 封面背景 -->
	<div class="row content photoCont">
		<div class="photoTit"><p class="titleT">照片墙</p></div>
		<div class="photoWall">
		<?php
         $ownTZinfo = $mydb->getData('*', 'tiezi', 'status=1 AND fatherID=0 AND username="'.$_GET['username'].'"', 'tzaddtimes DESC');
         foreach ($ownTZinfo as $key => $value) {
         	if($value['picaddress']!=""){
         		echo '<div class="photoLis photoLis1" class="list-inline">
				<p class="photoTxt">'.$value['tzaddtimes'].'</p>
				<a id="picwall" href="'.$value['picaddress'].'" target="_blank">
					<img class="pic" src="'.$value['picaddress'].'" alt="">
				</a>
			</div>';
         	}
         }
           

		?>
			<!-- <div class="photoLis photoLis1" class="list-inline">
				<p class="photoTxt">创建时间</p>
				<a id="picwall" href="./img/img1.jpg" target="_blank">
					<img class="pic" src="./img/img1.jpg" alt="">
				</a>
			</div>
			<div class="photoLis photoLis2">
				<p class="photoTxt">创建时间</p>
				<a id="picwall" href="./img/img1.jpg" target="_blank">
				<img class="pic" src="./img/img1.jpg" alt=""></a>
			</div>
			<div class="photoLis photoLis3">
				<p class="photoTxt">创建时间</p>
				<a id="picwall" href="./img/img1.jpg" target="_blank">
					<img class="pic" src="./img/img1.jpg" alt="">
				</a>
			</div> -->
			</div>
		</div>
	</div>
	<div class="footer">@有伴er工作室</div>	
	
	<link rel="stylesheet" href="./css/photoInfo.css">
	<link rel="stylesheet" href="./imgbox/imgbox.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js "></script>
    <script src="imgbox/jquery.imgbox.pack.js"></script>
	<script>
		$(document).ready(function() {  
    		$("#picwall").imgbox();  
	});  
	</script>
</body>
</html>