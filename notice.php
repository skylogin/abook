<?
	session_start();
	$sid = $_SESSION["sid"];
	$sname = $_SESSION["sname"];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,user-scalable=yes,initial-scale=0.8">
		<title>Account Book</title>
		<link href="css/reset.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/docs.min.css" rel="stylesheet" media="screen">
		<link href="css/index.css" rel="stylesheet" media="screen">
		<link href="css/notice.css" rel="stylesheet" media="screen">
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
		<? if(!isset($sid)){ ?>
			<nav class="blog-nav">
			  <a class="blog-nav-item" href="./index.php">Account Book</a>
			</nav>
		<? } else{ ?>
			<nav class="blog-nav">
			  <a class="blog-nav-item" href="./mypage.php">마이페이지</a>
			  <a class="blog-nav-item" href="./view.php">조회하기</a>
			  <a class="blog-nav-item" href="./insert.php">입력하기</a>
			  <a class="blog-nav-item" href="./logout.php">로그아웃</a>
			</nav>
		<? }?>
		  </div>
		</div>

		<!-- 공지사항 모달 -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			  </div>
			  <div class="modal-body">
				<span id="noticeBody"></span>
				<span id="noticeDate"></span>
			  </div>
			  <div class="modal-footer">
				<p>이 글을 </span><span id="noticeView"></span>명이 읽었고 <span id="noticeLike"></span>명이 좋아합니다.</p>
				<button type="button" id='noticeLikeBtn' class="btn btn-primary">Like</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>


		<!-- 메인 시작 -->
		<div class="container">
			<div class="bs-callout bs-callout-warning">
				<h4><span class="glyphicon glyphicon-thumbs-up"></span> Notice</h4>
				Account Book의 새소식을 아래에서 만나보세요. <br><code>첫 페이지</code>로 돌아가시려면 오른쪽 상단의 Account Book을 클릭하세요.
			<? if($sid == "admin"){ ?>
				<form id="frm" class="form-horizontal" action="login_ok.php" method="post">
				  <div class="form-group">
					<div class="col-sm-3">
					  <input type="text" id="noticeSubject" class="form-control" rows="3" placeholder="제목"></textarea>
					</div>
					<div class="col-sm-4">
					  <textarea id="contentFormArea" class="form-control" rows="3" placeholder="내용"></textarea>
					</div>

					<button type="button" class="btn btn-primary" onclick="buttonClick(1);">글쓰기</button>
				  </div>
				</form>
			<? } ?>
			</div>


			<div class="panel panel-warning">
				<div class="panel-heading">
					<div style='display:inline-block; width:20%;'>날짜</div>
					<div style='display:inline-block; width:55%;'>제목</div>
					<div style='display:inline-block; width:10%;'>좋아요</div>
					<div style='display:inline-block; width:7%;'>조회</div>
				</div>
				<div id="comment"></div>
			</div>
		</div>


	
		




		<!-- 하단 시작 -->
		<div class="blog-footer">
		  <p>Account Book 2015</p>
		</div>


		<script src="js/jquery.min.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script src="js/index.js"></script>
		<script src="js/notice.js"></script>
		<script>
			getNoticeList();
			initArr();
		</script>
	</body>

</html>