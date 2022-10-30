<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
 <head>
 	<title>ANSWERS</title>
  <link rel="stylesheet" type="text/css" href="answerstyle.css">
 </head>
  <body>
<?php
echo "<nav>";
echo  "<a href='http://localhost/test/home.html'><img src= 'https://thumbs.dreamstime.com/b/tree-people-hand-print-hearts-logo-symbol-icon-hands-love-vector-web-image-174073340.jpg' class='image' ></a>";
echo"<ul>";
echo "<li ><a href = 'http://localhost/test/home.html'class='home'> HOME</a> </li>";
echo "<li ><a href = 'http://localhost/test/rankingpage.php'class='ranking'>RANKING</a></li>";
echo "<li ><a href = 'http://localhost/test/levelchoose.php'class='ranking'>CHOOSE LEVEL</a></li> ";
echo "<li ><a href = 'https://www.google.com' class='logout' > LOGOUT</a></li>";
echo"</ul>";
echo "</nav>";
echo "<h1><strong>SKILL TEST APPLICATION</strong></h1>";
echo "<h2>  SOLUTIONS </h2>";
echo "<h3> LEVEL : DIFFICULT </h3>";
$con=new mysqli("localhost","root","","test");
if($con->connect_error){
	die("Failed to connect : ".$con->connect_error);
}
else{
	$stm=$con->prepare("select * from hardquiz");
	$stm->execute();
	$stmr=$stm->get_result();
	while($data=$stmr->fetch_assoc()){
		echo "<div class ='question'>";
		echo $data["qid"];
		echo " . ";
		echo $data["question"];
		echo "</div>";
		$value=$data['aid'];
		echo "<br>";
		echo "<div class ='answer'>";
		echo "your answer ".$_SESSION['answer'][$data['qid']];
		echo "<br>";
		echo "correct answer ".$data[$value];
		echo "<br>";
		echo "explanation : ". $data["explanation"];
		echo "<br>";
		echo "<hr>";
		echo "</div>";
	}
}
?>
</body>
</html>
