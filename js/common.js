$(document).ready(function(){
	getNotice();
	changeNotice();
});

function changeNotice(){
	setInterval(function(){
			if($(".blog-notice-animate").css("top") == '-70px'){
				$(".blog-notice-animate").css("top", "5px");
			}
			
			$(".blog-notice-animate").animate({top:'-=25px'}, 1000);
	},3000);
}


function getNotice(){

	$.ajax({
		url:'./ajax/getNoticeData.php',
		data:({}),
		dataType:'json',
		success:function(data){		
			var text1 = "[" + data[0][1] + "] " + data[0][0];
			var text2 = "[" + data[0][1] + "] " + data[1][0];
			var text3 = "[" + data[0][1] + "] " + data[2][0];
			$('.blog-notice-contents:nth-child(1)').text(text1);
			$('.blog-notice-contents:nth-child(2)').text(text2);
			$('.blog-notice-contents:nth-child(3)').text(text3);
			$('.blog-notice-contents:nth-child(4)').text(text1);
		}, error:function(request,status,error){
			alert("°øÁö»çÇ×X:" + "code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
}
