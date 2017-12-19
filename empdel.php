<?php
$username = "root";
$password = "";
$dbname = "empdb";
$var1=$_POST["employee_id"];
$f1=$f2=$f3=$f4=0;
$flag=0;
// Create connection
$conn = mysqli_connect('localhost', $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql="SELECT emp_id,dept_id,project_id,pay_id FROM employee WHERE emp_id=$var1";

$result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) 
 {
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) 
     {
         if($var1==$row["emp_id"])
         {
         $var3=$row["dept_id"];
         $var4=$row["project_id"];
         $var5=$row["pay_id"];
         $flag=1;
         echo "<p align=center><b>Emp ID:</b> $var1 </p> ";
         echo "<p align=center><b>Dept ID:</b> $var3 </p> ";
         echo "<p align=center><b>Project ID:</b> $var4 </p> ";
         echo "<p align=center><b>Pay ID:</b> $var5 </p> ";
         }
     }
        
 if(!$flag)
         {$message = "Invalid Employee ID !! Please enter VALID Employee ID";
           echo "<script type='text/javascript'>alert('$message');</script>"; 
          }
}


$sql="DELETE FROM dept WHERE dept_id='$var3'";

if (mysqli_query($conn, $sql)) {
    $f1=1;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$sql="DELETE FROM project WHERE project_id='$var4'";

if (mysqli_query($conn, $sql)) {
    $f2=1;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$sql="DELETE FROM paytable WHERE pay_id='$var5'";

if (mysqli_query($conn, $sql)) {
    $f3=1;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$sql="DELETE FROM employee WHERE emp_id=$var1";

if (mysqli_query($conn, $sql)) {
    $f4=1;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

if($f1==1 && $f2==1 && $f3==1 && $f4==1)
{
 echo "Record deleted successfully";
}
mysqli_close($conn);
?>