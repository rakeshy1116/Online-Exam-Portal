<?php
session_start();
require 'config.inc.php';

if(!isset($_SESSION['id']))
{
    $_SESSION['id']=1;
   $_SESSION['count']=0;
}
?>

<!doctype html>
<html>
<head>
     <link rel="stylesheet" href="main.css">
</head>
<style type="text/css">
     #containerques{
 display: grid;
 grid-template-columns: repeat(12,minmax(150px,1fr));
grid-template-rows: 30px auto;

}


#displayquestions{
 grid-column: 4/8;
}
#timer{
    grid-column: 10/12;
   grid-row: 1/2;
   font-size: 20px;
   color: green;
}
</style>
<body id="quesfinal">
    <div id="containerques">
<form id="displayquestions"action="#" method="post">
        <?php
       
    $sql="SELECT * FROM questions";
    $res=$con->query($sql);
    $total=$res->num_rows;
    $_SESSION['total']=$total;
    $x=$_SESSION['name'];
   
    if(isset($_POST['1']))
    {
        if(!empty($_POST['choice']))
        {
        $choice=$_POST['choice'];
        }
    else
        {
        $choice="null";
        }

    $x=$_SESSION['name'];
    $cur=$_SESSION['id'];
    $sql="INSERT INTO response(st_id,q_id) VALUES ('$x','$cur')";
    $res=$con->query($sql);
    $sql="UPDATE response SET st_ans='$choice' WHERE st_id='$x' AND q_id='$cur'";
    $res=$con->query($sql);
    $sql="UPDATE questions SET userans='$choice' WHERE questionno='$cur'";
    $res10=$con->query($sql);
    $sql="UPDATE useranswers SET userans='$choice' WHERE question='$cur' AND useremail='$x'";
    $res20=$con->query($sql);

    if($cur==$_SESSION['total'])
    {
        echo "<script>
        if(window.confirm('Submit the Test')){
                window.location.assign('result.php');}
        
        </script>";
        
    }
    }
    if(isset($_POST['2']))
    {
        if(!empty($_POST['choice']))
            {
            $choice=$_POST['choice'];
            }
        else
            {
            $choice="null";
            }
    $x=$_SESSION['name'];
    $cur=$_SESSION['id'];
    $sql="INSERT INTO response(st_id,q_id) VALUES ('$x','$cur')";
    $res=$con->query($sql);
    $sql="UPDATE response SET st_ans='$choice' WHERE st_id='$x' AND q_id='$cur'";
    $res=$con->query($sql);
    $sql="UPDATE questions SET userans='$choice' WHERE questionno='$cur'";
    $res10=$con->query($sql);
     $sql="UPDATE useranswers SET userans='$choice' WHERE question='$cur'";
    $res20=$con->query($sql);
    //header('Location:/webp/previous.php');
    }
    
    
    if(isset($_POST['1']))
    {
    if($_SESSION['id'] < $_SESSION['total'])
    {
        $_SESSION['id']=$_SESSION['id']+1;   
    }
    }
    if(isset($_POST['2']))
    {
        if($_SESSION['id']>1)
        {
            $_SESSION['id']=$_SESSION['id']-1;
        }
    }
    $current=$_SESSION['id'];
        $sql="SELECT * FROM questions WHERE questionno='$current'";
        $res=$con->query($sql);
        $row=$res->fetch_assoc();
        $x=$_SESSION['name'];
        $sql1="SELECT * FROM response WHERE st_id='$x' AND q_id='$current'";
        $res1=$con->query($sql1);
        if($res1->num_rows!=0)
        {
            $row1=$res1->fetch_assoc();
            $st_ans=$row1['st_ans'];
            $sql2="SELECT * FROM questions WHERE questionno='$current'";
            $res2=$con->query($sql2);
            $row2=$res2->fetch_assoc();
            $op1=$row2['option1'];
            $op2=$row2['option2'];
            $op3=$row2['option3'];
            $op4=$row2['option4'];
            if(!strcmp($st_ans,$op1))
            {
             ?>   <span class="option"><?php echo $row2['questionno']?></span><span class="option">)</span>
    <span class="que"><?php echo $row2['question']?></span><br>
                <label class="cont"><input class="option" type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>" checked><span class="option"><?php echo $row2['option1'];?></span></label><br>
                <input  class="option" type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><span class="option"><?php echo $row2['option2'];?></span><br>
                <input class="option"type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><span class="option"><?php echo $row2['option3'];?></span><br>
                <input class="option" type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><span class="option"><?php echo $row2['option4'];?></span><br>
                <p id='1'></p>
                <input type='submit' value='Prev' name='2' style="font-size: 20px;">
                <input type='submit' name='1' value='Next' style="font-size: 20px;">
            <?php
            }
            else if(!strcmp($st_ans,$op2))
            {
                ?>   <span class="option"><?php echo $row2['questionno']?></span><span class="option">)</span>
    <span class="que"><?php echo $row2['question']?></span><br>
                <input  class="option"type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><span class="option"><?php echo $row2['option1'];?></span><br>
                <label class="cont"><input  class="option" type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>" checked><span class="option"><?php echo $row2['option2'];?></span></label><br>
                <input class = "option"type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><span class="option"><?php echo $row2['option3'];?></span><br>
                <input class="option"type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><span class="option"><?php echo $row2['option4'];?></span><br>
                <p id='1'></p>
                <input type='submit' value='Prev' name='2'style="font-size: 20px;">
                <input type='submit' name='1' value='Next' style="font-size: 20px;">
            <?php
            }
            else if(!strcmp($st_ans,$op3))
            {
                ?>   <span class="option"><?php echo $row2['questionno']?></span><span class="option">)</span>
    <span class="que"><?php echo $row2['question']?></span><br>
                <input class="option"type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><span class="option"><?php echo $row2['option1'];?></span><br>
                <input class="option"type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><span class="option"><?php echo $row2['option2'];?></span><br>
                <label class="cont"><input class="option"type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>" checked><span class="option"><?php echo $row2['option3'];?></span></label><br>
                <input class="option"type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><span class="option"><?php echo $row2['option4'];?></span><br>
                <p id='1'></p>
                <input type='submit' value='Prev' name='2' style="font-size: 20px;">
                <input type='submit' name='1' value='Next' style="font-size: 20px;">
            <?php
            }
            else if(!strcmp($st_ans,$op4))
            {
                ?>   <span class="option"><?php echo $row2['questionno']?></span><span class="option">)</span>
    <span class="que"><?php echo $row2['question']?></span><br>
               <label class="cont"> <input class="option"type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><span class="option"><?php echo $row2['option1'];?></span></label><br>
                <input class="option"type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><span class="option"><?php echo $row2['option2'];?></span><br>
                <input class="option"type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><span class="option"><?php echo $row2['option3'];?></span><br>
                <label class="cont"><input class="option" type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>" checked><span class="option"><?php echo $row2['option4'];?></span></label><br>
                <p id='1'></p>
                <input type='submit' value='Prev' name='2' style="font-size: 20px;">
                <input type='submit' name='1' value='Next' style="font-size: 20px;">
            <?php
            }
            else
            {
                ?>   <span class="option"><?php echo $row2['questionno']?></span><span class="option">)</span>
    <span class="que"><?php echo $row2['question']?></span><br>
                <input class="option"type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><span class="option"><?php echo $row2['option1'];?></span><br>
                <input  class="option"type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><span class="option"><?php echo $row2['option2'];?></span><br>
                <input  class="option"type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><span class="option"><?php echo $row2['option3'];?></span><br>
                <input class="option"type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><span class="option"><?php echo $row2['option4'];?></span><br>
                <p id='1'></p>
                <input type='submit' value='Prev' name='2' style="font-size: 20px;">
                <input type='submit' name='1' value='Next' style="font-size: 20px;">
            <?php
            }
            
        }
        else
        {
        ?>
        <span class="option"><?php echo $row['questionno']?></span><span class="option">)</span>
    <span class="que"><?php echo $row['question']?></span><br>
                <input class="option"type='radio' name='choice' id='op1' value="<?php echo $row['option1'];?>"><span class="option"><?php echo $row['option1'];?></span><br>
                <input class="option"type='radio' name='choice' id='op2' value="<?php echo $row['option2'];?>"><span class="option"><?php echo $row['option2'];?></span><br>
                <input class="option"type='radio' name='choice' id='op3' value="<?php echo $row['option3'];?>"><span class="option"><?php echo $row['option3'];?></span><br>
                <input class="option"type='radio' name='choice' id='op4' value="<?php echo $row['option4'];?>"><span class="option"><span class="option"><?php echo $row['option4'];?></span><br>
                <p id='1'></p>
                <input type='submit' value='prev' name='2'>
                <input type='submit' name='1' value='next'> 
        <?php
        } ?>
               
                
