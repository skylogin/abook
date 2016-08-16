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