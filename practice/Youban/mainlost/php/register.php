<?php
    isset($_SESSION) || session_start();
    //防止中文乱码
    header('Content-type:text/html;charset="UTF-8"');
    //接收表单提交过来的数据
    foreach ($_POST as $k => $v) {
        $$k = $v;
    }
    require './common/db_connect.php';
    if(isset($_POST['username'])&&$_POST['username']){
        if($_POST['imgval'] == ""){
            $rand = mt_rand(1, 11);
            $_POST['imgval'] = 'http://192.168.2.182/practice/Youban/mainlost/img/'.$rand.'.jpg';
        }
        $data = array('nickname'=>''.$nickname.'',
                'username'=>''.$username.'',
                'passwd'=>''.md5($passwd).'',
                'sex'=>''.$sex.'',
                'tel'=>''.$tel.'',
                'birthday'=>$_POST['year'].'年'.$_POST['month'].'月'.$_POST['day'].'日',
                'hobby'=>''.$hobby.'',
                'headpic'=>''.$_POST['imgval'].'',
                'ownsign'=>''.$motto.''
                );
       
        //查找账号是否重复
        $resultuser = $mydb->getOneData('username','user','username = "'.$username.'"');
        if($resultuser){
            echo json_encode(array('r'=>'usernamefail'));
            exit;
        }
         $data['regtimes']=date("Y-m-d H-i-s");
        $r = $mydb->insertData('user',$data);
        if(!$r){
            echo json_encode(array('r'=>'fail'));
        }else{
            $_SESSION['username']   = $username;
            echo json_encode(array('r'=>'ok'));
        }
    }
