<html>
<style>

h1{
margin-left: 55%;
text-align: center;
color:black;
}

.wrapper{
	text-align:center;
}

.button {
	position: absolute;
	top:50%;
	left:47%;
	background-color: #e7e7e7;
	color:black;
	padding:12px 28px;
	text-align:center;
	font-size:16px;
	margin:4px 2px;
	cursor:pointer;
	border-radius:8px;
}

 #thankyou{background-image: url("webp3.jpg");
	height: 450px; 
	width:980px;
	background-position: center;
  background-repeat: no-repeat;
  background-size: cover;}

</style>


<body id="thankyou">
	<script type="text/javascript">
		function results()
		{
			window.location.assign("index.php");
			
		}
	</script>
<br><br>
<h1>Thank you for taking the Test.</h1>

<div class="wrapper">
<input type="button" class="button" value="Home" onclick="results()">
</div>
</body>
</html>