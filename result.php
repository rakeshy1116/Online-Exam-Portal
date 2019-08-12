<?php
session_start();
require 'config.inc.php';
$_SESSION['rightcount']=0;
$_SESSION['wrongcount']=0;
$_SESSION['unattempted']=0;
?>
<!doctype html>
<html>
<head></head>
<style type="text/css">
#resultspage{

	background-image: url("webp3.jpg");
	height: 450px; 
	width:980px;
	background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

#containerdisplay{
 display: grid;
 grid-template-columns: repeat(12,minmax(150px,1fr));



}
#answersdisplay{
	grid-column: 4/7;
	font-size: 20px;

}
#resultsdisplay{
	grid-column: 7/9;

}

</style>
<body id="resultspage">
	<div id="containerdisplay">
		<div id="answersdisplay">
  <h2>Answers:</h2>
	<?php
    $sql = 'SELECT * FROM questions';
    $ansquestion = $con->query($sql);
    $x=$_SESSION['name'];
    $sql = "SELECT * FROM useranswers WHERE useremail='$x'";
    $useranswers = $con->query($sql);
    if(!$ansquestion)
{
	die('Could not get data...'.mysqli_error($con));
}
if($ansquestion->num_rows > 0){
	$x=1;
while($row=$ansquestion->fetch_assoc())
{
	$correctans=$row['correctans'];
	$row1=$useranswers->fetch_assoc();
	$userans=$row1['userans'];
	if(!strcmp($userans,"null"))
	{
		$_SESSION['unattempted']++;
    	$_SESSION['wrongcount']--;

    	

	}
	if(!strcmp($correctans,$userans)) {
		$_SESSION['rightcount']++;
	if(!strcmp($correctans,$row['option1'])){
	echo "Q".$row['questionno'].". ".$row['question']."<br>".
	     "<span style='color:#00ff00'>"."A.".$row['option1']."</span>".'<br>'.
	     "B.".$row['option2']."<br>".
	     "C.".$row['option3']."<br>".
	     "D.".$row['option4']."<br><br>";
	 }
	 else if(!strcmp($correctans,$row['option2'])){
	echo "Q".$row['questionno'].". ".$row['question']."<br>".
	     "A.".$row['option1']."<br>".
	     "<span style='color:#00ff00'>"."B.".$row['option2']."</span>".'<br>'.
	     "C.".$row['option3']."<br>".
	     "D.".$row['option4']."<br><br>";
	 }
	 else if(!strcmp($correctans,$row['option3'])){
	echo "Q".$row['questionno'].". ".$row['question']."<br>".
	     "A.".$row['option1']."<br>".
	     "B.".$row['option2']."<br>".
	     "<span style='color:#00ff00'>"."C.".$row['option3']."</span>".'<br>'.
	     "D.".$row['option4']."<br><br>";
	 }
	 else{
	echo "Q".$row['questionno'].". ".$row['question']."<br>".
	     "A.".$row['option1']."<br>".
	     "B.".$row['option2']."<br>".
	     "C.".$row['option3']."<br>".
	     "<span style='color:#00ff00'>"."D.".$row['option4']."</span>".'<br><br>';
	 }
	}

	else
	{
		$_SESSION['wrongcount']++;
		if(!strcmp($correctans,$row['option1'])){
	echo "Q".$row['questionno'].". ".$row['question']."<br>".
	     "<span style='color:#00ff00'>"."A.".$row['option1']."</span>".'<br>';
	     if(!strcmp($userans,$row['option2'])) echo "<span style='color:#ff0000'>"."B.".$row['option2']."</span>".'<br>';
	     else echo "B.".$row['option2']."<br>";
	     if(!strcmp($userans,$row['option3'])) echo "<span style='color:#ff0000'>"."C.".$row['option3']."</span>".'<br>';
	     else echo "C.".$row['option3']."<br>";
	     if(!strcmp($userans,$row['option4'])) echo "<span style='color:#ff0000'>"."D.".$row['option4']."</span>".'<br><br>';
	     else echo "D.".$row['option4']."<br><br>";
	 }

	if(!strcmp($correctans,$row['option2'])){
	echo "Q".$row['questionno'].". ".$row['question']."<br>";
	     if(!strcmp($userans,$row['option1'])) echo "<span style='color:#ff0000'>"."A.".$row['option1']."</span>".'<br>';
	      else echo "A.".$row['option1']."<br>";
	     echo "<span style='color:#00ff00'>"."B.".$row['option2']."</span>".'<br>';
	    if(!strcmp($userans,$row['option3'])) echo "<span style='color:#ff0000'>"."C.".$row['option3']."</span>".'<br>';
	     else echo "C.".$row['option3']."<br>";
	     if(!strcmp($userans,$row['option4'])) echo "<span style='color:#ff0000'>"."D.".$row['option4']."</span>".'<br><br>';
	     else echo "D.".$row['option4']."<br><br>";
	 }

	if(!strcmp($correctans,$row['option3'])){
	echo "Q".$row['questionno'].". ".$row['question']."<br>";
	     
	     if(!strcmp($userans,$row['option1'])) echo "<span style='color:#ff0000'>"."A.".$row['option1']."</span>".'<br>';
	     else echo "A.".$row['option1']."<br>";
	     if(!strcmp($userans,$row['option2'])) echo "<span style='color:#ff0000'>"."B.".$row['option2']."</span>".'<br>';
	     else echo "B.".$row['option2']."<br>";
	     echo "<span style='color:#00ff00'>"."C.".$row['option3']."</span>".'<br>';
	     if(!strcmp($userans,$row['option4'])) echo "<span style='color:#ff0000'>"."D.".$row['option4']."</span>".'<br><br>';
	     else echo "D.".$row['option4']."<br><br>";
	 }

	if(!strcmp($correctans,$row['option4'])){
	echo "Q".$row['questionno'].". ".$row['question']."<br>";
	     
	     if(!strcmp($userans,$row['option1'])) echo "<span style='color:#ff0000'>"."A.".$row['option1']."</span>".'<br>';
	     else echo "B.".$row['option1']."<br>";
	     if(!strcmp($userans,$row['option2'])) echo "<span style='color:#ff0000'>"."B.".$row['option2']."</span>".'<br>';
	     else echo "C.".$row['option2']."<br>";
	     if(!strcmp($userans,$row['option3'])) echo "<span style='color:#ff0000'>"."C.".$row['option3']."</span>".'<br>';
	     else echo "D.".$row['option3']."<br>";
	     echo "<span style='color:#00ff00'>"."D.".$row['option4']."</span>".'<br><br>';
	 }

   

         
	}
	

}
}
	?>
</div>
	<div id="resultsdisplay">
	<h1 style="color: #00ff00">Results</h1>
	<h3 style="color: green">No. of Correct Answers: <?php echo $_SESSION['rightcount'];?></h3>
	<h3 style="color: red">No. of Wrong Answers: <?php echo $_SESSION['wrongcount'];?></h3>
	<h3 style="color: blue">Final Score:   <?php echo $_SESSION['rightcount']-$_SESSION['wrongcount'];?></h3>
	<?php
	$score=$_SESSION['rightcount']-$_SESSION['wrongcount'];
	$x=$_SESSION['name'];
	$sql="INSERT INTO students(Marks) VALUES('$score') WHERE name='$x'";
    $res10=$con->query($sql);
    ?>
	<h3 style="color: orange">Unattempted: <?php echo $_SESSION['unattempted'];?></h3>
	<input type='button' onclick="logout()" value='Logout'>
</div>
	
</div>
<script type="text/javascript">
		function logout()
		{

    window.alert("Thankyou :)");
			window.location.assign("thankyou.php");
			
		}
	</script>
</body>
</html>