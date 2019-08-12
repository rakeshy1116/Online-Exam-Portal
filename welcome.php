<?php
session_start();
$name=$_SESSION['name'];
$password=$_SESSION['password'];
$cookie_name = "$name";
$cookie_value = "$password";
setcookie($cookie_name, $cookie_value, time() + (600), "/"); // 86400 = 1 day

?><html>
<style>


li{
	margin:10px;
	position:relative;
	left:430px;
	font-size:21px;

}
p{

 text-align:center;
 font-size:50px;
 position:relative;
 left:335px;
 color: black;
}

.wrapper{
	text-aign:center;
}

.button {
	position: absolute;
	top:75%;
	left:60%;
	background-color: #e7e7e7;
	color:black;
	padding:12px 28px;
	text-align:center;
	font-size:16px;
	margin: 4px 2px;
	cursor:pointer;
	border-radius:8px;
}


#welcome{
   background-image: url("webp3.jpg");
	height: 450px; 
	width:980px;
	background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
h1{
	color:black;
	position:relative;
	left:435px;
}
</style>
<body id="welcome">
	<script type="text/javascript">
		function startquiz()
		{
			<?php $_SESSION['id']=1;?>
    window.alert("Exam started");
   
			window.location.assign("questionfinal.php");
			return;
		}
	</script>

<p style="color:green;">Welcome <?php echo $_SESSION["name"];?>

<div>
<h1>Instructions</h1>
<ul>
<li>This exam contains ten questions</li>
<li>You will be given 5min to answer the questions</li>
<li>You will be given four options out of which only one will be correct</li>
<li>For every correct option you choose you will be awarded with +4 marks</li>
<li>For every wrong option you choose you will be awarded -1 mark</li>
<li>Try to attempt all the questions</li>
<li>You can view your performance after the test</li>
<li><b>NOTE: ANY KIND OF MALPRACTICES WILL LEAD TO SERIOUS ACTIONS.</b></li>
</ul>
</div>
<br><br>
<br><br>
<div class="wrapper">
<input type="button" class="button" value="Let's Start" onclick="startquiz()">
</div> 
</body>
<script type="text/javascript">
	 localStorage.removeItem("currentTime");
    localStorage.removeItem("targetTime");
</script>
</html>


