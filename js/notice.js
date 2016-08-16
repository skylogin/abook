
function getNoticeList(){

	$.ajax({
		url:'./ajax/getNoticeContent.php',
		data:({}),
		dataType:'json',
		success:function(data){
			for(var i=0; i<data.length; i++){
				var newComment = "<div style='width:20%'>[";
				newComment += data[i][2];
				newComment += "]</div><div style='width:55%'>";
				newComment += data[i][0];
				newComment += "</div><div style='width:5%'>";
				newComment += data[i][4];
				newComment += "</div><div style='width:5%'>";
				newComment += data[i][3];
				newComment += "</div>";
				var tempNum = data.length - i;
				
				$("<div style='cursor:pointer' data-toggle='modal' data-target='#exampleModal' onclick='getDetailPage("+tempNum+")' class='noticeRow"+tempNum+"'>").appendTo('#comment').hover(
					function(){
						$(this).addClass('row_on');
					}, function(){
						$(this).removeClass('row_on');
					});
				$(newComment).appendTo('.noticeRow'+tempNum).css('display','inline-block').css('margin','5px');

				//div마다 본문 보는 링크걸기
				
				
			}

			//$('#comment').text(data[0]);
		}, error:function(request,status,error){
			alert("공지사항X:" + "code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});


}


function getDetailPage(n){
	$.ajax({
		url:'./ajax/getNoticeContent.php',
		data:({n:n}),
		dataType:'json',
		success:function(data){
			$('.modal-title').text(data[0][0]).css('font-weight','bold');
			$('#noticeBody').text(data[0][1]);
			$('#noticeDate').text(data[0][2]).css({'float':'right','font-weight':'bold'});
			$('#noticeView').text(data[0][3]).css({'color':'#00f','font-weight':'bold'});
			$('#noticeLike').text(data[0][4]).css({'color':'#f00','font-weight':'bold'});
			$('#noticeLikeBtn').attr('onClick','addLike('+n+')');

			addView(n);

				
				
			if(checkArr[1][n] != 1){
				$('#noticeLikeBtn').removeAttr('disabled');
			} else{
				$('#noticeLikeBtn').attr('disabled','disabled');
			}


			$('#exampleModal').on('show.bs.modal');


		}, error:function(request,status,error){
			alert("공지사항X:" + "code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
}


var checkArr = new Array(100);

function initArr(){
	for(var i=0; i<100; i++){
		checkArr[i] = new Array(100);
	}

	for(var i=0; i<100; i++){
		for(var j=0; j<100; j++){
			checkArr[i][j] = 0;
		}
	}
}

function addView(n){
	if(checkArr[0][n] != 1){
		$.ajax({
			url:'./ajax/addNoticeView.php',
			data:({n:n}),
			dataType:'text',
			success:function(data){
				var viewNum = $('#noticeView').text();
				viewNum = parseInt(viewNum) + 1;
				$('#noticeView').text(viewNum);
				$('.noticeRow'+n+' div:last-child').text(viewNum);
				checkArr[0][n] = 1;
			}, error:function(request,status,error){
				alert("공지사항X:" + "code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		});
	}
}



function addLike(n){
	$.ajax({
		url:'./ajax/addNoticeLike.php',
		data:({n:n}),
		dataType:'text',
		success:function(data){		
				var likeNum = $('#noticeLike').text();
				likeNum = parseInt(likeNum) + 1;
				$('#noticeLike').text(likeNum);
				$('.noticeRow'+n+' div:nth-last-child(2)').text(likeNum);
				checkArr[1][n] = 1;
				$('#noticeLikeBtn').attr('disabled','disabled');
				
		}, error:function(request,status,error){
			alert("공지사항X:" + "code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		}
	});
}
