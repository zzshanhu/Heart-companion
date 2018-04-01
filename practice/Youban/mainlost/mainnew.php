<?php
	require('./requirement/head.php');
?>
<div class="container">
			<!-- ! 模态申明层 -->
	<div class="modal fade" id='myModal' tabindex='-1'>
	<?php  
echo '<input type="hidden" id="whichnum" value="1" username='.$_SESSION['username'].'>';
	?>
		<!-- 窗口申明层 -->
		<div class="modal-dialog modal-lg">
			<!-- 显示内容层 -->
			<div class="modal-content">
				<!-- 内容层下面分别有头、身体、脚 -->
				<div class="modal-header">
					<button class='close' data-dismiss='modal'>&times;</button>
					<h3 >休息一下</h3>
				</div>
				<div class="modal-body">
					<!-- 笑一笑内容结构 -->
					<div class="right">
						<p class="title">有伴er &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;伴er你笑
							<button type="button" class='rightBtn btn btn-default'>随机笑一笑</button>

						</p>
						<img class='img' src="./img/quan.png" width='30' height='30' alt="">
					</div>
				</div>
				<div class="modal-footer">@有伴er工作室</div>
			</div>
		</div>
	</div>
	<button class='btn btn-default laugh-button btn-lg' data-target='#myModal' data-toggle='modal' data-backdrop='static' data-keyboard='true' draggable='true'>轻松一刻</button>


	<!-- 封面背景 -->
	<div class="row showselfHead">
		<!-- <div class="showHead"><img src="./img/fmbg9.jpg" width="100%" height="100%" alt="">
		</div> -->

<!-- 	<div class="fmbg-content">
					<div class="content-title" contenteditable="true">我新发表的新主题</div>

				<button class="btn btn-default btn-lg">发 表</button>
			</div> -->
			<div class="formposition">
				<form class="form-group" >
           <input hidden="hidden" type="text" name="username" value="<?=$_SESSION['username']?>" id="username">
      <div class="control-group ">
                 <!-- <label for="firstname" class="control-label">详情</label> -->
                 <div class="controls">
                 <script id="content" name="content" type="text/plain" style="width:100%;height:150px;margin-top:50px;"></script>
                     <!-- <textarea id="content" name="content"></textarea>                     -->
                    </div>
        
        
        <!-- 传图片地址值用的 -->
        <input type="hidden" id="imgval" name="imgval" value="">
                </div>
                <div class="form-actions" style="float: right;">
					<div class="referbtn">
						<button type="button" id="j_upload_img_btn" >
                    		<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                    	</button>
						<button class="addbtn addtext" id="addtext" type="button">发布</button>
					</div>
                    
                </div>
                <ul id="upload_img_wrap" style="list-style-type: none;"></ul>
	             </form>
	             </div>
                 <textarea id="uploadEditor" style="display: none;"></textarea>



	</div>
	<!-- 封面背景结束 -->
	<div class="row content">
		<!-- 左边 -->
		<?php
			require('./requirement/rightContent.php');
		?>
		<!-- 左边 -->
		</div>
	</div>
	<div class="footer">@有伴er工作室</div>
</div>
	<link rel="stylesheet" href="./css/main.css">
	<script type="text/javascript" src="../../public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="../../public/plug/ue/ueditor.all.js"></script>
	<script src="../login/js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="./js/mainnew.js"></script>
	<script src="./js/addtext.js" type="text/javascript"></script>
</body>
</html>
<script>
            //==========================================================        
        // 如何单独上传图片功能
        // 监听多图上传和上传附件组件的插入动作
        // 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
        var uploadEditor = UE.getEditor("uploadEditor", {
            isShow: false,
            focus: false,
            enableAutoSave: false,
            autoSyncData: false,
            autoFloatEnabled:false,
            wordCount: false,
            sourceEditor: null,
            scaleEnabled:true,
            toolbars: [["insertimage", "attachment"]]
        });
        uploadEditor.ready(function () {
            uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
        });

        // 自定义按钮绑定触发多图上传和上传附件对话框事件
        document.getElementById('j_upload_img_btn').onclick = function () {
            var dialog = uploadEditor.getDialog("insertimage");
            dialog.title = '多图上传';
            dialog.render();
            dialog.open();
        };

        // 多图上传动作
        function _beforeInsertImage(t, result) {
            var imageHtml = '';
            var imgval = '';
            for(var i in result){
                imageHtml += '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
                imgval    += ',' + result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('imgval').value = imgval;
        }
</script>

