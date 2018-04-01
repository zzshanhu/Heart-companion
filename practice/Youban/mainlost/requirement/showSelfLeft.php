<div class="col-md-3 col-lg-4 bodyLeft hidden-sm hidden-xs">
	<div class="personInfo">
		<div class="title">
			<h4 class="objname">个人信息</h4>
		</div>
		<div class="personDetail">
			<ul class="ulDetail">
				<li class="item">
					<span class="glyphicon glyphicon-map-marker" aria-hidden="true">
					</span>
					<span class="itemText">所在地  :<?=$owninfo['address']?></span>
				</li>
				<li class="item">
					<span class="glyphicon glyphicon-education" aria-hidden="true">
					</span>
					<span class="itemText">毕业于 某学校</span>
				</li>
				<li class="item">
					<span class="glyphicon glyphicon-heart-empty" aria-hidden="true">
					</span>
					<span class="itemText">感情状况 :<?=$owninfo['emotional']?></span>
				</li>
				<li class="item">
					<span class="glyphicon glyphicon-time" aria-hidden="true">
					</span>
					<span class="itemText">出生日期：<?=$owninfo['birthday']?></span>
				</li>
				<li class="item">
					<span class="glyphicon glyphicon-book" aria-hidden="true">
					</span>
					<span class="itemText">兴趣:<?=$owninfo['hobby']?></span>
				</li>
			</ul>
		</div>
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
               $ownTZpic = $mydb->getData('*', 'tiezi', 'status=1 AND fatherID=0 AND username="'.$_GET['username'].'"', 'tzaddtimes DESC');
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
			<a class="editItem" href="./photoOtherInfo.php?username=<?=$_GET['username'];?>">查看更多<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
		</div>
	</div>
	<!-- 相册结束 -->
</div>