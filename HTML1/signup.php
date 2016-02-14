<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/global.css">
    <title></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <title></title>

    <h5 id="top">Welcome to Sales Management System</h5>



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
$name = $email = $address = $password = $dob = $tel = $sex = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
    
    
  if (empty($_POST["address"])) {
     $addressErr = "Address is required";
   } else {
     $address = test_input($_POST["address"]);
   }
    
   if (empty($_POST["dob"])) {
     $dobErr = "Date of Birth is required";
   } else {
     $dob = test_input($_POST["dob"]);
   }
    
    if (empty($_POST["tel"])) {
     $telErr = "Phone Number is required";
   } else {
     $tel = test_input($_POST["tel"]);
   }
     
  if (empty($_POST["password"])) {
     $passwordErr = "Password requied";
   } else {
     $password = test_input($_POST["password"]);
   } 

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$strSQL = "INSERT INTO login(username,email,password) VALUES('$name','$email','$password')"; 

	$q=mysql_query($strSQL);
if($q)
{echo "success";}
             mysql_close();

?>

        <p>

            <div class="row">
                <form action="signup.php" method="post">
                    <feildset>
                        <legend>
                            <h6>Enter your details</h6></legend>
                        <div class="col s2 offset-s4">
                            <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"><span class="error">* <?php echo $nameErr;?></span>

                        </div>
                        <br>
                        <div class="col s4 offset-s4">
                            <input type="email" name="email" placeholder="email" pattern="[a-zA-Z0-9]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}" value="<?php echo $email;?>">
                            <span class="error">* <?php echo $emailErr;?></span>
                        </div>
                        <br>
                        <legend>Sex</legend>

                        <input class="radio-input" type="radio" id="radio1" name="radio-category" checked/>
                        <label class="radio-label" for="radio1">Male</label>

                        <input class="radio-input" type="radio" id="radio2" name="radio-category" />
                        <label class="radio-label" for="radio2">Female</label>





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
                        <div class="col s8 offset-s6">
                            <input type="submit" class="btn waves-effect wave-light" value="Sign Up">
                        </div>
                        <br>
                        <br>
                    </feildset>
                </form>
            </div>
        </p>


        <p>


        </p>
</body>

</html>