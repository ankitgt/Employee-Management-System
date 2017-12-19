
<?php
$var1=$_POST["username"];
$var2=$_POST["psw"];
$username = 'root';
$dbname = 'empdb';
$pwd = '';
// Create connection
$conn = mysqli_connect('localhost', $username, $pwd , $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT username,password FROM emp";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    { $ret1=strcmp($var1,$row["username"]);
      $ret2=strcmp($var2,$row["password"]);
    if($ret1==0 && $ret2==0)
       {header('Location: /f2.html');}
    else
    	{$message = "Invalid USERNAME or PASSWORD !! Try Again..";
echo "<script type='text/javascript'>alert('$message');</script>";
}}}
else 
{
    echo "0 results";
}

mysqli_close($conn);
?>
