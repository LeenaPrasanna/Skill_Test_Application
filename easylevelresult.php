<?php
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
 	<title> EASY LEVEL RESULT</title>
  <link rel="stylesheet" type="text/css" href="resultstyle.css">
 </head>
  <body>
<?php
echo "<nav>";
echo  "<a href='http://localhost/test/home.html'><img src= 'https://thumbs.dreamstime.com/b/tree-people-hand-print-hearts-logo-symbol-icon-hands-love-vector-web-image-174073340.jpg' class='image' ></a>";
echo"<ul>";
echo "<li ><a href = 'http://localhost/test/home.html'class='home'> HOME</a> </li>";
echo "<li ><a href = 'http://localhost/test/answerspage.php'class='answer'>VIEW ANSWERS</a></li> ";
echo "<li ><a href = 'http://localhost/test/levelchoose.php'class='answer'>CHOOSE LEVEL</a></li> ";
echo "<li ><a href = 'http://localhost/test/rankingpage.php'class='ranking'>RANKING</a></li>";
echo "<li ><a href = 'https://www.google.com' class='logout' > LOGOUT</a></li>";
echo"</ul>";
echo "</nav>";
echo "<h1><strong>SKILL TEST APPLICATION</strong></h1>";
echo "<h2>  RESULT </h2>";
echo"<div>";
echo "<h3>LEVEL : EASY</h3>";
echo "<br>";
echo "<h4>". $_SESSION['username']." Your result : </h4>";
echo "<hr>";
echo "<br>";
echo "Score you got : ". $_SESSION['result'];
echo"<br>";
echo "Total number of Questions : 30";
echo "<br>";
echo "Number of  question attempted  : ".$_SESSION['no_of_attempted'];
echo"<br>";
echo "Number of  questions not attempted : ".$_SESSION['no_of_unattempted'];
echo"<br>";
echo "Number of correct answers : ". $_SESSION['no_of_correct'];
echo"<br>";
echo "Number of  wrong answers : ".$_SESSION['no_of_wrong'];
echo"<br>";
echo "</div>";
$con = new mysqli("localhost","root","","test");
if($con->connect_error){
  die("Failed to connect : ".$con->connect_error);
}

else{
  $mail= $_SESSION['mail'];
 $stm = $con->prepare("select id from registration where mail=?");
   $stm->bind_param("s",$mail);
 $stm->execute();
  $stmr=$stm->get_result();
   $data=$stmr->fetch_assoc();
    $stmi = $con->prepare("insert into easyresult(user_id) values(?) ");
   $stmi->bind_param("i",$data['id']);
 $stmi->execute();
 $stms=$con->prepare("select score from easyresult where user_id=".$data['id']);
$stms->execute();
$stmsr=$stms->get_result();
$value=$stmsr->fetch_assoc();
if($value['score']>$_SESSION['result']){
	exit();
}else{
 $stmu = $con->prepare("update easyresult set score = ? WHERE user_id=? ");
 $stmu->bind_param("ii", $_SESSION['result'],$data['id']);
 $stmu->execute();
}
 }
?>
</body>
</html>
