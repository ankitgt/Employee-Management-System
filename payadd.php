<html>
   
  <head>
      <style>
         .error {color: #FF0000;}
      </style>
   <h1 style="text-align:center;font-size:300%">....<ins>ADD SALARY DETAILS</ins>....</h1>
   </head>
   
   <body style="background-color:lightgrey"> 
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
          
         

         
    
         $username = "root";
         $password = "";
         $dbname = "empdb";
         $var1=$_POST["pay_id"];
         $var2=$_POST["basic_pay"];
         $var3=$_POST["ta"];
         $var4=$_POST["da"];
         $var5=$_POST["hra"];
         $var6=$_POST["pf"];
         $var7=(($var2*(2.57))+$var3+$var4+$var5-$var6);
         // Create connection
         $conn = mysqli_connect('localhost', $username, $password, $dbname);
         // Check connection
         if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
         }
        $sql = "INSERT INTO paytable(pay_id,basic_pay,ta,da,hra,pf,net_salary)
             VALUES ('$var1',$var2,$var3,$var4,$var5,$var6,$var7)";


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
             <td colspan="3" style="font-size:150%;text-align:center"><strong>ADD EMPLOYEE SALARY</strong></td>
             </tr>
            <tr>
               <td>PAY_ID:</td>
               <td><input name="pay_id" type="text">
                  <span class = "error"><?php echo $pay_idErr;?></span>
               </td>
            </tr>

            <tr>
               <td>BASIC_PAY:</td>
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

      
   </body>
</html>