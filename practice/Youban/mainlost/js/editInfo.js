window.onload=function(){
	mydate.loadDate("year","month","day",1960);

	$('.btnEdit .edit').click(function(event) {
		$('.basicView').css('display', 'none');
		$('.editView').css('display', 'block');
	});
	// $('.btnServ .save').click(function(event) {
	// 	$('.basicView').css('display', 'block');
	// 	$('.editView').css('display', 'none');
	// });

}