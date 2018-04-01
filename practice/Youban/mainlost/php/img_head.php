<?php
	//SESSION的开启放在所有的代码之前
    isset($_SESSION) || session_start();
	//防止中文乱码
	header('Content-type:text/html;charset="UTF-8"');
	require  '../DB_login.php';
	if(isset($_POST['username'])&&$_POST['username']){
		$username = trim($_POST['username']);
		
		$result = $mydb->getOneData('username,headpic','user','username = "'.$username.'"');
		if ($result === false) {
			echo json_encode(array('re'=>'sql_error'));
			exit;
		}
		
		if(!$result){
			echo json_encode(array('re'=>'username_invail'));
			exit;
		}
		echo json_encode(array('re'=>$result['headpic']));
		
		exit;
	}