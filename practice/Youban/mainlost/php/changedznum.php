<?php
isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    if(isset($_POST['j']) && trim($_POST['j'])){
   
        //接收数据
        $j        = $_POST['j']; 
        $tid      =$_POST['tid'];
        require './common/db_connect.php';
        $tzinfo = $mydb->getOneData('*', 'tiezi', 'tid='.$tid);
        if($j==1){
            $tzinfo['dznum'] +=1;
        }
        if($j==2){
            $tzinfo['dznum'] =(int)$tzinfo['dznum']-1;
        }
        $result = $mydb->updateData("tiezi",$tzinfo,"tid=".$tid);
        if($result == false){
            echo json_encode(array('r'=>'fail'));
            exit;
        }
        echo json_encode(array('r'=>'ok'));
        exit;
    }