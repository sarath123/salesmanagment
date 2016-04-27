<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
if($_SESSION['cat']=="agent")
{
    header ('Location:agntoptions.php');
}
if($_SESSION['cat']=="admin")
{
    header ('Location:admin.php');
}
?>









    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/materialize.css">
        <link rel="stylesheet" href="css/materialize.min.css">

        <script src="js/materialize.js"></script>
        <script src="js/materialize.min.js"></script>

        <link rel="stylesheet" href="font/material-design-icons">
        <link rel="stylesheet" href="font/roboto">

        <nav>
            <div class="nav-wrapper teal ">
                <a href="#" class="brand-logo">Sales Management System</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="manager.php">Home</a></li>
                    <li><a href="help.html">Help</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>



        <style>
            .error {
                color: #FF0000;
            }
        </style>

    </head>


    <body>


        <?php

require 'config.php';

// define variables and set to empty values
$nameErr = $emailErr = $addressErr = $passwordErr = $dobErr = $telErr = "";
$name = $email = $address = $password = $dob = $tel = $sex =$date = "";
    $f = $q =0;
   

        
     
        
        
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
       else
           $f++; 
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
       else
           $f++; 
   }
    
    
  if (empty($_POST["address"])) {
     $addressErr = "Address is required";
   } else {
     $address = test_input($_POST["address"]);
      $f++; 
   }
    
   if (empty($_POST["dob"])) {
     $dobErr = "Date of Birth is required";
   } else {
     $dob = test_input($_POST["dob"]);
       $f++; 
   }
    
    if (empty($_POST["tel"])) {
     $telErr = "Phone Number is required";
   } else {
     $tel = test_input($_POST["tel"]);
        $f++; 
   }
     
  if (empty($_POST["password"])) {
     $passwordErr = "Password requied";
   } 
    else if($_POST["password"]!=$_POST["pwd"]){
    $passwordErr = "Password validation failed";
           }
    else {
     $password = test_input($_POST["password"]);
      $f++;
   } 
    
     
    
    $sex=test_input($_POST["radio-category"]);
    $date=date("Y-m-d");
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
    

    if($f==6)
    {   
        
          $tdate = date('Y-m-d');
              
       
        $location =  $_SESSION["location"];
       
 $strSQL = "INSERT INTO user (NAME,ADDRESS,DOB,EMAIL,PHONE,PASSWORD,SEX,JOINDATE,POSITION,LOCATION,TDATE) VALUES('$name','$address','$dob','$email','$tel','$password','$sex','$date','agent','$location','$tdate')";
        $q=mysql_query($strSQL);
         
    }

 	
if($q)
{
 header ('location: manager.php');
}
             mysql_close();

?>

            <p>

                <div class="row">
                    <form name="sign" method="post" action="signup.php">
                        <fieldset style="border:0px;">
                            <legend>
                                <h6 style="margin:100px;">Enter your details</h6></legend>
                            <div class="col s2 offset-s4">
                                <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"> <span class="error">* <?php echo $nameErr;?></span>

                            </div>
                            <br>
                            <div class="col s4 offset-s4">
                                <input type="email" name="email" placeholder="email" pattern="[a-zA-Z0-9]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}" value="<?php echo $email;?>">
                                <span class="error">* <?php echo $emailErr;?></span>
                            </div>
                            <br>
                            <fieldset style="border:0px">
                                <legend>Sex</legend>

                                <input class="radio-input" type="radio" id="radio1" name="radio-category" value="Male" checked />
                                <label class="radio-label" for="radio1">Male</label>

                                <input class="radio-input" type="radio" id="radio2" name="radio-category" value="Female" />
                                <label class="radio-label" for="radio2">Female</label>

                            </fieldset>



                            <div class="col s6 offset-s4">
                                <input type="text" name="address" placeholder="address" value="<?php echo $address;?>">
                                <span class="error">* <?php echo $addressErr;?></span>
                            </div>
                            <br>
                            <div class="col s2 offset-s4">
                                <input type="date" name="dob" placeholder="Date Of Birth" value="<?php echo $dob;?>">
                                <span class="error">* <?php echo $dobErr;?></span>
                            </div>
                            <div class="col s4 offset-s4">
                                <input type="text" name="tel" placeholder="Telephone number" pattern="[0-9]{10,10}" value="<?php echo $tel;?>">
                                <span class="error">* <?php echo $telErr;?></span>
                            </div>
                            <div class="col s6 offset-s4">
                                <input type="password" name="password" placeholder="Password" value="<?php echo $password;?>">
                                <span class="error">* <?php echo $passwordErr;?></span>
                            </div>
                            <div class="col s6 offset-s4">
                                <input type="password" name="pwd" placeholder="Confirm Password">
                            </div>
                            <br>
                            <br>
                            <div class="col s8 offset-s6">
                                <input type="submit" class="btn waves-effect wave-light" value="Sign Up">
                            </div>
                            <br>
                            <br>
                        </fieldset>
                    </form>
                </div>
            </p>




    </body>

    </html>