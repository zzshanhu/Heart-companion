$(function () {
    $('.form-group').click(function(event) {
        $(event.target).next('span').html('');
    });
    $("#username").blur(function(event) {
        var $username=$(this).val();
        $.ajax({
            url: './php/checkReapte.php',
            type: 'POST',
            dataType: 'JSON',
            data: {username: $username},
        })
        .done(function(data) {
           if(data.r == 'usernamefail'){
                $('#username').next('span').show();
                $('#username').next('span').html('账号已存在!');
                $('#username').focus();
                return;
            }
        });
        
    });
	$('#registerbtn').click(function(event) {
        var error = 0;
    
        if($('#nickname').val() == ''){
            $('#nickname').next('span').html('昵称必填！');
            $('#nickname').focus();
            error++;
        }
        if($('#username').val() == ''){
            $('#username').next('span').html('账号必填!');
            $('#username').focus();
            error++;
        }
        function isEmail(str) {
                var reg = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/;
                return reg.test(str);
        }
        var re = isEmail($('#username').val());
        if(!re){
            $('#username').next('span').html('请填写邮箱注册！');
            $('#username').focus();
            error++;
        }

        if($('#passwd').val() == ''){
            $('#passwd').next('span').html('密码必填！');
            $('#passwd').focus();
            error++;
        }
        if($('#passwd').val().length < 6 && $('#passwd').val().length >18){
            $('#passwd').next('span').html('请输入六到十八位！');
            $('#passwd').focus();
            error++;
        }
        if($('#repasswd').val() == ''){
            $('#repasswd').next('span').html('确认密码必填！');
            $('#repasswd').focus();
            error++;
        }
        if($('#repasswd').val() != $('#passwd').val()){
            $('#repasswd').next('span').html('密码和确认密码不相同！');
            $('#repasswd').focus();
            error++;
        }
        if($('#tel').val() == ''){
            $('#tel').next('span').html('手机号必填！');
            $('#tel').focus();
            error++;
        }
        function isTel(str) {
                var reg = /^1\d{10}$/;
                return reg.test(str);
        }
        var tel = isTel($('#tel').val());
        if(!tel){
            $('#tel').next('span').html('请输入正确的电话号码！');
            $('#tel').focus();
            error++;
        }
        if($('#year').val() == '' && $('#month').val() == '' && $('#day').val() == ''){
            $('#verifydate').html('请选择出生日期！');
            $('#day').focus();
            error++;
        }
        if(error){
            return ;
        }
        //把数据提交到服务器处理
        $.ajax({
            url: './php/register.php',
            type: 'POST',
            dataType: 'JSON',
            data: $('#register').serialize()
        })
        .done(function(d) {
            if(d.r == 'ok'){
                window.location.href = './mainnew.php';
            }else if(d.r == 'fail'){
                alert('失败，请重新操作！');
            }else if(d.r == 'usernamefail'){
                $('#username').next('span').show();
                $('#username').next('span').html('账号已存在!');
                $('#username').focus();
            }
        });

    });


  //当窗口大小改变时，每个标签位置改变  
 $(window).resize(function(){
    if ($('.con').width()>780) {
            $(".left_line").css("left",130);
    }
    if ($('.con').width()<780) {
            $(".left_line").css("left",90);
    }
    if ($('.con').width()>780) {
            $(".h4").css("left",135);
    }
    if ($('.con').width()<780) {
            $(".h4").css("left",95);
    }
    //"已有账号" 的响应式
    if ($('.con').width()>1110) {
        $(".login").css("left",925);
    }
    if ($('.con').width()>1070 && $('.con').width()<1100) {
            $(".login").css("left",900);
    }
    if ($('.con').width()>1040 && $('.con').width()<1070) {
            $(".login").css("left",870);
    }
    if ($('.con').width()>1010 && $('.con').width()<1040) {
            $(".login").css("left",840);
    }
    if ($('.con').width()>980 && $('.con').width()<1010) {
            $(".login").css("left",810);
    }
    if ($('.con').width()>950 && $('.con').width()<980) {
            $(".login").css("left",780);
    }
    if ($('.con').width()>920 && $('.con').width()<950) {
            $(".login").css("left",750);
    }
    if ($('.con').width()>890 && $('.con').width()<920) {
            $(".login").css("left",720);
    }
    if ($('.con').width()>860 && $('.con').width()<890) {
            $(".login").css("left",690);
    }
    if ($('.con').width()>830 && $('.con').width()<860) {
            $(".login").css("left",660);
    }
    if ($('.con').width()>800 && $('.con').width()<830) {
            $(".login").css("left",630);
    }
    if ($('.con').width()>770 && $('.con').width()<800) {
            $(".login").css("left",600);
    }
    if ($('.con').width()>740 && $('.con').width()<770) {
            $(".login").css("left",570);
    }
    if ($('.con').width()>710 && $('.con').width()<740) {
            $(".login").css("left",540);
    }
    if ($('.con').width()>680 && $('.con').width()<710) {
            $(".login").css("left",510);
    }
    if ($('.con').width()>650 && $('.con').width()<680) {
            $(".login").css("left",480);
    }
    if ($('.con').width()>620 && $('.con').width()<650) {
            $(".login").css("left",450);
    }
    if ($('.con').width()>590 && $('.con').width()<620) {
            $(".login").css("left",420);
    }
    if ($('.con').width()>560 && $('.con').width()<590) {
            $(".login").css("left",390);
    }
    if ($('.con').width()>530 && $('.con').width()<560) {
            $(".login").css("left",360);
    }
    if ($('.con').width()>500 && $('.con').width()<530) {
            $(".login").css("left",330);
    }
    if ($('.con').width()>470 && $('.con').width()<500) {
            $(".login").css("left",300);
    }
    if ($('.con').width()>440 && $('.con').width()<470) {
            $(".login").css("left",280);
    }
    if ($('.con').width()<410) {
            $(".login").hide();
    }
    if ($('.con').width()>410) {
        $(".login").show();
    }
    //当屏幕小于350时隐藏 “登录”
    if ($('.con').width()<350) {
            $("#login").hide();
    }
    if ($('.con').width()>350) {
        $("#login").show();
    }
    //当屏幕小于400时，隐藏上传头像
    if ($('.con').width()<410) {
        $("#j_upload_img_btn").hide();
        $("#upload").hide();
    }
    if ($('.con').width()>410) {
        $("#j_upload_img_btn").show();
        $("#upload").show();
    }
    //左边图片的隐藏 显示
    if ($('.con').width()>600) {
            $(".con_left").show();
    }
    if ($('.con').width()<600) {
            $(".con_left").hide();
    }
    //form表单的响应式
    if ($('.con').width()>470) {
            $("#upload_img").show();
    }
    if ($('.con').width()<470) {
            $("#upload_img").hide();
    }
    
    if ($('.con').width()>900) {
            $(".nick").css("left",70);
    }
    if ($('.con').width()<900) {
            $(".nick").css("left",40);
    }
    if ($('.con').width()<700) {
            $(".nick").css("left",30);
    }
    if ($('.con').width()<600) {
            $(".nick").css("left",10);
    }
    if ($('.con').width()<500) {
            $(".nick").css("left",-10);
    }

    if ($('.con').width()>900) {
            $(".user").css("left",70);
    }
    if ($('.con').width()<900) {
            $(".user").css("left",40);
    }
    if ($('.con').width()<700) {
            $(".user").css("left",30);
    }
    if ($('.con').width()<600) {
            $(".user").css("left",10);
    }
    if ($('.con').width()<500) {
            $(".user").css("left",-10);
    }

    if ($('.con').width()>900) {
            $(".passwd").css("left",70);
    }
    if ($('.con').width()<900) {
            $(".passwd").css("left",40);
    }
    if ($('.con').width()<700) {
            $(".passwd").css("left",30);
    }
    if ($('.con').width()<600) {
            $(".passwd").css("left",10);
    }
    if ($('.con').width()<500) {
            $(".passwd").css("left",-10);
    }

    if ($('.con').width()>900) {
            $(".sex").css("left",70);
    }
    if ($('.con').width()<900) {
            $(".sex").css("left",40);
    }
    if ($('.con').width()<700) {
            $(".sex").css("left",30);
    }
    if ($('.con').width()<600) {
            $(".sex").css("left",10);
    }
    if ($('.con').width()<500) {
            $(".sex").css("left",-10);
    }

    if ($('.con').width()>900) {
            $(".hob").css("left",70);
    }
    if ($('.con').width()<900) {
            $(".hob").css("left",40);
    }
    if ($('.con').width()<700) {
            $(".hob").css("left",30);
    }
    if ($('.con').width()<600) {
            $(".hob").css("left",10);
    }
    if ($('.con').width()<500) {
            $(".hob").css("left",-10);
    }

    if ($('.con').width()>900) {
            $(".repwd").css("left",43);
    }
    if ($('.con').width()<900) {
            $(".repwd").css("left",13);
    }
    if ($('.con').width()<700) {
            $(".repwd").css("left",3);
    }
    if ($('.con').width()<600) {
            $(".repwd").css("left",-13);
    }
    if ($('.con').width()<500) {
            $(".repwd").css("left",-33);
    }

    if ($('.con').width()>900) {
            $(".telnum").css("left",43);
    }
    if ($('.con').width()<900) {
            $(".telnum").css("left",13);
    }
    if ($('.con').width()<700) {
            $(".telnum").css("left",3);
    }
    if ($('.con').width()<600) {
            $(".telnum").css("left",-13);
    }
    if ($('.con').width()<500) {
            $(".telnum").css("left",-33);
    }

    if ($('.con').width()>900) {
            $(".day").css("left",43);
    }
    if ($('.con').width()<900) {
            $(".day").css("left",13);
    }
    if ($('.con').width()<700) {
            $(".day").css("left",3);
    }
    if ($('.con').width()<600) {
            $(".day").css("left",-13);
    }
    if ($('.con').width()<500) {
            $(".day").css("left",-33);
    }

    if ($('.con').width()>900) {
            $(".mt").css("left",43);
    }
    if ($('.con').width()<900) {
            $(".mt").css("left",13);
    }
    if ($('.con').width()<700) {
            $(".mt").css("left",3);
    }
    if ($('.con').width()<600) {
            $(".mt").css("left",-13);
    }
    if ($('.con').width()<500) {
            $(".mt").css("left",-33);
    }

    if ($('.con').width()<880) {
            $(".verifydate").hide();
    }
    if ($('.con').width()>880) {
            $(".verifydate").show();
    }

 })

})
window.onload = function () {
    upload();
        var year = document.getElementById('year');
        var month = document.getElementById('month');
        var day = document.getElementById('day');
        var date = new Date();
        for(var i=1979;i<=date.getFullYear();i++){
           year.innerHTML += "<option>"+i+"</option>";
        }
        for(var j=1;j<=12;j++){
            month.innerHTML += "<option>"+j+"</option>";
        }
        for(var t=1;t<=31;t++){
            day.innerHTML += "<option>"+t+"</option>";
        }

        year.onchange = function (){
            document.getElementById('day').innerHTML='';
            var year =parseInt(document.getElementById('year').value);
            var month = parseInt(document.getElementById('month').value);
            var myDay= document.getElementById('day');
            switch (month){
                case 1:case 3:case 5:case 7:case 8:case 10:case 12:
                for(var t=1;t<=31;t++){
                    myDay.innerHTML += "<option>"+t+"</option>";
                };
                break;
                case 4:case 6:case 9:case 11:
                for(var t=1;t<=30;t++){
                    myDay.innerHTML += "<option>"+t+"</option>";
                };
                break;
                default:
                    if(year%4==0&&year%100!=0||year%400==0){
                        for(var t=1;t<=29;t++){
                            myDay.innerHTML += "<option>"+t+"</option>";
                        }
                    }else {
                        for(var t=1;t<=28;t++){
                            myDay.innerHTML += "<option>"+t+"</option>";
                        }
                    }
            }
        }

        month.onchange = function (){
            document.getElementById('day').innerHTML='';
            var year =parseInt(document.getElementById('year').value);
            var month = parseInt(document.getElementById('month').value);
            var myDay= document.getElementById('day');
            switch (month){
                case 1:case 3:case 5:case 7:case 8:case 10:case 12:
                for(var t=1;t<=31;t++){
                    myDay.innerHTML += "<option>"+t+"</option>";
                };
                break;
                case 4:case 6:case 9:case 11:
                for(var t=1;t<=30;t++){
                    myDay.innerHTML += "<option>"+t+"</option>";
                };
                break;
                default:
                    if(year%4==0&&year%100!=0||year%400==0){
                        for(var t=1;t<=29;t++){
                            myDay.innerHTML += "<option>"+t+"</option>";
                        }
                    }else {
                        for(var t=1;t<=28;t++){
                            myDay.innerHTML += "<option>"+t+"</option>";
                        }
                    }
            }
        }
}