$(document).ready(function(){
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