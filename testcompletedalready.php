<?php
require 'config.inc.php';
session_start();
?>
<!doctype html>
<html>
<style type="text/css">
	 #quit{background-image: url("webp3.jpg");
	height: 450px; 
	width:980px;
	background-position: center;
  background-repeat: no-repeat;
  background-size: cover;}

  #a{

  	text-align: center;
  	margin-left: 45%;
  	margin-top: 10%;
  	font-size: 30px;
  	color:green;
  }
  #b{
  	margin-left: 70%;
    font-size: 20px;
  }
  #c{
  	font-size: 20px;
  }
</style>
<body id="quit">
	<script>
		function Results() {
			window.location.assign("result.php");
		}
		function Logout() {
			window.location.assign("index.php");
		}
	</script>
	<h2 id="a">You have already completed your attempt</h2>
	<button id="b"name="result" value="Results" onclick="Results()">Results</button>
	<button id="c"name="logout" value="Logout" onclick="Logout()">Logout</button>
</body>
</html>