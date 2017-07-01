<?php
require("lib/db.php");
require("config/config.php");
$conn = db_init($config['host'],$config['duser'],$config['dpw'],$config['dname']);
$result = mysqli_query($conn,'SELECT * FROM topic');
?>
﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" type="text/css" href="http://localhost/style.css?var=7">
	<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="target">
	<div class="container">
		<header class ="jumbotron text-center">
			<img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩" class="img-circle" id="logo">
			<h1><a href="http://localhost/index.php">JavaScript</a></h1>
		</header>
		<div class="row">
			<nav class="col-md-3">
				<ol class="nav nav-pills nav-stacked">
					<?php
					while($row = mysqli_fetch_assoc($result)) {
						echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</li></a>'."\n";
					}
					?>
				</ol>
			</nav>
			<div class="col-md-9">
				<article>
					<form action="process.php" method="post">
						<div class="form-group">
    					<label for="form-title">제목</label>
    					<input type="text" class="form-control" id="form-title" placeholder="제목을 적어주세요" name="title">
  					</div>
						<div class="form-group">
    					<label for="form-author">작성자</label>
    					<input type="text" class="form-control" id="form-author" placeholder="작성자를 적어주세요" name="author">
  					</div>
						<div class="form-group">
    					<label for="form-description">본문</label>
							<textarea class="form-control" rows="10" id="form-description" placeholder="본문을 적어주세요" name="description"></textarea>
  					</div>
						<button type="submit" class="btn btn-default">제출</button>
					</form>
				</article>
				<hr>
				<div id = "control">
					<div class="btn-group" role="group" aria-label="...">
						<input type="button" value="white" onclick="document.getElementById('target').className = 'white'" class="btn btn-default btn-lg"/>
						<input type="button" value="black" onclick="document.getElementById('target').className = 'black'" class="btn btn-default btn-lg"/>
					</div>
					<a href="http://localhost/write.php" class="btn btn-success btn-lg">쓰기</a>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
