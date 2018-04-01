$(function () {
    (function(){
        var Carousel = $(".Carousel"),
            $ul = Carousel.find(".box ul"),
            $li = $ul.children(),
            $btn = $(".btn1"),
            $tab = Carousel.find(".class-tab ul li"),
            length = $li.length,
            Mid = Math.floor(length/2),
            oMid,
            sTime = new Date().valueOf(),
            timer,
            arr = ['https://movie.douban.com/subject/1292052/',
                    'https://movie.douban.com/subject/1291546/',
                    'https://movie.douban.com/subject/1295644/',
                    'https://movie.douban.com/subject/1292063/',
                    'https://movie.douban.com/subject/1291561/',
                    'https://movie.douban.com/subject/1295124/',
                    'https://movie.douban.com/subject/1292722/',
                    'https://movie.douban.com/subject/3541415/',
                    'https://movie.douban.com/subject/2131459/'];


        //$(window).scroll(function () {
           //if($(window).scrollTop()>0){
                change();
           //}
        //});

        //每个Li都定义点击事件
        $li.click(function(){
            var $i = $li.index($(this));
            console.log($i,'$i');
            console.log(oMid,'oMid');
            //如果$i == oMid,给每个li标签下的a标签添加链接
            if($i==oMid){
                console.log($li.eq(oMid));
                $li.eq(oMid).find("a").attr('href',arr[oMid]).end().not($li.eq(oMid)).find('a').attr('href','javascript:;');
            }
            if($i==(oMid+10)%9){
                $btn.trigger('click',10);
            }
            if($i==(oMid+11)%9){
                $btn.trigger('click',11);
                setTimeout(function(){$btn.trigger('click',11);}, 701);
            }
            if($i==(oMid+8)%9){
                $btn.trigger('click',0);
            }
            if($i==(oMid+7)%9){
                $btn.trigger('click',0);
                setTimeout(function(){$btn.trigger('click',0);},701);
                
            }

        })

        
        //左右按钮
        $btn.click(function (e , num) {
            var This = $(this).index(".btn1") || num;
            console.log(This);
            if(new Date().valueOf()-sTime>500){
                if(This){
                    //    右
                    auto_right();
                }else{
                    //    左
                    (--Mid<0)&&(Mid=length-1);
                    change();
                    $ul.animate({
                        marginLeft : 230
                    },490,function () {
                        $(this).css("marginLeft",0);
                        $ul.prepend($ul.children().last())
                    })
                }
                sTime = new Date().valueOf();
            }
        });
        //右边按钮小函数
        function auto_right(){
            Mid= ++Mid%length;
            change();
            $ul.stop().animate({
                marginLeft : -246
            },500,function () {
                $(this).css("marginLeft",0);
                $ul.children().eq(0).appendTo($ul);
            })
        }
        //自动轮播
        timer = setInterval(function(){
            auto_right()
        },1720)
        //鼠标移入停止轮播
        Carousel.hover(function(){
            clearInterval(timer);
        },function(){
            timer = setInterval(function(){
                auto_right()
            },1720)
        })
        


        //tab按钮

        function change() {
            $tab.removeClass().eq(Mid).addClass("on");
            $li.removeClass().eq(Mid-1).addClass("edge").next().addClass("mid").next().addClass("edge");
            oMid = Mid;
        }
    })();














            //瀑布流

            let [aUl,oTest,s,c,timer]=[
                document.querySelectorAll("#box ul.rol"),
                document.getElementById("test"),
                0,
                10
            ];
            eFn(100);
            window.onscroll = function () {
                eFn(100);
            };
            function eFn(x) {
                if ( s >= 300 )return;
                clearTimeout(timer);
                timer = setTimeout( function () {

                    let testToTop = oTest.offsetTop;
                    let nowBottom = (document.documentElement.scrollTop || document.body.scrollTop) + window.innerHeight;

                    //console.log( testToTop , nowBottom );

                    if ( testToTop - nowBottom <= 900 ){
                        ajax({
                            url : "http://120.77.174.93/dbmovie",
                            data : {
                                start : s,
                                count : c
                            },
                            success : function (data) {
                                draw(data);
                            }
                        });
                        s += c;
                    }
                },x);
            }
           

            function draw( data ){

                let i = 0;
                !function m() {
                    if(i>=c)return;//完成，结束
                    let d = data[i];
                    let rating = d.rating.average;
                    let cName;
                    if ( rating >= 8 ){
                        cName = "high";
                    }else if ( rating >= 5 ){
                        cName = "middle";
                    }else{
                        cName = "low";
                    }

                    let oImg = new Image();
                    oImg.src = `${ d.images.large }`;
                    oImg.onload = function () {
                        let oLi = document.createElement("li");
                        oLi.innerHTML = `
                            <div class="img">
                            <a href="${d.alt}" target="_blank"><img src="${ d.images.large }" width="230" height="auto" /></a>
                                
                            </div>
                            <p>片名：<a href="${d.alt}" target="_blank">《<span>${d.title}</span>》</a></p>
                            <p>年份：<span>${d.year}</span></p>
                            <p>评分：<span class="${cName}">${rating}</span></p>
                        `;
                        
                        aUl[indexOfShort()].appendChild( oLi );
                        i ++;
                        m();

                        let left = oLi.offsetLeft;
                        let top = oLi.offsetTop;

                        oLi.style.cssText = `top:-${top}px;left:-${left}px;transition:top .5s,left .5s;box-shadow: 2px 6px 8px gray`;
                        setTimeout(function () {
                            oLi.style.top = "0";
                            oLi.style.left = "0";
                        },100);
                    };
                }();
            }

            //选择最短的ul
            function indexOfShort() {
                let index = 0;
                let iHeight = aUl[0].clientHeight;
                for (let i = 1,length=aUl.length; i < length; i++) {
                    let h = aUl[i].clientHeight;
                    if ( h < iHeight ){
                        index = i;
                        iHeight = h;
                    }
                }
                return index;
            }
            
            function ajax( json ) {
                //处理参数
                var type = json.type || "GET";
                var url = json.url;
                var data = json.data || "";
                var success = json.success;
                var error = json.error;
                var dataType = json.dataType || "json";

                //处理data，同时处理url
                if ( data ){
                    var str = "";
                    for (var key in data) {
                        str += key + "=" + data[key] + "&";
                    }
                    str += "_="+new Date().getTime();
                    data = str;
                    if ( /get/i.test(type) ){
                        url += "?"+data;
                        data = "";
                    }
                }

                //请求部分
                var xhr = new XMLHttpRequest();
                xhr.open( type , url , true );

                //send之前设置请求头
                xhr.setRequestHeader('content-Type','application/x-www-form-urlencoded');

                xhr.send( data );
                xhr.onreadystatechange = function (ev) {
                    if ( this.readyState === 4 ){
                        var status = this.status;
                        if ( status >= 200 && status < 300 ){
                            var rep = this.responseText;
                            if ( dataType === "json" )rep = JSON.parse(rep);
                            success && success( rep );
                        }else{
                            error && error( status );
                        }
                    }
                };
            }
})
