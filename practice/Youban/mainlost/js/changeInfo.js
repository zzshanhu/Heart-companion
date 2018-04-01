$(document).ready(function() {
	$('#saveInfo').click(function(event) {
		var data1=$("#changeInfo").serialize();
		var $changeUser=$("#changeUser").html();
        data= decodeURIComponent(data1,true);
		var arr=data.split("&");
		var all=[];
		arr.forEach( function(element, index) {
			var arrnow=element.split("=");
			all[arrnow[0]]=arrnow;
		});
		var $sex=all['sex'][1];
		var $nickname=all['nickname'][1];
        var $realname=all['realname'][1];
        var $emotional=all['emotional'][1];
        //判断用户是否修改地址
        if(all['province'][1]!='请选择省份'){
           var $address=all['province'][1]+"-"+all['city'][1];
        }else{
           var $address='';
        }
        var $email=all['email'][1];
        var $tel=all['tel'][1];
        //判断用户是否修改生日
        if(all['year'][1]!='1960'||all['month'][1]!='1'||all['day'][1]!='1'){
           var $birthday=all['year'][1]+"-"+all['month'][1]+"-"+all['day'][1];     
        }else{
           var $birthday='';     
        }
        var $job=all['job'][1];
        var $ownsign=all['ownsign'][1];
        var $mark=all['mark'][1];
        $.ajax({
        	url: './php/changeInfo.php',
        	type: 'POST',
        	dataType: 'JSON',
        	data: {sex:$sex,nickname: $nickname,realname: $realname,emotional: $emotional,address: $address,
        		email: $email,tel: $tel,birthday: $birthday,job: $job,ownsign: $ownsign,mark: $mark,changeUser:$changeUser}
        })
        .done(function(data) {
        	if(data.r=='ok'){
        		alert('修改成功！');
        		window.location.href="./editInfoNew.php";
        	}else{
        		alert('修改失败，请重试！');
        		window.location.href="./editInfoNew.php";
        	}
        });
        
	});
	
});
