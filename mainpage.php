<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Main page</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<nav>
	<img src="https://thumbs.dreamstime.com/b/tree-people-hand-print-hearts-logo-symbol-icon-hands-love-vector-web-image-174073340.jpg" class="img">
	<ul>

	 <li class="home"><a href="http://localhost/test/menu.html"><strong>HOME</strong></a></li><br>
	<li class="ranking"><a href="http://localhost/test/rankingpage.php"><strong>RANKING</strong></a></li><br>
	<li class="logout"><a href="https://www.google.com"><strong>LOGOUT</strong></a></li><br>
    </ul>
</nav>
<h1 class="tit"><STRONG>SKILL TEST APPLICATION</STRONG></h1>

<div>
<img src="https://img.freepik.com/free-vector/train-your-brain-beautiful-card-with-human-brain-motivational-quote_257845-1581.jpg" class="mainimg">
<img src="https://mir-s3-cdn-cf.behance.net/projects/404/f1d10435859805.Y3JvcCw5NTgsNzQ5LDI0NiwxOTY.jpg" class="img2">
<h1 class="t"><a href="http://localhost/test/levelchoose.php" class="q"><button class="but">TAKE APTITUDE TEST</button></a></h2>
</div>

<h2 class="msg"><?php echo"welcome to skill test application ".$_SESSION['username'];?></h2>
</body>
</html>