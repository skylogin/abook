<?
	session_start();
	$sid = $_SESSION["sid"];
	$sname = $_SESSION["sname"];
	$sregdt = $_SESSION["sregdt"];
	if(!isset($sid)){
		echo "<script>document.location.href='./index.php';</script>"; 
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
		<link href="css/mypage.css" rel="stylesheet" media="screen">
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
			  <a class="blog-nav-item" href="./mypage.php">마이페이지</a>
			  <a class="blog-nav-item" href="./view.php">조회하기</a>
			  <a class="blog-nav-item" href="./insert.php">입력하기</a>
			  <a class="blog-nav-item" href="./logout.php">로그아웃</a>
			</nav>
		  </div>
		</div>


		<!-- 메인 시작 -->
		<div class="container">
			<div class="bs-callout bs-callout-info">
				<h4><span class="glyphicon glyphicon-user"></span> 마이페이지</h4>
				<p><?=$sname?>님의 <code>계정정보</code>와 <code>가계정보</code>를 한눈에 살펴보세요.</p>
			</div>

			<div class="col-md-4" id="accountInfo">
				<div class="panel panel-primary">
				  <div class="panel-heading">
				  	계정정보
				  	<span class="floatright glyphicon glyphicon-chevron-left" onclick="toggleAccountMenu(0);"></span>
				  </div>
				  <table class="table table-bordered">
					<colgroup>
						<col width="35%">
						<col width="*">
					</colgroup>
					<tr>
						<td>아이디</td>
						<td><?=$sid?></td>
					</tr>
					<tr>
						<td>비밀번호</td>
						<td><button class="btn btn-warning btn-xs" onclick="pwChange();">변경하기</button></td>
					</tr>
					<tr>
						<td>가계부 시작일</td>
				<? if(!isset($sregdt)){ ?>
						<td>오늘부터</td>
				<? } else{ ?>
						<td><?=$sregdt?></td>
				<? } ?>
					</tr>
				  </table>
				</div>
			</div>
			<div class="col-md-8" id="bookInfo">
				<div class="panel panel-success">
				  <div class="panel-heading">가계정보</div>
				  <div class="panel-body">
						<ul>
							<li>전체자산: 00000원</li>
							<li>최근1달간 입금횟수: xx번</li>
							<li>최근1달간 출금횟수: xx번 (위에꺼랑 묶어서 최근1달통계로 보여주던지.. 그래프쓰던지)</li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
				  </div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-warning">
				  <div class="panel-heading">한줄 메모</div>
				  <div class="panel-body">
				  	<ul>
						  <li class="list-group-item">
						  	<div class="display-inline">
						  		<span class="comment-item">어쩌고저쩌고오늘하루등등등</span>
						  	</div>
						  	<div class="display-inline floatright">
						  		<span class="glyphicon glyphicon-calendar textright" data-toggle="tooltip" data-placement="top" title="" data-original-title="2015-12-12">09:32</span>
						  	</div>
						  </li>
						  <li class="list-group-item">
						  	<div class="display-inline">
						  		<span class="comment-item">어쩌고저쩌고오늘하루등등등</span>
						  	</div>
						  	<div class="display-inline floatright">
						  		<span class="glyphicon glyphicon-calendar textright" data-toggle="tooltip" data-placement="top" title="" data-original-title="2015-12-12">09:32</span>
						  	</div>
						  </li>
						  <li class="list-group-item">
						  	<div class="display-inline">
						  		<span class="comment-item">어쩌고저쩌고오늘하루등등등</span>
						  	</div>
						  	<div class="display-inline floatright">
						  		<span class="glyphicon glyphicon-calendar textright" data-toggle="tooltip" data-placement="top" title="" data-original-title="2015-12-12">09:32</span>
						  	</div>
						  </li>
						  <li class="list-group-item">
						  	<div class="display-inline">
						  		<span class="comment-item">어쩌고저쩌고오늘하루등등등</span>
						  	</div>
						  	<div class="display-inline floatright">
						  		<span class="glyphicon glyphicon-calendar textright" data-toggle="tooltip" data-placement="top" title="" data-original-title="2015-12-12">09:32</span>
						  	</div>
						  </li>
						</ul>
				  </div>
				</div>
			</div>
		</div>

		
		<!-- 하단 시작 -->
		<div class="blog-footer">
		  <p>Account Book 2015</p>
		</div>


		<script src="js/jquery.min.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script src="js/common.js"></script>
		<script src="js/mypage.js"></script>
	</body>

</html>
<? } ?>