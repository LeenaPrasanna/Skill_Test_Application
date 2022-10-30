<?php 
session_start();
?>

<!DOCTYPE html>
<html>
 <head>
 	<meta charset="utf-8">
 	<title> Login page </title>
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
 </head>
  <body>

  	<h1 class="ti">LOGIN HERE</h1>
  	<form action="login.php"  method="POST">
  		<label>email</label>
  		<input type="text" name="mail"required>
  		<br><br><br>  
  		<br>
  		<label>password</label>
  		<input type="text"name="password" required>
  		<br>
  		<br>
      <br>
     <div class="l">
    <a href="http://localhost/test/mainpage.php" class="reg"><button name="login">login</button></a>
  
      <button><a href="http://localhost/test/registeration.php" class="reg">Register</a></button>
      <button><a href="http://localhost/test/home.html" class="reg">Home</a></button>
      </div>
  	</form>
    <?php
    
    if(!empty($_POST["mail"])&&!empty($_POST["password"])){
    $mail=$_POST["mail"];
$password=$_POST["password"];
}
$con=new mysqli("localhost","root","","test");
if($con->connect_error){
  die("Failed to connect : ".$con->connect_error);
}

else{
  if(isset($_POST["login"])){
  $stm=$con->prepare("select * from registration where mail=?");
  $stm->bind_param("s",$mail);
  $stm->execute();
  $stmr=$stm->get_result();
  if($stmr->num_rows>0){
    $data=$stmr->fetch_assoc();
    if($data["password"]===$password){
      $_SESSION['mail']=$mail;
      $_SESSION['username']=$data['name'];
      echo "LOGIN SUCCESSFUL";
       header("location:mainpage.php");
    }
    else{
      echo"<h2>Invalid email id or password</h2>";

    }
  }else{
    echo"<h2>Invalid email id or password</h2>";

  }
 
}
 }

?>
  </body>
 </html>
