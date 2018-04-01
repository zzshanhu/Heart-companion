// window.onload=function () {
//     console.log("12656556565");
//     $.ajax({
//         url: '../php/getpic.php',
//         type: 'GET',
//         dataType: 'JSON',
//         data: {username: 'Mike'},
//     })
//     .done(function(data) {
//         console.log(11111);
//         console.log(data);
//         if(data.r!=1){
//             $("#headimg").attr('src', data.r);
//         }else{
//              $("#headimg").attr('src','http://localhost/practice/Youban/upload/image/20180128/1517107154_632739_2017-07-26_18-14-19-000.jpg');
//         }
//     });
    
// }
$(function (argument) {
    alert("11111");
    console.log("12656556565");
    $.ajax({
        url: '../php/getpic.php',
        type: 'GET',
        dataType: 'JSON',
        data: {username: 'Mike'},
    })
    .done(function(data) {
        console.log(11111);
        console.log(data);
        if(data.r!=1){
            $("#headimg").attr('src', data.r);
        }else{
             $("#headimg").attr('src','http://localhost/practice/Youban/upload/image/20180128/1517107154_632739_2017-07-26_18-14-19-000.jpg');
        }
    });
});