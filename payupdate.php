<html>
   <title>Update Salary</title>
   <head>
       <h1 style="text-align:center;font-size:300%;color:darkred"><ins>Welcome To Employee Management System</ins></h1>
       <h2 style="text-align:center;font-size:200%"><ins>UPDATE SALARY</ins></h1>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   <body style="background-color:lightgrey">
   <br>
<form method="post" action="">  
   <h3 style="text-align:center;font-size:150%">Pay id: &nbsp
   <input name="pay_id1" type="text" >
   </h3>
   <center></center>
   
   <br> 
      <?php
         // define variables and set to empty values
          $pay_idErr =  $basic_payErr = $taErr = $daErr = $hraErr = $pfErr = "";
          $pay_id = $basic_pay = $ta = $da= $hra = $pf = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {
           
         if (empty($_POST["pay_id"])) {
         $pay_idErr = "pay_id is required";
        } else {
        $pay_id= test_input($_POST["pay_id"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[A-Za-z0-9 ]*$/",$pay_id)) {
         $pay_idErr ="Only letters and numbers are allowed"; 
         }
         }
          
        
      
         if (empty($_POST["basic_pay"])) {
         $basic_payErr = "basic_pay is required";
        } else {
        $basic_pay= test_input($_POST["basic_pay"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[0-9 ]*$/",$basic_pay)) {
         $basic_payErr ="Only numbers are allowed"; 
         }
         }

            
            
            
           if (empty($_POST["ta"])) {
         $taErr = "ta is required";
        } else {
        $ta = test_input($_POST["ta"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[0-9]*$/",$ta)) {
         $taErr = "Only numbers are allowed"; 
         }
         }
            
            if (empty($_POST["da"])) {
         $daErr = "da is required";
        } else 
            {
               $da = test_input($_POST["da"]);
               if (!preg_match("/^[0-9]*$/",$da))
                {
                 $daErr = "Only nos are allowed  "; 
                }
            }
            
         if (empty($_POST["hra"])) 
            {
               $hraErr = "hra is required";
            }
            else 
            {
               $hra = test_input($_POST["hra"]);
               if (!preg_match("/^[0-9]*$/",$hra))
                {
                 $hraErr = "Only nos are allowed  "; 
                }
            }
            
            if (empty($_POST["pf"])) 
            {
               $pfErr = "pf is required";
            }
            else 
            {
               $pf = test_input($_POST["pf"]);
               if (!preg_match("/^[0-9]*$/",$pf))
                {
                 $pfErr = "Only nos are allowed  "; 
                }
            }
         

$var1=$_POST["pay_id"];
$var2=$_POST["basic_pay"];
$var3=$_POST["ta"];
$var4=$_POST["da"];
$var5=$_POST["hra"];
$var6=$_POST["pf"];
$var7=(($var2*(2.57))+$var3+$var4+$var5-$var6);
$var8=$_POST["pay_id1"];

$username = "root";
$password = "";
$dbname = "empdb";

// Create connection
$conn = mysqli_connect('localhost', $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($var1!="")
{$sql = "UPDATE paytable  SET pay_id='$var1' WHERE pay_id='$var8'";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var2!="")
{$sql = "UPDATE paytable SET basic_pay=$var2 WHERE pay_id='$var8'";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var3!="")
{$sql = "UPDATE paytable  SET ta=$var3 WHERE pay_id='$var8'";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var4!="")
{$sql = "UPDATE paytable  SET da=$var4 WHERE pay_id='$var8'";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var5!="")
{$sql = "UPDATE paytable  SET hra=$var5 WHERE pay_id='$var8'";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var6!="")
{$sql = "UPDATE paytable  SET pf=$var6 WHERE pay_id='$var8'";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var7!="")
{$sql = "UPDATE paytable  SET net_salary=$var7 WHERE pay_id='$var8'";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}


mysqli_close($conn);


       }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
      }
    ?>
      
         <table border="5" align="center">
         <tbody><tr>
             <td colspan="3" style="font-size:150%;text-align:center"><strong>UPDATE SALARY</strong></td>
             </tr>
            <tr>
               <td>PAY ID:</td>
               <td><input name="pay_id" type="text">
                  <span class = "error"><?php echo $pay_idErr;?></span>
               </td>
            </tr>

            <tr>
               <td>BASIC PAY:</td>
               <td><input name="basic_pay" type="text">
                  <span class = "error"><?php echo $basic_payErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>TA: </td>
               <td><input name="ta" type="text">
                  <span class = "error"><?php echo $taErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>DA:</td>
               <td> <input name="da" type="text">
                  <span class = "error"><?php echo $daErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>HRA:</td>
               <td><input name="hra" type="text">
                   <span class = "error"><?php echo $hraErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>PF:</td>
               <td>
                  <input name="pf" type="text">
                  <span class = "error"><?php echo $pfErr;?></span>
               </td>
            </tr>
            
            
            <tr> </tr><tr> </tr><tr> </tr><tr> </tr>
            <tr> </tr><tr> </tr><tr> </tr><tr> </tr>
            <tr> </tr><tr> </tr><tr> </tr><tr> </tr> 
           </tr>
            <tr align="center">
               <td align="center"><input type="submit" name="Submit" value="Submit" onclick="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></td>
               <td><input type="submit" name="cancel" value="Cancel" onclick="myFunction()"></td>
            </tr>
            <script>
              function myFunction() {
              window.open("f0.html");
              }
            </script>
         </table>
      </form>
      
      
  </head>
</html>
