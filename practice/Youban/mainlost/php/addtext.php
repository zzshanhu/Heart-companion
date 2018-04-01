<?php
isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    if(isset($_POST['username']) && trim($_POST['username'])){
        //接收数据
        $username   = trim($_POST['username']); //去除用户不小心输入的空格
        $content     = $_POST['content'];
        $picaddress     = $_POST['picaddress'];
        $data['content']=$content;
        $data['username']=$username;
        $data['picaddress']=$picaddress;
        require './common/db_connect.php';
        $data['tzaddtimes']=date("Y-m-d H-i-s",time());
        $r      =$mydb->insertData('tiezi', $data);
        if($r == false){
            echo json_encode(array('r'=>'fail'));
            exit;
        }
        echo json_encode(array('r'=>'success','tzaddtimes'=>$data['tzaddtimes']));
        exit;
    }