<?php
    isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    if(isset($_POST['username']) && trim($_POST['username'])){
        //接收数据
        $username   = trim($_POST['username']); //去除用户不小心输入的空格
        $passwd     = $_POST['passwd'];
        $savesid     = $_POST['savesid'];
        // $coder      = $_POST['coder'];
        //验证码是否正确
        // if($coder != $_SESSION['coder']){
        //     echo json_encode(array('r'=>'coder_invail'));    
        //     exit;
        // }
        //到数据里面检查数据是否正确
        require './common/db_connect.php';
        $r      = $mydb->getOneData('username, passwd,status', 'user', 'username = "'.$username.'"');
        if($r === false){
            echo json_encode(array('r'=>'sql_error'));
            exit;
        }
        if($r['status'] !=1){
            echo json_encode(array('r'=>'control_invail'));
            exit;
        }
        //判断账号是否存在
        if(!$r['username']){
            // var_dump($member);
            echo json_encode(array('r'=>'username_invail'));
            exit;
        }
        //检查密码是不是正确
        if($r['passwd'] != md5($passwd)){
            echo json_encode(array('r'=>'passwd_invail'));
            exit;
        }
        // var_dump($r);
        $_SESSION['username']   = $r['username'];
        //把账号和密码存储到本地
        if($savesid==1){
        setcookie('username',       $r['username'],      time() + 30*24*3600,'/');
        setcookie('passwd',         $passwd,             time() + 30*24*3600,'/');
        setcookie('PHPSESSID',   $_COOKIE['PHPSESSID'],   time() + 24*3600,'/');
        // var_dump($_COOKIE['username']);
        }
        echo json_encode(array('r'=>'ok'));
        exit;
    }