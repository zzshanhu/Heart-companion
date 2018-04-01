<?php
isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    if(isset($_POST['pagenum'])){
        //接收数据
        if(!isset($_POST['whichnum'])||!isset($_POST['username'])){
             echo "没有更多了······";
            exit;
        }
        $pagenum        = $_POST['pagenum']; 
        $whichnum        = $_POST['whichnum'];
        $username        = $_POST['username']; 
        require './common/db_connect.php';
        $start=$pagenum+1;
        $page=5;
        if($whichnum==1){
            $ownTZinfo = $mydb->getData('*', 'tiezi', 'fatherID=0 AND status=1', 'tzaddtimes DESC',$start,$page);
        }else{
            $ownTZinfo = $mydb->getData('*', 'tiezi', 'fatherID=0 AND status=1 AND username="'.$username.'"', 'tzaddtimes DESC',$start,$page);
        }
        
        if($ownTZinfo == false){
            echo "没有更多了······";
            exit;
        }
        $data='';
        $data  .='<input type="hidden" id="pagenum" value="'.($start+$page).'">';
foreach ($ownTZinfo as $key => $value) {
   $visitornick = $mydb->getOneData('nickname', 'user', 'username = "'.$_SESSION['username'].'"');
              $commentNum=$mydb->getOneData('count(*) AS num', 'tiezi', 'status=1 AND fatherID = '.$value['tid'], 'tzaddtimes DESC');
               $userinfo = $mydb->getOneData('nickname,headpic', 'user', 'username = "'.$value['username'].'"');
                if(!$userinfo['headpic']){
        $userinfo['headpic']="./img/photo.png";
    }
    $data .='<div class="perDetaile">

                            <div class="personFace">
                                <a class="face" href="javascript:void(0);"><img class="seeother" username="'.$value['username'].'" width="50px" height="50px" src="'.$userinfo['headpic'].'" alt=""></a>
                            </div>
                            <div class="detail">
                                <div class="usernameInfo">
                                    <a href="javascript:void(0);" class="nameText">'.$userinfo['nickname'].'</a>
                                </div>
                                <div class="writeTime">
                                    <a href="javascript:void(0);" class="timeText">'.$value['tzaddtimes'].'</a>
                                </div>
                            </div>
                            <div class="artiBox">
                                <div class="artiCon">'.$value['content'].'</div>';

                                if($value['picaddress']){
                                    $data .='<div class="artiPic">
                                        <a href="javascript:void(0);"><img class="small_img" src="'.$value['picaddress'].'" /></a>
                                </div>';
                                }
                                $data .='</div>
                            <div class="articleFoot">
                                <ul class="statusList">
                                    <li class="views"><a href="javascript:void(0);"><span class="icon glyphicon glyphicon-eye-open" aria-hidden="true"><span class="line">访问量</span></a></li>
                                    <li class="transmit"><a href="javascript:void(0);"><span class=" icon glyphicon glyphicon-share-alt" aria-hidden="true"><span class="line">转发</span></a></li>
                                    <li class="comment" nickname="'.$visitornick['nickname'].'" username="'.$_SESSION['username'].'" tid="'.$value['tid'].'"><a href="javascript:void(0);"><span class=" icon glyphicon glyphicon-edit" aria-hidden="true"><span class="line">评论<span>'.$commentNum['num'].'</span></a></li>
                                    <li class="like"><a href="javascript:void(0);"><span class=" icon glyphicon glyphicon-thumbs-up" aria-hidden="true"><span class="line">点赞</span></span><span>'.$value['dznum'].'</span></a></li>
                                </ul>
                            </div>';
                            $comment=$mydb->getData('*', 'tiezi', 'status=1 AND fatherID = '.$value['tid'], 'tzaddtimes DESC');
                            if($comment){
                foreach ($comment as $key => $v) {
                    $comuserinfo = $mydb->getOneData('nickname', 'user', 'username = "'.$v['username'].'"');
                    $data .='<div class="commentArea">
                                    <div class="comArea">
                                        <span class="comPer">'.$comuserinfo['nickname'].'：</span>
                                        <span class="comCont">'.$v['content'].'</span>
                                        <span class="comTime">'.$v['tzaddtimes'].'</span>
                                    </div></div>';

                }

                            }
                            $data .= '</div>';
                            
} 
        echo $data;
        exit;
    }