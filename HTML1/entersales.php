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
                <li><a href="help.html">Help</a></li>
                <li>
                    <a href="signup.php"></a>
                </li>
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
   $nameErr = $agentidErr = $categoryErr = $unitErr = $prodErr = $priceErr = "";
   $name = $agentid = $category = $unit = $prod = $price = "";
    $f = $q =0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    if (empty($_POST["agentid"])) {
      $agentidErr = "Agent ID is required";
     } else {
      $agentid = test_input($_POST["agentid"]);
      $f++;
   }
    
      
    
    
    
    
    
  }
    
   ?>

        <p>
            <h1>(((((((((((Show sales id (autoincremented value from database))))))))))))</h1>

            <form action="" method="POST">

                <feildset>
                    <legend>
                        <h6>Enter Sales details</h6></legend>
                    <div class="row">
                        <div>
                            <div class="col s5">&nbsp;</div>
                            <div class="col s2">
                                <input type="text" name="pid" placeholder="Product ID">
                            </div>
                            <br>
                            <div class="col s5">&nbsp;</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s2">
                            <input type="text" name="agentid" placeholder="Enter agent id ">
                        </div>
                        <br>
                        <div class="col s5">&nbsp;</div>
                    </div>

                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s2">
                            <input type="date" name="date" placeholder=" ">
                        </div>
                        <br>
                        <div class="col s5">&nbsp;</div>
                    </div>


                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s3">
                            <input type="text" name="unitsold" placeholder="Number of units sold">
                        </div>
                        <div class="col s3">&nbsp;</div>
                    </div>


                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s4">
                            <input type="text" name="cusname" placeholder="customer name">
                        </div>
                        <div class="col s3">&nbsp;</div>
                    </div>


                    <div class="row">
                        <div class="col s5">&nbsp;</div>
                        <div class="col s4">
                            <input type="text" name="cusaddr" placeholder="customer address">
                        </div>
                        <div class="col s3">&nbsp;</div>
                    </div>


                    <div class="row">
                        <div class="col s6">&nbsp;</div>
                        <div class="col s3">
                            <input type="submit" class="btn waves-effect wave-light" value="Done">
                        </div>
                        <div class="col s3">&nbsp;" </div>
                    </div>


                </feildset>
            </form>
            </div>
        </p>


        <p>


        </p>
</body>

</html>