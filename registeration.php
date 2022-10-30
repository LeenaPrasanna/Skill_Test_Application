<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="registerationstyle.css">	
</head>
<body >
	<h1 class="ti">Register here</h1>
<form  action="connect.php" method="POST">
   <label>Name : </label>
    <input type="text" placeholder="Name" name="name" required>
     <br><br>
	<label>Password : </label>
	<input type="Password" placeholder="Password" name="password"required >
	<br><br>
	<label class="gender">Gender : </label>
	<input type="radio" name="gender" value ="m"required>Male
	<input type="radio" name="gender" value="f"required>female
	<br><br>
	<label>Email : </label>
	<input type="mail" placeholder="gmail" name="mail"required>
	<br><br>
	<div class="l">
	<input type="Submit" placeholder="submit" name="submit"class ="submit">
	<a href="http://localhost/test/login.php"class="login">login</a>
	<a href="http://localhost/test/home.html"class="login">Home</a>
	<div>	
</form>
<?php 
if(!empty($_POST['name'])&&!empty($_POST['password'])&&!empty($_POST['gender'])&&!empty($_POST['mail'])){
$name=$_POST['name'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$mail=$_POST['mail'];
 if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
	echo "<br>Enter valid email";
	exit();
 }
}
$conn= new mysqli("localhost","root","","test");
if($conn->connect_error){
	die("connection failed : ".$conn->connect_error);
}else{
    $query="select * from registration where mail=?";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("s",$mail);
    $stmt->execute();
     $result=$stmt->get_result();
     $count=$result->num_rows;
     if($count>0){
     	echo"<br>Email already exist";
     	exit();
     }
	$stm=$conn->prepare("insert into registration(name,password,gender,mail)
		values(?,?,?,?)");
	$stm->bind_param("ssss", $name, $password, $gender, $mail);
    $stm->execute();
   $stm->close();
   $conn->close();
   if(isset($_POST["submit"])){
   echo"<h2 class='ad'> Registeration successful</h2>";
}
}
?>

 
</body>
</html>