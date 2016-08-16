<?
	session_start();
	$flag = $_GET['flag'];
	$sid = $_SESSION["sid"];
	if(isset($sid)){
		echo "<script>document.location.href='./mypage.php';</script>"; 
	} else{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,user-scalable=yes,initial-scale=0.8">
		<title>Account Book</title>
		<link href="css/reset.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/docs.min.css" rel="stylesheet" media="screen">
		<link href="css/common.css" rel="stylesheet" media="screen">
		<link href="css/index.css" rel="stylesheet" media="screen">
	</head>
	<body>

		<!-- 상단 시작 -->
		<div class="blog-masthead">
		  <div class="container">
			<nav class="blog-notice">
			  <a class="blog-notice-icon" href="./notice.php"><span class="glyphicon glyphicon-bullhorn"></span> Noitce</a>
			  <div class='blog-notice-animate'>
				  <a class="blog-notice-contents"></a>
				  <a class="blog-notice-contents"></a>
				  <a class="blog-notice-contents"></a>
				  <a class="blog-notice-contents"></a>
			  </div>
			</nav>

			<nav class="blog-nav">
				<a class="blog-nav-item" href="#" onclick="buttonClick(2);"">비밀번호 찾기</a>
				<a class="blog-nav-item" href="#" onclick="buttonClick(3);"">회원가입</a>
			</nav>
		  </div>
		</div>


		<!-- 메인 시작 -->
		<div class="container">
			<div id="logo">
				<img src="./img/ab_logo.png" />
				<h4>Account Book</h4>
			</div>

			<div class="bs-callout bs-callout-info">
				<h4><span class="glyphicon glyphicon-check"></span> 첫단계</h4>
				<p><code>아이디</code>와 <code>비밀번호</code>를 입력하고 로그인해주세요.</p>

				<form id="frm" class="form-horizontal" action="login_ok.php" method="post">
				  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">아이디</label>
						<div class="col-sm-7">
						  <input type="email" class="form-control" id="inputEmail3" name="userid" placeholder="이메일 주소">
						</div>
				  </div>
				  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">비밀번호</label>
						<div class="col-sm-7">
						  <input type="password" class="form-control" id="inputPassword3" name="userpwd" placeholder="영어/숫자/특수기호 20자리 이하">
						</div>
				  </div>
				  <div class="form-group">
						<div class="col-sm-offset-5 col-sm-2">
						  <input type="hidden" id="command" name="command">
						  <button type="button" class="btn btn-primary btn-block" onclick="buttonClick(1);">접속하기</button>
						</div>
				  </div>
				</form>
			</div>

			<?	if($flag == 'no'){ ?>
				<div id="warn" class="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				   <strong>로그인 실패</strong> 다시 시도해주세요.
				 </div>
			<? } else if($flag == 'blank'){ ?>
				<div id="warn" class="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				   <strong>로그인 실패</strong> 아이디와 비밀번호를 입력해주세요.
				 </div>
			<? } ?>
			
		</div>

		
		<!-- 하단 시작 -->
		<div class="blog-footer">
		  <p>Account Book 2015</p>
		</div>


		<script src="js/jquery.min.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script src="js/common.js"></script>
		<script src="js/index.js"></script>
	</body>

</html>
<?}?>