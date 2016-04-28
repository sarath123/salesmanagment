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



        <title>Agent List</title>
        <link rel="stylesheet" href="css/materialize.css">
        <link rel="stylesheet" href="css/global.css">
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




    </head>

    <body>


        <?php 
                require 'config.php';
    
              $name = $email = $address = $dob = $tel = $sex = $date = $id = $joindate = $target = $salary = $bonus = $rating = "";
    
              $location = $_SESSION["location"];
              $id = $_SESSION["manageridvalue"];
        
              $strSQL = "SELECT * FROM user WHERE LOCATION='$location' AND ID<>$id";
              $query=mysql_query($strSQL);
        
              if(mysql_num_rows($query)==0)
              { 
                  echo "<h3>No Agents Found</h3><p class='center-align'>Redirecting to HOME</p>";
                  echo '<div class="progress">
                      <div class="indeterminate"></div>
                 </div>';
                  header( "refresh:3;url=manager.php" );
              }
              else
              {
                  
                  echo "
                       <table border='0' >
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Target</th>
                            <th>Rating</th>
                          </tr>";
                  
                  
                  while($runrows= mysql_fetch_assoc($query))
                  { 
                      $name = $runrows['NAME'];
                      $id = $runrows['ID'];
                      $address = $runrows['ADDRESS'];
                      $tel = $runrows['PHONE'];
                      $target = $runrows['TARGET'];
                      $rating = $runrows['RATING'];
                     
                      echo " 
                      
                      <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$address</td>
                        <td>$tel</td>
                        <td>$target</td>
                        <td>$rating</td>
                      </tr>
                       ";
                  }
              }
    
 
               echo " </table>";                             
                             mysql_close();
  
                       
                 ?>




    </body>

    </html>