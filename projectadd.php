<html>
   
  <head>
      <style>
         .error {color: #FF0000;}
      </style>
   <h1 style="text-align:center;font-size:300%">....<ins>ADD PROJECT DETAILS</ins>....</h1>
   </head>
   
   <body style="background-color:lightgrey"> 
      <?php
         // define variables and set to empty values
          $project_idErr =  $project_nameErr = $project_headErr = $project_locErr = "";
          $project_id = $project_name = $project_head = $project_loc = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") 
          {
           
         if (empty($_POST["project_id"])) {
         $project_idErr = "project_id is required";
        } else {
        $project_id= test_input($_POST["project_id"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[A-Za-z0-9 ]*$/",$project_id)) {
         $project_idErr ="Only letters and numbers are allowed"; 
         }
         }
          
        
      
         if (empty($_POST["project_name"])) {
         $project_nameErr = "project_name is required";
        } else {
        $project_name= test_input($_POST["project_name"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[A-Za-z0-9 ]*$/",$project_name)) {
         $project_nameErr ="Only letters and numbers are allowed"; 
         }
         }

            
            
            
           if (empty($_POST["project_head"])) {
         $project_headErr = "project_head is required";
        } else {
        $project_head = test_input($_POST["project_head"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[A-Za-z]*$/",$project_head)) {
         $project_headErr ="Only letters are allowed"; 
         }
         }
            
            if (empty($_POST["project_loc"])) {
         $project_locErr = "project_loc is required";
        } else 
            {
               $project_loc = test_input($_POST["project_loc"]);
               if (!preg_match("/^[A-Za-z0-9 ]*$/",$project_loc)) {
         $project_locErr ="Only letters and numbers are allowed"; 
         }
         }
            
           
                 
         $username = "root";
         $password = "";
         $dbname = "empdb";
         $var1=$_POST["project_id"];
         $var2=$_POST["project_name"];
         $var3=$_POST["project_head"];
         $var4=$_POST["project_loc"];
         
         // Create connection
         $conn = mysqli_connect('localhost', $username, $password, $dbname);
         // Check connection
         if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
         }
        if(($var1!="" && $var2!="" && $var3!="" && $var4!="") && preg_match("/^[A-Za-z0-9 ]*$/",$project_id) && preg_match("/^[A-Za-z0-9 ]*$/",$project_name) && preg_match("/^[A-Za-z]*$/",$project_head) && preg_match("/^[A-Za-z0-9 ]*$/",$project_loc))
        {$sql = "INSERT INTO project(project_id,project_name,project_head,project_loc)
             VALUES ('$var1','$var2','$var3','$var4')";
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
             <td colspan="3" style="font-size:150%;text-align:center"><strong>ADD PROJECT DETAILS</strong></td>
             </tr>
            <tr>
               <td>PROJECT ID:</td>
               <td><input name="project_id" type="text">
                  <span class = "error"><?php echo $project_idErr;?></span>
               </td>
            </tr>

            <tr>
               <td>PROJECT NAME:</td>
               <td><input name="project_name" type="text">
                  <span class = "error"><?php echo $project_nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>PROJECT HEAD: </td>
               <td><input name="project_head" type="text">
                  <span class = "error"><?php echo $project_headErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>PROJECT LOCATION:</td>
               <td> <input name="project_loc" type="text">
                  <span class = "error"><?php echo $project_locErr;?></span>
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