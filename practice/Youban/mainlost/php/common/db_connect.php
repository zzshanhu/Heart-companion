<?php
    require 'DB.php';
    //使用自己的类
    $dbconfig   = array(
            'host'=>'localhost',
            'username'=>'root',
            'passwd'=>'root',
            'dbname'=>'youban',
            'port'=>3306
        );
    $mydb       = new DB($dbconfig);


