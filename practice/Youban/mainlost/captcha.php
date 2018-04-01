<?php
    isset($_SESSION) || session_start();
    header("Content-type: image/png");
    $width      = 80;
    $height     = 32;
    $length     = 4;
    $im         = imagecreate($width, $height) or exit("GD扩展没有开启");
    imagecolorallocate($im, 230, 230, 230);
    $font       = 'STFANGSO.TTF';
    //生成随机数并加入到图片
    //各种线
    for ($i=0; $i < 4; $i++) {
        $grey = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        imageline ($im, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $grey);
    }
    //生成随机字符添加到图片
    $coder = '';
    for ($i=0; $i < $length ; $i++) {
        $t = mt_rand(20,2000);
        if($t < 100){
            $n = getChar(1);
        }else{
            $n = mt_rand(0, 9);
        }
        $grey = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        //生成的随机数应该存储到SESSION
        $coder .= $n;
        imagettftext($im, (15 + $n), mt_rand(-45, 45), (11 + $i*20), 30, $grey, $font, $n);
    }
    $_SESSION['coder'] = $coder;
    //随机添加点点
    for ($i=0; $i < 50; $i++) {
        $grey = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        imagesetpixel ($im , mt_rand(0, $width), mt_rand(0, $height), $grey);
    }
    imagepng($im);
    imagedestroy($im);

    //随机生成中文
    //$num为生成汉字的数量
    function getChar($num)  
    {
        $b = '';
        for ($i=0; $i<$num; $i++) {
            // 使用chr()函数拼接双字节汉字，前一个chr()为高位字节，后一个为低位字节
            $a = chr(mt_rand(0xB0,0xD0)).chr(mt_rand(0xA1, 0xF0));
            // 转码
            $b .= iconv('GB2312', 'UTF-8', $a);
        }
        return $b;
    }