</form>

<div id="timer"></div>
</div>
</body>
<script type="text/javascript">
   
 var interval;
let minutes = 1;
let currentTime = localStorage.getItem('currentTime');
let targetTime = localStorage.getItem('targetTime');
console.log(currentTime);
console.log(targetTime);
if (targetTime == null && currentTime == null) {
  currentTime = new Date();
  targetTime = new Date(currentTime.getTime() + (minutes * 60000));
  localStorage.setItem('currentTime', currentTime);
  localStorage.setItem('targetTime', targetTime);
  console.log(currentTime);
console.log(targetTime);
}
else{
  currentTime = new Date(currentTime);
  targetTime = new Date(targetTime);
}

if(!checkComplete()){
  interval = setInterval(checkComplete, 1000);
}
function checkComplete() {
  if (currentTime > targetTime) {
    clearInterval(interval);
    localStorage.removeItem("currentTime");
    localStorage.removeItem("currentTime");

    alert("Time is up");
    window.location.assign("result.php");
  } else {
    currentTime = new Date();
    s=(targetTime - currentTime) / 1000;
    m=s/60;
    m=m-1;

    document.getElementById("timer").innerHTML = " time Remaining:" +Math.ceil(m%60)+":"+ Math.ceil(s%60);
  
  }
}
document.onbeforeunload = function(){
  localStorage.setItem('currentTime', currentTime);
}
</script>
</html>



                      
                                     