<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>RANKING</title>
  <link rel="stylesheet" type="text/css" href="rank.css">
</head>
<body>

<?php
$con=new mysqli("localhost","root","","test");
if($con->connect_error){
  die("Failed to connect : ".$con->connect_error);
}
else{
  echo "<nav>";
echo  "<a href='http://localhost/test/home.html'><img src= 'https://thumbs.dreamstime.com/b/tree-people-hand-print-hearts-logo-symbol-icon-hands-love-vector-web-image-174073340.jpg' class='image' ></a>";
echo"<ul>";
echo "<li ><a href = 'http://localhost/test/home.html'class='home'> HOME</a> </li>";
echo "<li ><a href = 'http://localhost/test/answerspage.php'class='answer'>VIEW ANSWERS</a></li>";
echo "<li ><a href = 'http://localhost/test/levelchoose.php'class='answer'>CHOOSE LEVEL</a></li> ";
echo "<li ><a href = 'https://www.google.com' class='logout' > LOGOUT</a></li>";
echo"</ul>";
echo "</nav>";
echo "<h1><strong>SKILL TEST APPLICATION</strong></h1>";
echo "<h2>  RANKING </h2>";
echo "<h3> LEVEL : MEDIUM</h3>";
	$i=0;
    $j=1;
    $_SESSION['rank'][0]=0;
    echo "<table align='center'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th> RANK </th>";
    echo "<th> USER MAIL </th>";
    echo "<th> USER NAME </th>";
    echo "<th> SCORE </th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
	$stm=$con->prepare("select * from mediumresult order by score desc");
	$stm->execute();
	$stmr=$stm->get_result();
	while($data = $stmr->fetch_assoc()){
      $stms=$con->prepare("select * from registration where id=?");
      $stms->bind_param("i",$data['user_id']);
      $stms->execute();
      $stmsr=$stms->get_result();
      $value=$stmsr->fetch_assoc();
      $_SESSION['rank'][$j]=$data['score'];
      $k=$j-1;
      	if($_SESSION['rank'][$j]!==$_SESSION['rank'][$k]){
           $i=$i+1;
      }
      $j=$j+1;
	echo "<tr>";
  echo "<td>";
	echo $i;
  echo "</td>";
  echo "<td>";
      echo $value['mail'];
      echo "</td>";
      echo "<td>";
      echo $value['name'];
      echo "</td>";
      echo "<td>";
      echo $data['score'];
      echo "</td>";
  echo "</tr>";

	 }
   echo "</tbody>";
   echo "</table>";
}
?>
</body>
</html>
