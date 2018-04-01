$(function (argument) {
	$("#logout").click(function(event) {
		$.ajax({
			url: './php/logout.php',
			type: 'GET',
			dataType: 'JSON',
			data: {logout: '1'},
		})
		.done(function(data) {
			if(data.r=='ok'){
              alert("注销成功，欢迎下次使用！");
			window.location.href="./login.php";
			}else{
				alert("注销失败，请重新注销！");
			}
		});
		
	});
})