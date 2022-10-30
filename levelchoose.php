<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>CHOOSING LEVEL</title>
	<link rel="stylesheet" type="text/css" href="chooselevel.css">
</head>
<body>
 <nav>
 	<a href='http://localhost/test/home.html'><img src= 'https://thumbs.dreamstime.com/b/tree-people-hand-print-hearts-logo-symbol-icon-hands-love-vector-web-image-174073340.jpg' class='image' ></a>
 	<ul>
      <li ><a href = 'http://localhost/test/home.html'class='home'> HOME</a> </li>
       <li ><a href = 'http://localhost/test/mainpage.php'class='mainpage'> MAIN PAGE</a> </li>
      <li ><a href = 'http://localhost/test/rankingpage.php'class='ranking'>RANKING</a></li>
      <li ><a href = 'https://www.google.com' class='logout' > LOGOUT</a></li>
    </ul>
 </nav>
	<h1>SKILL TEST APPLICATION </h1>
	<h2> Choose level <?php echo $_SESSION['username']?></h2>
	<div class='images'>
     <img src='https://www.kayak-newzealand.com/wp-content/uploads/2016/07/barrel-run-easy-level-icon.png' class='img1'>
     <img src='https://central-training.co.uk/wp-content/uploads/2018/10/Risk-Medium-600.jpg' class='img2'>
     <img src='http://www.taufeeq.com/travel/musa2015/images/difficulty_meter.jpg' class='img3'>
 </div>
  <div class='buttons'>
    <a href='http://localhost/test/easyquestions.php' class='easy'> <button class='ease'>TAKE EASY LEVEL TEST  </button></a>
    <a href ='http://localhost/test/mediumquestions.php' class='medium'><button> TAKE MEDIUM LEVEL TEST</button></a>
    <a href='http://localhost/test/hardquestions.php'class='hard'> <button> TAKE DIFFICULT LEVEL TEST</button></a>
  </div>
</body>
</html>