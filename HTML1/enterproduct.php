
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
        <div class="nav-wrapper teal " id="lol">
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
   $nameErr = $pidErr = $categoryErr = $unitErr = $prodErr = $priceErr = "";
   $name = $pid = $category = $unit = $prod = $price = "";
    $f = $q =0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    if (empty($_POST["pid"])) {
      $pidErr = "Product ID is required";
     } else {
      $pid = test_input($_POST["pid"]);
      $f++;
   }
      
    
      if (empty($_POST["product_Name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["product_Name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
       $nameErr = "Only letters, numbers and white space allowed"; 
     }
       else
           $f++;
   }
      
  
      if (empty($_POST["category"])) {
     $categoryErr = "Category is required";
   } else {
     $category = test_input($_POST["category"]);
       if (!preg_match("/^[a-zA-Z ]*$/",$category)) {
       $categoryErr = "Only letters and white space allowed"; 
     }
       else
           $f++;
   }
      
      
    
      if (empty($_POST["unit_m"])) {
     $unitErr = "Units manufactured is required";
   } else {
     $unit = test_input($_POST["unit_m"]);
      if (!preg_match("/^[0-9]*$/",$unit)) {
       $unitErr = "Only numbers are allowed"; 
     }
       else
           $f++;
   }  
      
      
      if (empty($_POST["price"])) {
     $priceErr = "Price is required";
   } else {
     $price = test_input($_POST["price"]);
      if (!preg_match("/^[0-9]*$/",$price)) {
       $priceErr = "Only numbers are allowed"; 
     }
       else
           $f++;
   }    
      
        
      if (empty($_POST["prod_cost"])) {
     $prodErr = "Production Cost is required";
   } else {
     $prod = test_input($_POST["prod_cost"]);
      if (!preg_match("/^[0-9]*$/",$prod)) {
       $prodErr = "Only numbers are allowed"; 
     }
       else
           $f++;
   }      
      
  }
    
   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

    if($f==6)
    {   echo $f;
        $strSQL = "INSERT INTO product (PID,NAME,CATEGORY,UNITSM,COST,PRODUCTIONCOST) VALUES('$pid','$name','$category','$unit','$price','$prod')";
        $q=mysql_query($strSQL);
    }

	
if($q)
{
 header ('location: login.html');
}
             mysql_close();
 
    
    
    
    
    
    ?>

        <p>


            <form action="" method="post">
                <fieldset>

                    <legend>
                        <h6>Enter product details</h6></legend>
                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s2">
                            <input type="text" name="pid" placeholder="Product ID" value="<?php echo $pid;?>">
                            <span class="error">* <?php echo $pidErr;?></span>
                        </div>
                        <div class="col s5">&nbsp;</div>
                    </div>



                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s4">
                            <input type="text" name="product_Name" placeholder="Product Name" value="<?php echo $name;?>">
                            <span class="error">* <?php echo $nameErr;?></span>
                        </div>
                        <div class="col s3">&nbsp;</div>
                    </div>


                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s4">
                            <input type="text" name="category" placeholder="Category" value="<?php echo $category;?>">
                            <span class="error">* <?php echo $categoryErr;?></span>
                        </div>
                        <div class="col s3">&nbsp;</div>
                    </div>

                    <div class="row">
                        <div class="col s5">&nbsp; </div>
                        <div class="col s2">
                            <input type="text" name="unit_m" placeholder="Unit Manufactured" value="<?php echo $unit;?>">
                            <span class="error">* <?php echo $unitErr;?></span>
                        </div>
                        <div class="col s5">&nbsp;</div>
                    </div>



                    <div class="row">
                        <div class="col s5">&nbsp; </div>
                        <div class="col s2">
                            <input type="text" name="price" placeholder="Market Price" value="<?php echo $price;?>">
                            <span class="error">* <?php echo $priceErr;?></span>
                        </div>
                        <div class="col s5">&nbsp; </div>
                    </div>


                    <div class="row">
                        <div class="col s5">&nbsp; </div>
                        <div class="col s4">
                            <input type="text" name="prod_cost" placeholder="Production Cost" value="<?php echo $prod;?>">
                            <span class="error">* <?php echo $prodErr;?></span>
                        </div>
                        <div class="col s5">&nbsp; </div>
                    </div>


                    <div class="row">
                        <div class="col s5">&nbsp; </div>
                        <div class="col s2">
                            <input type="submit" class="btn waves-effect wave-light" value="DONE">
                        </div>
                        <div class="col s5">&nbsp; </div>
                    </div>
                </fieldset>
            </form>
            </div>
        </p>


        <p>


        </p>
</body>

</html>