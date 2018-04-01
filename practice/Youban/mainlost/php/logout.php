<?php 
isset($_SESSION) || session_start();
header("content-Type:text/html;charset=utf-8");
   foreach ($_COOKIE as $key => $value) {
       setcookie($key, '', time() -1000,'/');
   };
session_destroy();
echo json_encode(array('r'=>'ok'));