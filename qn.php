<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$database="exam_portal";
$conn=new mysqli ($servername,$username,$password,$database);
if(!isset($_SESSION['id']))
{
    $_SESSION['id']=1;
   $_SESSION['count']=0;
    
}

?>


<html>
<body>
<form action="#" method="post">
        <?php
       
    $sql="select * from question";
    $res=$conn->query($sql);
    $total=$res->num_rows;
    $_SESSION['total']=$total;
    if(isset($_POST['1']))
    {
        if(!empty($_POST['choice']))
        {
        $choice=$_POST['choice'];
        }
    else
        {
        $choice="";
        }
    $x=$_SESSION['userid'];
    $cur=$_SESSION['id'];
    $sql="insert into response(st_id,q_id) values('$x','$cur')";
    $res=$conn->query($sql);
    $sql="update response set st_ans='$choice' where st_id='$x' and q_id='$cur'";
    $res=$conn->query($sql);
    if($cur==$_SESSION['total'])
    {
        echo "<script>
        if(window.confirm('Submit the Test')){
                window.location.assign('/webp/result.php');}
        
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
            $choice="";
            }
    $x=$_SESSION['userid'];
    $cur=$_SESSION['id'];
    $sql="insert into response(st_id,q_id) values('$x','$cur')";
    $res=$conn->query($sql);
    $sql="update response set st_ans='$choice' where st_id='$x' and q_id='$cur'";
    $res=$conn->query($sql);
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
        $sql="select * from question where qno='$current'";
        $res=$conn->query($sql);
        $row=$res->fetch_assoc();
        $x=$_SESSION['userid'];
        $sql1="select * from response where st_id='$x' and q_id='$current'";
        $res1=$conn->query($sql1);
        if($res1->num_rows!=0)
        {
            $row1=$res1->fetch_assoc();
            $st_ans=$row1['st_ans'];
            $sql2="select * from question where qno='$current'";
            $res2=$conn->query($sql2);
            $row2=$res2->fetch_assoc();
            $op1=$row2['option1'];
            $op2=$row2['option2'];
            $op3=$row2['option3'];
            $op4=$row2['option4'];
            if(!strcmp($st_ans,$op1))
            {
             ?>   <span><?php echo $row2['qno']?></span><span>)</span>
    <span><?php echo $row2['qn']?></span><br>
                <input type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>" checked><?php echo $row2['option1'];?><br>
                <input type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><?php echo $row2['option2'];?><br>
                <input type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><?php echo $row2['option3'];?><br>
                <input type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><?php echo $row2['option4'];?><br>
                <p id='1'></p>
                <input type='submit' value='prev' name='2'>
                <input type='submit' name='1' value='next'>
            <?php
            }
            else if(!strcmp($st_ans,$op2))
            {
                ?>   <span><?php echo $row2['qno']?></span><span>)</span>
    <span><?php echo $row2['qn']?></span><br>
                <input type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><?php echo $row2['option1'];?><br>
                <input type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>" checked><?php echo $row2['option2'];?><br>
                <input type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><?php echo $row2['option3'];?><br>
                <input type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><?php echo $row2['option4'];?><br>
                <p id='1'></p>
                <input type='submit' value='prev' name='2'>
                <input type='submit' name='1' value='next'>
            <?php
            }
            else if(!strcmp($st_ans,$op3))
            {
                ?>   <span><?php echo $row2['qno']?></span><span>)</span>
    <span><?php echo $row2['qn']?></span><br>
                <input type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><?php echo $row2['option1'];?><br>
                <input type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><?php echo $row2['option2'];?><br>
                <input type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>" checked><?php echo $row2['option3'];?><br>
                <input type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><?php echo $row2['option4'];?><br>
                <p id='1'></p>
                <input type='submit' value='prev' name='2'>
                <input type='submit' name='1' value='next'>
            <?php
            }
            else if(!strcmp($st_ans,$op4))
            {
                ?>   <span><?php echo $row2['qno']?></span><span>)</span>
    <span><?php echo $row2['qn']?></span><br>
                <input type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><?php echo $row2['option1'];?><br>
                <input type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><?php echo $row2['option2'];?><br>
                <input type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><?php echo $row2['option3'];?><br>
                <input type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>" checked><?php echo $row2['option4'];?><br>
                <p id='1'></p>
                <input type='submit' value='prev' name='2'>
                <input type='submit' name='1' value='next'>
            <?php
            }
            else
            {
                ?>   <span><?php echo $row2['qno']?></span><span>)</span>
    <span><?php echo $row2['qn']?></span><br>
                <input type='radio' name='choice' id='op1' value="<?php echo $row2['option1'];?>"><?php echo $row2['option1'];?><br>
                <input type='radio' name='choice' id='op2' value="<?php echo $row2['option2'];?>"><?php echo $row2['option2'];?><br>
                <input type='radio' name='choice' id='op3' value="<?php echo $row2['option3'];?>"><?php echo $row2['option3'];?><br>
                <input type='radio' name='choice' id='op4' value="<?php echo $row2['option4'];?>"><?php echo $row2['option4'];?><br>
                <p id='1'></p>
                <input type='submit' value='prev' name='2'>
                <input type='submit' name='1' value='next'>
            <?php
            }
            
        }
        else
        {
        ?>
        <span><?php echo $row['qno']?></span><span>)</span>
    <span><?php echo $row['qn']?></span><br>
                <input type='radio' name='choice' id='op1' value="<?php echo $row['option1'];?>"><?php echo $row['option1'];?><br>
                <input type='radio' name='choice' id='op2' value="<?php echo $row['option2'];?>"><?php echo $row['option2'];?><br>
                <input type='radio' name='choice' id='op3' value="<?php echo $row['option3'];?>"><?php echo $row['option3'];?><br>
                <input type='radio' name='choice' id='op4' value="<?php echo $row['option4'];?>"><?php echo $row['option4'];?><br>
                <p id='1'></p>
                <input type='submit' value='prev' name='2'>
                <input type='submit' name='1' value='next'> 
        <?php
        } ?>
               
                
</form>
</body>
</html>



                      
                                     