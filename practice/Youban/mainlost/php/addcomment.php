<?php
isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    if(isset($_POST['username']) && trim($_POST['username'])){
        //接收数据
        $username        = trim($_POST['username']); //去除用户不小心输入的空格
        $comContent      = $_POST['comContent'];
        $tid             = $_POST['tid'];
        $data['content']=$comContent;
        $data['username']=$username;
        $data['fatherID']=$tid;
        require './common/db_connect.php';
        $data['tzaddtimes']=date("Y-m-d H-i-s",time());
        $r      =$mydb->insertData('tiezi', $data);
        if($r == false){
            echo "fail";
            exit;
        }
        $user = $mydb->getOneData('nickname', 'user', 'username = "'.$username.'"');
        echo '<div class="commentArea">
         <div class="comArea">
     <span class="comPer">'.$user['nickname'].'：</span>
         <span class="comCont">'.$comContent.'</span>
            <span class="comTime">'.$data['tzaddtimes'].'</span>
          </div></div>';
        exit;
    }