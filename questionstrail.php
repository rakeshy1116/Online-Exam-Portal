<?php
include_once 'config.inc.php';
$sql = 'SELECT questionno,question,option1,option2,option3,option4 FROM questions';
$retval = $con->query($sql);

if(!$retval)
{
	die('Could not get data...'.mysqli_error($con));
}

echo "<fieldset>";
    $row=$retval->fetch_assoc();

	echo "Q".$row['questionno'].":".$row['question']."<br>";
	
	<input type='radio' name='q1' value='1'>"."A.".$row['option1']."<br>".
	"<input type='radio' name='q1' value='2'>"."B.".$row['option2']."<br>".
	"<input type='radio' name='q1' value='3'>"."C.".$row['option3']."<br>".
	"<input type='radio' name='q1' value='4'>"."D.".$row['option4']."<br><br>";
	echo "<button type='button'>".'Previous'."</button>".
		"<button type='button'>".'Submit'."</button>".
		"<button type='button'>"."Next"."</button><br>";	
echo "</fieldset>";	
 ?>