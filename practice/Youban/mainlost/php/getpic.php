<?php
isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    // if(isset($_POST['username']) && trim($_POST['username'])){
    if($_GET['username']){
        //接收数据
        $username   = trim($_GET['username']); //去除用户不小心输入的空格
        require '../common/db_connect.php';
        $r      =$mydb->getOneData('picaddress','tiezi','username='.$username);
        if($r){
            echo json_encode(array('r'=>$r['picaddress']));
            exit;
        }
        exit;
    }