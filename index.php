<!doctype html>
<html>
<?php session_start();?>
<head>
	<title>Online Exam</title>
  <link rel='stylesheet'
  href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="main.css">
</head>

<?php
//include 'starttest.php';
$errors=0;
function validate(){
	global $errors;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlineexam";

$conn = new mysqli($servername, $username, $password, $dbname);

 if(isset($_POST['submit'])){
$email = $_POST['email'];

$check="SELECT * FROM students WHERE email='$email'";

$result=mysqli_query($conn,$check);
   
if(mysqli_num_rows($result)>=1)
{
  //return "email already exists";
  $errors=1;
   return "";
  
}

$name = $_POST['name'];
$password = $_POST['password'];
$repassword  = $_POST['repassword'];

if($password!=$repassword){
    $errors=2;
    return "";
	//return "re-entered password is not matching";
}
$branch = $_POST['branch'];
$btech = $_POST['cgpa'];
$year = $_POST['gyear'];

$sql = "INSERT INTO students(name, email,password,branch,gyear,cgpa) VALUES ('$name','$email','$password','$branch','$year','$btech')";

if ($conn->query($sql) === TRUE) {
  echo '<script>
    window.alert("Registered Successfully");
    </script>';
    return '';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


else if(isset($_POST['login'])){
 
 
$email = $_POST['email'];
$_SESSION['email']=$email;
$a=$_SESSION['email'];
$check = "SELECT name FROM students WHERE email= '$a'";

$result = mysqli_query($conn , $check);
$b = $result->fetch_assoc();
$_SESSION['name']=$b['name'];
 $check="SELECT * FROM students WHERE email='$email'";

$result=mysqli_query($conn,$check);
   
if(mysqli_num_rows($result)==0)
{
	$errors=3;
	return "";
  //return  "email doesn't exist";
}

$password = $_POST['password'];
$_SESSION['password']=$password;
$check="SELECT * FROM students WHERE email='$email' AND password='$password'";

$result=mysqli_query($conn,$check);
   
if(mysqli_num_rows($result)==1)
{
  //header("Location: /C:/xampp/htdocs/rakesh_22-2-19/starttest.php");
	//$sql="SELECT * FROM students WHERE email='$email' AND password='$password'";
   // $res100=$con->query($sql);
    $row2=$result->fetch_assoc();
    if($row2['attempts']==1)
    	return "<script> window.location.assign('testcompletedalready.php'); </script>";
    else
    {
    $attempts=1;
    $sql="UPDATE students SET attempts='$attempts' WHERE email='$email'";
    $res10=mysqli_query($conn,$sql);
     $sql="SELECT * FROM questions";
    $res=$conn->query($sql);
    $total=$res->num_rows;
    $_SESSION['total']=$total;
    $x=$_SESSION['name'];
     for($i=1;$i<=$total;$i++)
   { $sql="INSERT INTO useranswers(useremail,question) VALUES('$x','$i')";
    $res100=$conn->query($sql);
}
   
   $choice='null';
   for($cur=0;$cur<=$total;$cur++){
    $sql="UPDATE useranswers SET userans='$choice' WHERE question='$cur' AND useremail='$x'";
    $res10=$conn->query($sql);
  }
  echo '<script>
    window.alert("Login Successful");
    </script>';
   return "<script> window.location.assign('welcome.php'); </script>";
}
}
if(mysqli_num_rows($result)==0){
	$errors=4;
	return "";
	//return  "incorrect password";
}
}
}

?>

<body id="index">
	<div><?php echo validate(); ?></div>
	<div class="divlogin">
	<form method="post" class="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div ><input class="login_elements"type="text" name="email" placeholder="Email" 
		<?php  if($errors==3) {echo 'style="border:3px solid #cc0000;"';}?> required>

	<input  class="login_elements" type="password" name="password" placeholder="Password"  <?php  if($errors==4) {echo 'style="border:3px solid #cc0000;"';}?> required>
	<input id="loginbutton"type="submit" name="login" value="Login"class="button"></div>
    </form><div id="reenter" style="color: red, margin-right : 150px,font-size:35px"><?php if($errors==3) {echo "email doesn't exist ";}?></div>
    <div id="incorrectpass" style="color: red, margin-right : 150px,margin-left:2000px,font-size:35px"><?php if($errors==4) {echo "incorrect password ";}?></div>
    </div>
    
	<div class="container">
		<form method="post" class="signup_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div ><i class='fas fa-book-reader' style='font-size:30px;color:violet'></i><input class="form_elements" type="text" name="name" placeholder="Name" pattern="[A-Za-z]{1,32}" required><br></div>
	<div ><i class='fas fa-envelope' style='font-size:30px;color:indigo'></i><input id="email"class="form_elements" type="email" name="email" placeholder="email" <?php  if($errors==1) {echo 'style="border:3px solid #cc0000;"';}?> required><br><div id="emailalready" style="color: red, margin-right : 200px,font-size:35px"><?php if($errors==1) {echo "email already exists";}?></div></div>
	<div ><i class='fas fa-lock' style='font-size:30px;color:blue'></i><input class="form_elements" type="password" name="password" placeholder="Password" minlength="6"required><br></div>
	<div ><i class='fas fa-lock' style='font-size:30px;color:green'></i><input class="form_elements"type="password" name="repassword" minlength="6"placeholder="Reenter-Password" <?php  if($errors==2) {echo 'style="border:3px solid #cc0000;"';}?> required><br> <div id="reenter" style="color: red, margin-right : 150px,font-size:35px"><?php if($errors==2) {echo "Re-entered password doesn't match ";}?></div> </div>
	<div ><i class='fas fa-school' style='font-size:30px;color:yellow'></i><input class="form_elements" type="text" name="branch" placeholder="Branch" required><br></i></div>
	<div ><i class='fas fa-laptop-code' style='font-size:30px;color:orange'></i><input class="form_elements" type="number" step="any" name="cgpa" placeholder="CGPA" required><br></div>
	<div ><i class='fas fa-graduation-cap' style='font-size:30px;color:red'></i><input class="form_elements" type="number" name="gyear" placeholder="Graduation Year" id="gyear" required><br></div>
    <div ><input  type="submit" name="submit" value="Signup" class="button"><br></div>
	</form>
</div>
	</body>



</html>