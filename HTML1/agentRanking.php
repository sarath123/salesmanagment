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
                    <li><a href="help.html">Help</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>



    </head>

    <body>


        <?php 
                require 'config.php';
    
    //          $name = $email = $address = $dob = $tel = $sex = $date = $id = $joindate = $target = $salary = $bonus = $rating = "";
    
              $location = $_SESSION["location"];
              $id = $_SESSION["manageridvalue"];
        
              $strSQL = "SELECT SUM(UNITSSOLD),AGENTID,NAME FROM SALES, USER WHERE USER.ID=AGENTID AND LOCATION='$location' GROUP BY AGENTID";
               $query = mysql_query($strSQL);    
      
                  echo "
                       <table border='0' >
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>RANK</th>
                            <th>UNITS SOLD</th>
                          </tr>";
                    
                   $rank = 1;   
                while($runrows= mysql_fetch_assoc($query))
                  { 
                      $name = $runrows['NAME'];
                      $id = $runrows['AGENTID'];
                      $units = $runrows['SUM(UNITSSOLD)'];
                    
                      echo " 
                      
                      <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$rank</td>
                        <td>$units</td>
                        </tr>
                       ";
                    $rank++;
                  }
    ?>
    </body>