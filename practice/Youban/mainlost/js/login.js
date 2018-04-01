$(function () {
	//点击验证码，改变
	$('#coderimg').click(function(event) {
            $(this).attr('src', './captcha.php?t=' + new Date().valueOf());
        });
		//失去光标就隐藏错误图标
	$('#username').blur(function(event) {
		$('#usererror').hide();
	});
	$('#username').blur(function(event) {
		$('#codererror').hide();
	});
	$('#username').blur(function(event) {
		$('#passwderror').hide();
	});
	//账号失去光标，如果账号存在就改变头像
	$('#username').blur(function(event) {
		console.log('1111');
		$.ajax({
			url:'./php/img_head.php',
			type:'POST',
			dataType:'JSON',
			data:$('#login').serialize()
		})
		.done(function (data){
			if(data.re == 'username_invail'){
				$('#usererror').show();
				$('#username').focus();
			}else{
				$("#h_img").attr("src",data.re);
			}
		})
	});
	//点击登录，账号密码正确就跳转到首页
	$('#loginbtn').click(function (){
		//首先检查账号和密码是否填写
		if($('#username').val() == ''){
		//	$('#username').next('span').html('账号必填');
			$('#username').focus();
			return ;
		}
		if($('#passwd').val() == ''){
		//	$('#passwd').next('span').html('密码必填');
			$('#passwd').focus();
			return ;
		}
		console.log($('#login').serialize());
		 var $savesid     = $(':checkbox:checked').val()==undefined?0:$(':checkbox:checked').val();
		 var $username   = $('#username').val();
        var $passwd     = $('#passwd').val();
         var $coder     = $('#coder').val();
		//开始提交数据到服务器进行检查
		$.ajax({
			url:'./login.php',
			type:'POST',
			dataType:'JSON',
			data: {username: $username, passwd: $passwd,savesid:$savesid,coder:$coder}
		})
		.done(function (data){
			if(data.r == 'coder_invail'){
            //    $('#coder').next('span').html('验证码错误！');
                //出错刷新验证码
                $('#codererror').show();
                $('#coderimg').attr('src', './coder.php?t=' + new Date().valueOf());
                $('#coder').focus();

            }else if(data.r == 'sql_error'){
			//	$('#username').next().html('账号不存在');
				alert("数据错误，请刷新后重新输入！")
			}else if(data.r == 'control_invail'){
			//	$('#username').next().html('账号不存在');
				alert("该用户名已被注销，请重新注册！")
			}else if(data.r == 'username_invail'){
			//	$('#username').next().html('账号不存在');
			    $('#usererror').show();
				$('#username').focus();
			}else if(data.r == 'password_invail'){
			//	$('#passwd').next().html('密码不正确');
		        $('#passwderror').show();
				$('#passwd').focus();
			}else if(data.r == 'ok'){
				window.location.href = "./mainnew.php";
			}else{
				alert('未知错误');
			}
			})
	})
	//当窗口大小改变时，每个标签位置改变  
	$(window).resize(function(){
   		if ($('.con_left').width()<600) {
			$('.con_left').hide();
		}
		if ($('.con_left').width()>600) {
			$('.con_left').show();
		}
		if ($('.con').width()>1200) {
			$(".con_right").css("left",800);
		}
		if ($('.con').width()<1200 && $('.con').width()>1000) {
			$(".con_right").css("left",600);
		}
		if ($('.con').width()<1100 && $('.con').width()>1000) {
			$(".con_right").css("left",550);
		}
		if ($('.con').width()<1000 && $('.con').width()>900) {
			$(".con_right").css("left",500);
		}
		if ($('.con').width()<900 && $('.con').width()>800) {
			$(".con_right").css("left",400);
		}
		if ($('.con').width()<800 && $('.con').width()>700) {
			$(".con_right").css("left",300);
		}
		if ($('.con').width()<700 && $('.con').width()>600) {
			$(".con_right").css("left",200);
		}
		if ($('.con').width()<600 && $('.con').width()>500) {
			$(".con_right").css("left",100);
		}
		if ($('.con').width()<500) {
			$(".con_right").css("left",50);
		}
	});

})