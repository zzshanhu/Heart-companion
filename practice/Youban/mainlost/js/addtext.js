$(function (argument) {
	window.onload=function (argument) {
    	var ue = UE.getEditor('content');
        // $("#addtext").click(function(event) {
        //     alert(ue.getContentTxt());
        // });

        $("#addtext").click(function(event) {
		// var $content=$("#content").val();
		var $content=ue.getContentTxt();
		var $username=$("#username").val();
		var $picaddress=$("#imgval").val();
		$picaddress=$picaddress.substr(1);
		if($content==''){
			alert("发布内容不能为空");
			return;
		}
		$.ajax({
			url: './php/addtext.php',
			type: 'POST',
			dataType: 'JSON',
			data: {content: $content,username: $username,picaddress:$picaddress}
		})
		.done(function(data) {
			if(data.r=="success"){
				alert("发布成功");
				window.location.reload();
			}else if(data.r=="fail"){
				alert("发布失败，请刷新后重新发布！");
			}
		});
		
	});
        $("#test").click(function(event) {
           
        });
    }
    
	
})