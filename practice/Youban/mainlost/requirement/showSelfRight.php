<div class="col-xs-12 col-lg-8 col-md-9 col-sm-12 bodyRight">
					<div class="personnel">
						<?php
echo '<input type="hidden" id="pagenum" value="'.($start+$page).'">';
if($ownTZinfo){
	foreach ($ownTZinfo as $key => $value) {
	$comment=$mydb->getData('*', 'tiezi', 'status=1 AND fatherID = '.$value['tid'], 'tzaddtimes DESC');
	$commentNum=$mydb->getOneData('count(*) AS num', 'tiezi', 'status=1 AND fatherID = '.$value['tid'], 'tzaddtimes DESC');
	 $userinfo = $mydb->getOneData('nickname,headpic', 'user', 'username = "'.$value['username'].'"');
	 $visitornick = $mydb->getOneData('nickname', 'user', 'username = "'.$_SESSION['username'].'"');
	 if(!$userinfo['headpic']){
         $userinfo['headpic']="./img/photo.png";
	 }
	echo '<div class="perDetaile">
							<div class="personFace">
								<a class="face" href="javascript:void(0);"><img width="50px" height="50px" src="'.$userinfo['headpic'].'" alt=""></a>
							</div>
							<div class="detail">
								<div class="usernameInfo">
									<a href="javascript:void(0);" class="nameText">'. $userinfo['nickname'].'</a>
								</div>
								<div class="writeTime">
									<a href="javascript:void(0);" class="timeText">'.$value['tzaddtimes'].'</a>
								</div>
							</div>
							<div class="artiBox">
								<div class="artiCon">'.$value['content'].'</div>
								';
								if($value['picaddress']){
                    		echo '<div class="artiPic">
										<a href="javascript:void(0);"><img class="small_img" src="'.$value['picaddress'].'" /></a>
								</div>';
                    	}
								

								echo '</div>
							<div class="articleFoot">
								<ul class="statusList">
									<li class="views"><a href="javascript:void(0);"><span class="icon glyphicon glyphicon-eye-open" aria-hidden="true"><span class="line">访问量</span></a></li>
									<li class="transmit"><a href="javascript:void(0);"><span class=" icon glyphicon glyphicon-share-alt" aria-hidden="true"><span class="line">转发</span></a></li>
									<li class="comment" nickname="'.$visitornick['nickname'].'"  username="'.$_SESSION['username'].'" tid="'.$value['tid'].'"><a href="javascript:void(0);"><span class=" icon glyphicon glyphicon-edit" aria-hidden="true"><span class="line">评论<span>'.$commentNum['num'].'</span></span></a></li>
									<li class="like"><a href="javascript:void(0);"><span class=" icon glyphicon glyphicon-thumbs-up" aria-hidden="true"><span class="line">点赞</span></span><span>'.$value['dznum'].'</span></a></li>
								</ul>
							</div>';
							
							if($comment){
                foreach ($comment as $key => $v) {
                	$comuserinfo = $mydb->getOneData('nickname', 'user', 'username = "'.$v['username'].'"');
                	echo '<div class="commentArea">
									<div class="comArea">
										<span class="comPer">'.$comuserinfo['nickname'].'：</span>
										<span class="comCont">'.$v['content'].'</span>
										<span class="comTime">'.$v['tzaddtimes'].'</span>
									</div></div>';

                }

							}
							echo '</div>';
							
}
}else{
	echo '
							<div class="artiBox">
								<div class="artiCon">这儿还什么都没有呢，快去<a href="./main.php" style="color:red;">发表帖子</a>吧~</div>
							</div>';
}
?>
						</div>
					</div>
<!-- 				</div> -->
