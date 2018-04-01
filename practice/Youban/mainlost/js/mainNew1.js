$(document).ready(function() {
	
	/*点赞区*/
	var i;
	var $j;
	$(".personnel").on('click', '.like', function(event) {
		var $tid=$(this).prev().attr('tid');
         if($(this).children().hasClass('activeColor') == true){
               $j=2;//点赞数-1
         }else{
         	$j=1;//点赞数+1
         }
           
           $.ajax({
				url: './php/changedznum.php',
				type: 'POST',
				dataType: 'JSON',
				data: {j: $j,tid:$tid}
			})
			.done(function(data) {
				if(data.r!='ok'){
                     return;
				}
			});
		if($j==2){
			i = $(this).children().children().eq(1).html()-1;
			$(this).children().removeClass('activeColor');	
			$(this).children().children().eq(1).html(i);
			$(this).children().css('color', '#666');
		}else{
			i = parseInt($(this).children().children().eq(1).html())+1;
			$(this).children().children().eq(1).html(i);
			$(this).children().addClass('activeColor');	
			$(this).children().css('color', '#FD8520');	
		}

	});
	/*点赞区结束*/

	/*评论区*/
	$(".left").on("click",".comment",function(event) {
		if($(this).parent().parent().children().length > 1){
			$(this).parent().parent().parent().css('border-bottom', 'none');
			$(this).parent().siblings('.comarea').remove();
		}else{
			$(this).parent().parent().append(
				'<div class="comarea"><div class="inTxt"><input class="inbox"  type="text" /></div><div class="btnbox"><button class="inpBtn btn btn-default" >提交</button></div><div class="comArea"></div></div>'
				);
			$('.inpBtn').attr('tid', $(this).attr('tid'));
			$('.inpBtn').attr('username', $(this).attr('username'));
$(".inpBtn").click(function(event) {
	var mydate = new Date();
    var $tid=$(this).attr('tid');
    var $username=$(this).attr('username');
	var $comContent=$(this).parent().prev().children('.inbox').val();
	var model='';
	$.ajax({
		url: './php/addcomment.php',
		type: 'POST',
		dataType: 'html',
		data: {comContent: $comContent,tid:$tid,username:$username}
	})
	.done(function(data) {
		if(data=='fail'){
			alert("评论失败，请重新评论！");
		}else{
			model=data;
		}
	});

	model='<div class="commentArea"><div class="comArea"><span class="comPer">'+$username+'：</span><span class="comCont">'+$comContent+'</span><span class="comTime">刚刚</span></div></div>';
	$(this).parent().parent().parent().after(model);
	$(this).parent().parent().remove();
});

		}
	})
	// $('.comment').click();
/*个人主页评论区设置*/
	$(".personnel").on("click",".comment",function(event) {
		var This=$(this);
		console.log(This.children().children().children().children().last());
		if($(this).parent().parent().children().length > 1){
			$(this).parent().parent().parent().css('border-bottom', 'none');
			$(this).parent().siblings('.comarea').remove();
		}else{
			$(this).parent().parent().append(
				'<div class="comarea"><div class="inTxt"><input class="inbox"  type="text" /></div><div class="btnbox"><button class="inpBtn btn btn-default" >提交</button></div><div class="comArea"></div></div>'
				);
			$('.inpBtn').attr('tid', $(this).attr('tid'));
			$('.inpBtn').attr('username', $(this).attr('username'));
			$('.inpBtn').attr('nickname', $(this).attr('nickname'));
$(".inpBtn").click(function(event) {
	var mydate = new Date();
    var $tid=$(this).attr('tid');
    var $username=$(this).attr('username');
    var $nickname=$(this).attr('nickname');
	var $comContent=$(this).parent().prev().children('.inbox').val();
	if($comContent==''){
		alert("评论不能为空！");
		return;
	}
	var model='';
	$.ajax({
		url: './php/addcomment.php',
		type: 'POST',
		dataType: 'html',
		data: {comContent: $comContent,tid:$tid,username:$username}
	})
	.done(function(data) {
		if(data=='fail'){
			alert("评论失败，请重新评论！");
			return;
		}else{
			model=data;
		}
	});

	model='<div class="commentArea"><div class="comArea"><span class="comPer">'+$nickname+'：</span><span class="comCont">'+$comContent+'</span><span class="comTime">刚刚</span></div></div>';
	$(this).parent().parent().parent().after(model);
	$(this).parent().parent().remove();
	var cnum=parseInt(This.children().children().children().children().last().html())+1;
This.children().children().children().children().last().html(cnum);
});

		}
	})
/*个人主页评论区设置结束*/
	/*评论区结束*/
/*评论提交区*/

/*评论提交区结束*/
	/*文章区图片缩放*/
	var smallWidth  = $('.small_img').width(); //小图宽度
    var smallHeight = $('.small_img').height(); //小图高度
    var bigWidth     = $('.big_img').width(); //大图宽度
    var bigHeight    = $('.big_img').height(); //大图高度
    var small_str    = smallWidth+' X '+smallHeight+' px';
    var big_str      = bigWidth+' X '+bigHeight+' px';
    $('#small_size').text(small_str); //显示小图片实际尺寸
    
    //点击显示大图弹出层
    $('.small_img').click(function(){ 
    	$(this).parent().after('<div class="bigImg"><img class="big_img" width="100%"/></div>');
    	$('.big_img').attr('src', $(this).attr('src'));
console.log($(this).attr('src'));
        // 隐藏小图
        $(this).css('display', 'none');
        $('#big_size').text(big_str);

        // 还原小图
        $('.bigImg').click(function(){
	        $(this).prev().children().css('display', 'block');
	        $(this).remove();

    	});
    }); 
	/*文章区图片缩放结束*/
/*点击头像跳转*/
// $(".seeother").click(function(event) {
// 	var $username=$(this).attr("username");
// 	window.location.href='./showSelf.php?username='+$username;
// });

	$(".personnel").on('click', '.seeother', function(event) {
	var $username=$(this).attr("username");
	window.location.href='./showSelf.php?username='+$username;
});
/*点击头像跳转结束*/


/*数据异步加载*/
$(window).scroll(function(event) {
	// console.log($(document).innerHeight());
	// console.log($("body").height());
	if($(window).innerHeight()+$(window).scrollTop()>=$(document).innerHeight()-200){
           $pagenum=$("#pagenum").val();
           $whichnum=$("#whichnum").val();
           $username=$("#whichnum").attr('username');
           $("#pagenum").remove();
           $.ajax({
           	url: './php/addtz.php',
           	type: 'POST',
           	dataType: 'html',
           	data: {pagenum: $pagenum,whichnum: $whichnum,username: $username}
           })
           .done(function(data) {
           	$(".personnel").append(data);
           });
           


	}

});
/*数据异步加载结束*/
/*笑一笑开始*/


		var $random = 1;
		ajax($random);
		function ajax(r){
			$.ajax({
				url:'https://route.showapi.com/341-1?maxResult=4&page='+r+'&showapi_appid=55462&showapi_test_draft=false&showapi_sign=14999eef489d456ea4bebac97d2f268a',
				type:'get',
				dataType:'json'
				
			})
			.done(function(d){
				if(d.showapi_res_error){
					// var $laugh_div = $('<div class="laugh_fail">哎呀。。加载失败。</div>');
					$('.right').append($laugh_div);
					$('.img').remove();
					return;
				}
				if (d){
					$('.img').remove();
					$('.laugh_fail').remove();
				}

				var $arr = d.showapi_res_body.contentlist;
				$($arr).each(function(i,e){
					var $div = $('<div class="laughContent"></div>');
					$div.html(e.text);
					var $tdiv = $('<div class="laughName"></div>');
					$tdiv.html(e.title);
					$('.right').append($tdiv).append($div);
				})
			})
			
		};
		//按钮放在外面，在里面的话，请求过程中会重写按钮，
		$('.rightBtn').click(function(){
			$('.laughName').remove();
			$('.laughContent').remove();
			$('.right').append('<img class="img" src="./img/quan.png" width="30" height="30" alt="">');
			$rand = Math.ceil(Math.random()*440);
			ajax($rand);
		});
	//笑一笑结束
	//悬浮按钮拖动

	var  $startLeft= 0;
	var Left=0;
	var $moveLeft=0;
	$('.laugh-button').get(0).onmouseover = function(){
		if(parseInt(parseInt($moveLeft)-parseInt($startLeft)+parseInt(Left))<50){
			this.style.left = 0+'px';
			this.style.color="#BF6A54";
			this.innerHTML = '会心一笑';
			this.style.width=170+'px';
		}
	};

	$('.laugh-button').get(0).onmouseout = function(){
		if(parseInt(parseInt($moveLeft)-parseInt($startLeft)+parseInt(Left))<50){
			this.style.left = -120+'px';
		}
	}



	
	$('.laugh-button').get(0).ondragstart=function(e){
			$startLeft = e.clientX;
			var $startTop = e.clientY;
			 Left = this.offsetLeft;
			var Top = this.offsetTop;
			var This = this;
			this.innerHTML = '';
			this.style.width=50+'px';
			document.ondragover = function(e){
				e.preventDefault();
				
			};
			document.ondrop = function(e){
				
				
				 $moveLeft = e.clientX;
				var $moveTop = e.clientY;
				$('.laugh-button').get(0).style.left= $moveLeft-$startLeft+Left+'px';
				$('.laugh-button').get(0).style.top = $moveTop-$startTop +Top+'px';
				
				if (parseInt(parseInt($moveLeft)-parseInt($startLeft)+parseInt(Left))<50) {
					This.innerHTML = '轻松一刻';
					This.style.width=170+'px';
					
					
				}
			}
		}
	//悬浮按钮拖动结束
});
