<html>
   
  <head>
      <style>
         .error {color: #FF0000;}
      </style>
   <h1 style="text-align:center;font-size:300%">....<ins>ADD DEPARTMENT DETAILS</ins>....</h1>
   </head>
   
   <body style="background-color:lightgrey"> 
      <?php
         // define variables and set to empty values
          $dept_idErr =  $dept_nameErr = $hodErr = $dept_locErr = $dept_contactErr ="";
          $dept_id = $dept_name = $hod = $dept_loc = $dept_contact = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {
           
         if (empty($_POST["dept_id"])) {
         $dept_idErr = "dept_id is required";
        } else {
        $dept_id= test_input($_POST["dept_id"]);
         // check if name only contains letters and whitespacedept_contact
         if (!preg_match("/^[A-Za-z0-9 ]*$/",$dept_id)) {
         $dept_idErr ="Only letters and numbers are allowed"; 
         }
         }
          
        
      
         if (empty($_POST["dept_name"])) {
         $dept_nameErr = "dept_name is required";
        } else {
        $dept_name= test_input($_POST["dept_name"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[A-Za-z0-9 ]*$/",$dept_name)) {
         $dept_nameErr ="Only letters and numbers are allowed"; 
         }
         }

            
            
            
           if (empty($_POST["hod"])) {
         $hodErr = "hod is required";
        } else {
        $hod = test_input($_POST["hod"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[A-Za-z]*$/",$hod)) {
         $hodErr ="Only letters are allowed"; 
         }
         }
            
            if (empty($_POST["dept_loc"])) {
         $dept_locErr = "dept_loc is required";
        } else 
            {
               $dept_loc = test_input($_POST["dept_loc"]);
               if (!preg_match("/^[A-Za-z0-9 ]*$/",$dept_loc)) {
         $dept_locErr ="Only letters and numbers are allowed"; 
         }
         }

         if (empty($_POST["dept_contact"])) {
         $dept_contactErr = "dept_contact is required";
        } else 
            {
               $dept_contact = test_input($_POST["dept_contact"]);
               if (!preg_match("/^[0-9]*$/",$dept_contact)) {
         $dept_contactErr ="Only numbers are allowed"; 
         }
         }
            
           
                 
         $username = "root";
         $password = "";
         $dbname = "empdb";
         $var1=$_POST["dept_id"];
         $var2=$_POST["dept_name"];
         $var3=$_POST["hod"];
         $var4=$_POST["dept_loc"];
         $var5=$_POST["dept_contact"];
         
         // Create connection
         $conn = mysqli_connect('localhost', $username, $password, $dbname);
         // Check connection
         if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
         }
        if(($var1!="" && $var2!="" && $var3!="" && $var4!="" && $var5!="") && preg_match("/^[A-Za-z0-9 ]*$/",$dept_id) && preg_match("/^[A-Za-z0-9 ]*$/",$dept_name) && preg_match("/^[A-Za-z]*$/",$hod) && preg_match("/^[A-Za-z0-9 ]*$/",$dept_loc) && preg_match("/^[A-Za-z0-9 ]*$/",$dept_contact))
        {$sql = "INSERT INTO dept(dept_id,dept_name,hod,dept_loc,dept_contact)
             VALUES ('$var1','$var2','$var3','$var4',$var5)";
        }

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
             
		
        
      <form method = "POST" action = "">
         <table border="5" align="center">
         <tbody><tr>
             <td colspan="3" style="font-size:150%;text-align:center"><strong>ADD DEPARTMENT DETAILS</strong></td>
             </tr>
            <tr>
               <td>DEPT ID:</td>
               <td><input name="dept_id" type="text">
                  <span class = "error"><?php echo $dept_idErr;?></span>
               </td>
            </tr>

            <tr>
               <td>DEPT NAME:</td>
               <td><input name="dept_name" type="text">
                  <span class = "error"><?php echo $dept_nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>DEPT HEAD: </td>
               <td><input name="hod" type="text">
                  <span class = "error"><?php echo $hodErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>DEPT ADDRESS:</td>
               <td> <input name="dept_loc" type="text">
                  <span class = "error"><?php echo $dept_locErr;?></span>
               </td>
            </tr>

            <tr>
               <td>CONTACT:</td>
               <td> <input name="dept_contact" type="text">
                  <span class = "error"><?php echo $dept_contactErr;?></span>
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