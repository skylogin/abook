$(document).ready(function(){
	getNotice();
	changeNotice();

	$("#inputPassword3").keypress(function(e){
		if(e.which==13){
			buttonClick(1);
		}
	});

});

function checkForm(){
	if($('#inputEmail3').val() == ''){
		alert('ID is null');
		return false;
	}
	if($('#inputPassword3').val() == ''){
		alert('PASSWORD is null.');
		return false;
	}
	
	return true;
	
		
}

function buttonClick(n){
	if(n==1){
		if(checkForm()==true){
			$('#command').val('login');
		} else{
			return;
		}
	}else if(n==2){
		$('#command').val('find');
		alert("not yet");
		return;
	}else if(n==3){
		$('#command').val('join');
	}

	$('#frm').submit();
}

function join(){
	if(checkForm() == true){
		if($('#inputName3').val() == ''){
			alert('NAME is null.');
			return false;
		} else{
			$('#frm').submit();
		}
	}
}


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
			alert("공지사항X:" + "code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});


}
