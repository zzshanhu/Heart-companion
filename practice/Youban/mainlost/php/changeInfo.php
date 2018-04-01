<?php
isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    if(isset($_POST['changeUser']) && trim($_POST['changeUser'])){
   
        //接收数据
        $username=$_SESSION['username'];
         $nickname=$_POST['nickname'];
         $realname=$_POST['realname'];
         $emotional=$_POST['emotional'];
         $address=$_POST['address'];
         $email=$_POST['email'];
         $tel=$_POST['tel'];
         $birthday=$_POST['birthday'];
         $job=$_POST['job'];
         $ownsign=$_POST['ownsign'];
         $mark=$_POST['mark'];
         $sex=$_POST['sex'];
        require './common/db_connect.php';
        $ownOldInfo = $mydb->getOneData('*', 'user', 'username='.$username);
        $ownOldInfo['nickname']=$nickname;
        $ownOldInfo['realname']=$realname;
        $ownOldInfo['emotional']=$emotional;
        if($address!=''){
            $ownOldInfo['address']=$address;
        }
        $ownOldInfo['email']=$email;
        $ownOldInfo['tel']=$tel;
        if($birthday!=''){
            $ownOldInfo['birthday']=$birthday;
        }
        $ownOldInfo['job']=$job;
        $ownOldInfo['ownsign']=$ownsign;
        $ownOldInfo['mark']=$mark;
        $ownOldInfo['sex']=$sex;
        $result = $mydb->updateData("user",$ownOldInfo,'username="'.$username.'"');
        if($result == false){
            echo json_encode(array('r'=>'fail'));
            exit;
        }
        echo json_encode(array('r'=>'ok'));
        exit;
    }