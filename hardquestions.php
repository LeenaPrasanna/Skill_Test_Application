<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> HARD LEVEL QUESTIONS</title>
	<link rel="stylesheet" type="text/css" href="questionstyle.css">
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
echo "<li><a href='http://localhost/test/levelchoose.php' class ='home'>CHOOSE LEVEL</a></li>";
echo "<li ><a href = 'https://www.google.com' class='logout' > LOGOUT</a></li>";
 echo "</nav>";
  echo "<h1><strong>SKILL TEST APPLICATION</strong></h1>";
echo "<h3> LEVEL : DIFFICULT</h3>";
	if(!isset($_GET['page'])){
		$page=1;
	}
	else{
		$page=$_GET['page'];
	}
	$rpp=1;
	$page_first_result=($page-1)*$rpp;
			$stm=$con->prepare("select * from hardquiz");
  $stm->execute();
  $stmr=$stm->get_result();
     $r=$stmr->num_rows;
		$stm=$con->prepare("select * from hardquiz limit ".$page_first_result.','.$rpp);
  $stm->execute();
  $stmr=$stm->get_result();
   while( $data=$stmr->fetch_assoc()){


          echo "<div class='ques'>". $data["qid"].". ".$data["question"]."</div><br><br>"; 
          echo'
          <form class="option" method="POST"> 
          <input type="radio" name="option" value="op1">'. $data["op1"]
          .'<br> <br><input type="radio" name="option" value="op2">'. $data["op2"].'
          <br><br>
          <input type="radio" name="option" value="op3">'. $data["op3"]
          .'<br><br>
          <input type="radio" name="option" value="op4">'. $data["op4"]
          .'<br><br>
          <button name ="submit"class="s"> submit</button>
           
          </form>';
$answer=$data["aid"];
$id=$data["qid"];
    if(isset($_POST['option'])){
      $your_option=$data[$_POST['option']];
      }
   }
   
   if($page<=$r){
   	if(isset($_POST['option'])){
	if($_POST['option']===$answer){
    $_SESSION['score'][$page]=1;
    $_SESSION['correct'][$page]=1;
    $_SESSION['wrong'][$page]=0;
	}
	else{
    $_SESSION['score'][$page]=0;
    $_SESSION['correct'][$page]=0;
    $_SESSION['wrong'][$page]=1;
    
	}
   $_SESSION['attempted'][$page]=1;
    $_SESSION['unattempted'][$page]=0;
    $_SESSION['answer'][$id]=$your_option;
}
else{
 $_SESSION['score'][$page]=0;
    $_SESSION['correct'][$page]=0;
    $_SESSION['wrong'][$page]=0;
     $_SESSION['attempted'][$page]=0;
    $_SESSION['unattempted'][$page]=1;
    $_SESSION['answer'][$id]="Not attempted";
}
  echo"<br>";
  $score[1]=0;
  $correct[1]=0;
 $wrong[1]=0;
 $attempt[1]=0;
 $unattempt[1]=0;
  for($i=1;$i<=$page;$i++){
    
    $score[1]=$score[1]+ $_SESSION['score'][$i];
    $correct[1]=$correct[1]+ $_SESSION['correct'][$i];
    $wrong[1]=$wrong[1]+ $_SESSION['wrong'][$i];
    $attempt[1]=$attempt[1]+$_SESSION['attempted'][$i];
    $unattempt[1]=$unattempt[1]+$_SESSION['unattempted'][$i];
   }  

$_SESSION['result']=$score[1];
$_SESSION['no_of_correct']=$correct[1];
$_SESSION['no_of_wrong']=$wrong[1];
$_SESSION['no_of_attempted']=$attempt[1];
$_SESSION['no_of_unattempted']=$unattempt[1];


   }

   if($page==$r){
    if(isset($_POST["submit"])){
    header("location:hardlevelresult.php");
  }
   }
   
   echo' <div class="b">';
   
   if($page>=2){
   	echo " <a href='hardquestions.php?page=".($page-1)."'><button class='but'>previous</button></a>";
   }
   echo '       ';
   if($page<$r){
   	echo " <a  href='hardquestions.php?page=".($page+1)."'><button class='but'>next</button></a>";
   }
   echo'</div>';
}

?>
</div>
</body>
</html>