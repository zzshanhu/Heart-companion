window.onload=function(){

    mydate.loadDate("year","month","day",1960)
}
var mydate={
	/**
	 * 
	 * @param {Object} year 年份选择框的id
	 * @param {Object} month 月份选择框的id
	 * @param {Object} day 日子选择框的id
	 * @param {Object} startYear 起始年份
	 */

	loadDate:function(year,month,day,startYear){
				var myYear = document.getElementById(year);
				var myMonth = document.getElementById(month);
				var myDay = document.getElementById(day);
				var date = new Date();
				
				for(var i=startYear;i<=date.getFullYear();i++){
					myYear.innerHTML+="<option>"+i+"</option>"
				}
				
				for(var i=1;i<=12;i++){
					myMonth.innerHTML+="<option>"+i+"</option>"
				}
				
				for(var i=1;i<=31;i++){
					myDay.innerHTML+="<option>"+i+"</option>"
				}
	},
	/**
	 * 
	 * @param {Object} year 年份选择框的id
	 * @param {Object} month 月份选择框的id
	 * @param {Object} day 日子选择框的id
	 */
	changeDate:function(year,month,day){
				//年份选择框的值
				var myYear = document.getElementById(year).value;
				//月份选择框的值
				var myMonth = document.getElementById(month).value;
				//获取日子选择框对象
				var myDay = document.getElementById(day);
				//清空上次选的记录
				myDay.innerHTML="";
				//判断闰年的条件
				var is = (myYear%4==0&&myYear%100!=0)||(myYear%400==0);
				//日子的天数
				var num=0;
			
				if(is&&myMonth==2){	//计算闰年2月份的日子
					num=29
				}else if(!is&&myMonth==2){	//计算平年2月份的日子
					num=28
				}else if(myMonth==1||myMonth==3||myMonth==5||myMonth==7||myMonth==8||myMonth==10||myMonth==12){
					num = 31;
				}else{//小月的日子
					num=30;
				}
				//循环遍历加载日子天数到日子选择框中
				for(var i=1;i<=num;i++){
					myDay.innerHTML+="<option>"+i+"</option>"
				}
	}
	
	
}
