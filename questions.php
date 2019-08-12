<?php
include_once 'config.inc.php';
$sql = 'SELECT question no,question,option1,option2,option3,option4 FROM questions';
$retval = $con->query($sql);

if(!$retval)
{
	die('Could not get data...'.mysqli_error($con));
}
if($retval->num_rows > 0){
while($row=$retval->fetch_assoc())
{
	echo "Q:".$row['question']."<br>".
	     "A.".$row['option1']."<br>".
	     "B.".$row['option2']."<br>".
	     "C.".$row['option3']."<br>".
	     "D.".$row['option4']."<br>";

}
}

mysqli_close($con);

?>
<!doctype html>
<html>
<head>

	</head>
	<body>
	<fieldset>

		<button type="button">Previous</button>
		<button type="button">Next</button>
	</fieldset>	
    </body>
</html>