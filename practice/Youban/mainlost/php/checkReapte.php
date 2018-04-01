<?php
    isset($_SESSION) || session_start();
    //防止中文乱码
    header('Content-type:text/html;charset="UTF-8"');
    //接收表单提交过来的数据
    require './common/db_connect.php';
    if(isset($_POST['username'])&&$_POST['username']){
        //查找账号是否重复
        $resultuser = $mydb->getOneData('username','user','username = "'.$_POST['username'].'"');
        if($resultuser){
            echo json_encode(array('r'=>'usernamefail'));
            exit;
        }
        echo json_encode(array('r'=>'ok'));
    }
