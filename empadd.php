<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   
   <body style="background-color:lightgrey"> 
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
          

         
    
         $username = "root";
         $password = "";
         $dbname = "empdb";
         $var1=$_POST["EmpID"];
         $var2=$_POST["name"];
         $var3=$_POST["age"];
         $var4=$_POST["sex"];
         $var5=$_POST["address"];
         $var6=$_POST["dept_id"];
         $var7=$_POST["date_joining"];
         $var8=$_POST["project_id"];
         $var9=$_POST["pay_id"];
         $vara=$_POST["contact"];
         // Create connection
         $conn = mysqli_connect('localhost', $username, $password, $dbname);
         // Check connection
         if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
         }
        
        $sql = "INSERT INTO employee(emp_id,emp_name,age,sex,address,dept_id,date_joining,project_id,pay_id,contact)
             VALUES ($var1,'$var2',$var3,'$var4','$var5','$var6','$var7','$var8','$var9',$vara)";

        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
             
		
      <head><h1 style="text-align:center;font-size:300%">....<ins>ADD NEW EMPLOYEE</ins>....</h1></head>
      
      <form method = "POST" action = "">
         <table border="5" align="center">
         <tbody><tr>
             <td colspan="3" style="font-size:150%;text-align:center"><strong>ADD EMPLOYEE</strong></td>
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

      
   </body>
</html>