<html>
   <title>Modify Employee</title>
   <head>
       <h1 style="text-align:center;font-size:300%;color:darkred"><ins>Welcome To Employee Management System</ins></h1>
       <h2 style="text-align:center;font-size:200%"><ins>Modify Employee</ins></h1>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   <body style="background-color:lightgrey">
   <br>
<form method="post" action="">  
   <h3 style="text-align:center;font-size:150%">Employee id: &nbsp
   <input name="employee_id" type="text" >
   </h3>
   <center></center>
   
   <br> 
      <?php
         // define variables and set to empty values
         $nameErr =  $websiteErr = $idErr =  $ageErr = $sexErr = $addressErr = $dept_idErr = $date_joiningErr = $project_idErr = $pay_idErr = $contactErr = "";
         $name = $EmpID = $age = $address = $sex = $subject = $dept_id = $date_joining = $project_id = $pay_id = $contact = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {
            if (empty($_POST["EmpID"])) 
            {
               $idErr = "ID is required";
            }
            else 
            {
               $EmpID = test_input($_POST["EmpID"]);
               if (!preg_match("/^[a-zA-Z0-9]*$/",$EmpID))
                {
                 $idErr = "Only letters,white space and no are allowed  "; 
                }
            }
          
        
      
         if (empty($_POST["name"])) {
         $nameErr = "Name is required";
        } else {
        $name = test_input($_POST["name"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
         $nameErr = "Only letters and white space allowed"; 
         }
         }

            
            
            
           if (empty($_POST["age"])) {
         $ageErr = "Age is required";
        } else {
        $age = test_input($_POST["age"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[0-9]*$/",$age)) {
         $ageErr = "Only numbers are allowed"; 
         }
         }
            
            if (empty($_POST["sex"])) {
         $sexErr = "This field is required";
        } else {
        $sex = test_input($_POST["sex"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[mfoMFO]*$/",$sex)) {
         $sexErr = "This field is required"; 
         }
         }
            
         if (empty($_POST["address"])) 
            {
               $addressErr = "Address is required";
            }
            else 
            {
               $address = test_input($_POST["address"]);
               if (!preg_match("/^[a-zA-Z0-9]*$/",$address))
                {
                 $addressErr = "Only letters,white space and no are allowed  "; 
                }
            }
            
            if (empty($_POST["dept_id"])) 
            {
               $dept_idErr = "DeptID is required";
            }
            else 
            {
               $dept_id = test_input($_POST["dept_id"]);
               if (!preg_match("/^[a-zA-Z0-9]*$/",$dept_id))
                {
                 $dept_idErr = "Only letters,white space and no are allowed  "; 
                }
            }
          
          if (empty($_POST["project_id"])) 
            {
               $project_idErr = "ProjectID is required";
            }
            else 
            {
               $project_id = test_input($_POST["project_id"]);
               if (!preg_match("/^[a-zA-Z0-9]*$/",$project_id))
                {
                 $project_idErr = "Only letters,white space and no are allowed  "; 
                }
            }
          
          if (empty($_POST["pay_id"])) 
            {
               $pay_idErr = "PayID is required";
            }
            else 
            {
               $pay_id = test_input($_POST["pay_id"]);
               if (!preg_match("/^[a-zA-Z0-9]*$/",$pay_id))
                {
                 $pay_idErr = "Only letters,white space and no are allowed  "; 
                }
            }

             if (empty($_POST["contact"])) {
         $contactErr = "Contact is required";
        } else {
        $contact = test_input($_POST["contact"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[0-9]*$/",$contact)) {
         $contactErr = "Only numbers are allowed"; 
         }
         }
         
$var1=$_POST["employee_id"];
$var2=$_POST["name"];
$var3=$_POST["age"];
$var4=$_POST["sex"];
$var5=$_POST["address"];
$var6=$_POST["dept_id"];
$var7=$_POST["date_joining"];
$var8=$_POST["project_id"];
$var9=$_POST["pay_id"];
$vara=$_POST["contact"];
$varb=$_POST["EmpID"];
$username = "root";
$password = "";
$dbname = "empdb";

// Create connection
$conn = mysqli_connect('localhost', $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($var2!="")
{$sql = "UPDATE employee SET emp_name='$var2' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var3!="")
{$sql = "UPDATE employee SET age='$var3' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var4!="")
{$sql = "UPDATE employee SET sex='$var4' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var5!="")
{$sql = "UPDATE employee SET address='$var5' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var6!="")
{$sql = "UPDATE employee SET dept_id='$var6' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var7!="")
{$sql = "UPDATE employee SET date_joining='$var7' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var8!="")
{$sql = "UPDATE employee SET project_id='$var8' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($var9!="")
{$sql = "UPDATE employee SET pay_id='$var9' WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($vara!="")
{$sql = "UPDATE employee SET contact=$vara WHERE emp_id=$var1";
if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
   } else {
       echo "Error updating record: " . mysqli_error($conn);
   }
}

if($varb!="")
{$sql = "UPDATE employee SET emp_id='$varb' WHERE emp_id=$var1";
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
             <td colspan="3" style="font-size:150%;text-align:center"><strong>MODIFY EMPLOYEE</strong></td>
             </tr>
            <tr>
               <td>EmpID:</td>
               <td><input name="EmpID" type="text">
                  <span class = "error"><?php echo $idErr;?></span>
               </td>
            </tr>

            <tr>
               <td>Name:</td>
               <td><input name="name" type="text">
                  <span class = "error"><?php echo $nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Age: </td>
               <td><input name="age" type="text">
                  <span class = "error"><?php echo $ageErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Sex:</td>
               <td> <input name="sex" type="text">
                  <span class = "error"><?php echo $sexErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Address:</td>
               <td><input name="address" type="text">
                   <span class = "error"><?php echo $addressErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Department ID:</td>
               <td>
                  <input name="dept_id" type="text">
                  <span class = "error"><?php echo $dept_idErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Date of joining:</td>
               <td>
                  <input name="date_joining" type="text" value="(yyyy-mm-dd)">
                  <span class = "error"><?php echo $date_joiningErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Project ID:</td>
               <td><input name="project_id" type="text">
               <span class = "error"><?php echo $project_idErr;?></span>  
               </td>  
            </tr>

            <tr>
               <td>Pay ID:</td>
               <td><input name="pay_id" type="text">
               <span class = "error"><?php echo $pay_idErr;?></span>
               </td>
            </tr>

            <tr>
               <td>Contact:</td>
               <td><input name="contact" type="text">
               <span class = "error"><?php echo $contactErr;?></span>
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
