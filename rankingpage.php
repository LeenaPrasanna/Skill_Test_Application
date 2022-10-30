<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ranking page</title>
	<link rel="stylesheet" type="text/css" href="rankingpagestyle.css">
</head>
<body>
 <nav>
 	<a href='http://localhost/test/home.html'><img src= 'https://thumbs.dreamstime.com/b/tree-people-hand-print-hearts-logo-symbol-icon-hands-love-vector-web-image-174073340.jpg' class='image' ></a>
 	<ul>
      <li ><a href = 'http://localhost/test/home.html'class='home'> HOME</a> </li>
      <li ><a href = 'http://localhost/test/answerspage.php'class='answers'>VIEW ANSWERS</a></li>
      <li ><a href = 'https://www.google.com' class='logout' > LOGOUT</a></li>
    </ul>
 </nav>
 <h1><strong>SKILL TEST APPLICATION</strong></h1>
    <h2>  RANKING </h2>
    <div class='images'>
     <img src='https://www.kayak-newzealand.com/wp-content/uploads/2016/07/barrel-run-easy-level-icon.png' class='img1'>
     <img src='https://central-training.co.uk/wp-content/uploads/2018/10/Risk-Medium-600.jpg' class='img2'>
     <img src='http://www.taufeeq.com/travel/musa2015/images/difficulty_meter.jpg' class='img3'>
 </div>
     <div class='buttons'>
    <a href='http://localhost/test/easyranking.php' class='easy'> <button class='ease'> EASY LEVEL RANKING</button></a>
    <a href ='http://localhost/test/mediumranking.php' class='medium'><button>MEDIUM LEVEL RANKING</button></a>
    <a href='http://localhost/test/hardranking.php'class='hard'> <button> DIFFICULT LEVEL RANKING</button></a>
  </div>
</body>
</html>