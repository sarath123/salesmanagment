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

    <h5 id="top" style="text-align:center;">Sales Management System</h5>



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
    {
        $strSQL = "INSERT INTO product(pid,name,category) VALUES('$pid','$name','$category')";
        $q=mysql_query($strSQL);
    }

	
if($q)
{
 header ('location: login.html');
}
             mysql_close();
 
    
    
    
    
    
    ?>

        <p>

            <div class="row">
                <form action="" method="post">
                    <fieldset>
                        <legend>
                            <h6>Enter product details</h6></legend>
                        <div class="col s6 offset-s4">
                            <input type="number_format" name="pid" placeholder="Product ID" value="<?php echo $pid;?>">
                            <span class="error">* <?php echo $pidErr;?></span>
                        </div>
                        <br>

                        <div class="col s2 offset-s4">
                            <input type="text" name="product_Name" placeholder="Product Name" value="<?php echo $name;?>">
                            <span class="error">* <?php echo $nameErr;?></span>
                        </div>
                        <br>
                        <div class="col s4 offset-s4">
                            <input type="text" name="category" placeholder="Category" value="<?php echo $category;?>">
                            <span class="error">* <?php echo $categoryErr;?></span>
                        </div>
                        <br>


                        <div class="col s6 offset-s4">
                            <input type="number_format" name="unit_m" placeholder="Unit Manufactured" value="<?php echo $unit;?>">
                            <span class="error">* <?php echo $unitErr;?></span>
                        </div>
                        <br>
                        <div class="col s4 offset-s4">
                            <input type="number_format" name="price" placeholder="Market Price" value="<?php echo $price;?>">
                            <span class="error">* <?php echo $priceErr;?></span>
                        </div>
                        <div class="col s6 offset-s4">
                            <input type="number_format" name="prod_cost" placeholder="Production Cost" value="<?php echo $prod;?>">
                            <span class="error">* <?php echo $prodErr;?></span>
                        </div>
                        <div class="col s8 offset-s6">
                            <input type="submit" class="btn waves-effect wave-light" value="Login In">
                        </div>
                        <br>
                        <br>
                    </fieldset>
                </form>
            </div>
        </p>


        <p>


        </p>
</body>

</html>