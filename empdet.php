<?php
$var1=$_POST["employee_id"];
$flag=0;
$username = "root";
$password = "";
$dbname = "empdb";

// Create connection
$conn = mysqli_connect('localhost', $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT e.emp_id,e.emp_name,e.age,e.sex,e.address,e.date_joining,e.contact ,d.dept_name,p.project_name,py.net_salary
FROM employee e 
LEFT JOIN dept d
       ON e.dept_id=d.dept_id
LEFT JOIN project p
       ON e.project_id=p.project_id
LEFT JOIN paytable py
       ON e.pay_id=py.pay_id
WHERE emp_id=$var1 ";

$result = mysqli_query($conn, $sql);
$message=<<<EOF
<title>View Employee</title>
   <head>
       <h1 style="text-align:center;font-size:300%;color:darkred"><ins>Welcome To Employee Management System</ins></h1>
       <h2 style="text-align:center;font-size:200%"><ins>View Employee</ins></h1>
   </head>
   <body style="background-color:lightgrey">
   <br><br>
   <form method="post" action="empdet.php">  
   <h3 style="text-align:center;font-size:150%">Employee id: &nbsp
   <input name="employee_id" type="text" >
   </h3>
   <center><input type="submit" value="VIEW EMPLOYEE"></center>
   </form>
EOF;
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
        if($var1==$row["emp_id"])
        {
        $var3=$row["emp_name"];
        $var4=$row["age"];
        $var5=$row["sex"];
        $var6=$row["address"];
        $var7=$row["date_joining"];
        $var8=$row["contact"];
        $var9=$row["dept_name"];
        $vara=$row["project_name"];
        $varb=$row["net_salary"];
        $flag=1;
echo"$message";
echo"<form>";
echo" <fieldset>";
echo"   <legend><b>Employee Details:</b></legend>";
echo "<p align=center><b>Emp ID:</b> $var1 </p> ";
echo "<p align=center><b>Name:</b> $var3 </p> ";
echo "<p align=center><b>Age:</b> $var4 </p> ";
echo "<p align=center><b>Sex:</b> $var5 </p> ";
echo "<p align=center><b>Address:</b> $var6 </p> ";
echo "<p align=center><b>Date of Joining:</b> $var7 </p> ";
echo "<p align=center><b>Department:</b> $var9 </p> ";
echo "<p align=center><b>Project:</b> $vara </p> ";
echo "<p align=center><b>Salary:</b> $varb </p> ";
echo "<p align=center><b>Contact:</b> $var8 </p> ";
echo "</fieldset>";
echo "</form>";
        }
        
    }
if(!$flag)
        {$message = "Invalid Employee ID !! Please enter VALID Employee ID";
          echo "<script type='text/javascript'>alert('$message');</script>"; 
         }
} 
else 
{
    echo "0 results..  ";
}

mysqli_close($conn);
?>
