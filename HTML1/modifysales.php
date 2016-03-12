<<<<<<< HEAD


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



    <title>Sales List</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/materialize.min.css">

    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>

    <link rel="stylesheet" href="font/material-design-icons">
    <link rel="stylesheet" href="font/roboto">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <nav>
        <div class="nav-wrapper teal ">
            <a href="#" class="brand-logo">Sales Management System</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="agntoptions.php">Home</a></li>
                <li><a href="help.html">Help</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>




</head>

<body>



    <div class="container row">
        <form>
            <div class="input-field col s4 offset-s3">
                <input id="search" type="search" required>
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>

        </form>
    </div>




    <?php 
       require 'config.php';
    
    $pid = $agentid = $date = $unit = $cname = $caddr = $salesid = "";
    


  
      

              $strSQL = "SELECT * FROM sales";
              $query=mysql_query($strSQL);
   
              if(mysql_num_rows($query)==0)
              { 
                  echo "<h3>No Transaction Found</h3><p class='center-align'>Redirecting to HOME</p>";
                  echo '<div class="progress">
                      <div class="indeterminate"></div>
                 </div>';
                  header( "refresh:3;url=agntoptions.html" );
              }
              else
              {
                  
                  echo "<div>&nbsp</div>
                  <form action='modifysales2.php' method='GET'>
                       <table   class=\"highlight container \" >
                       <select name='sid'>
                          <tr>
                            <th>SALES ID</th>
                            <th>DATE</th>
                            <th>PRODUCT ID</th>
                            <th>UNITS SOLD</th>
                            <th>CUSTOMER NAME</th>
                            <th>CUSTOMER ADDRESS</th>
                          </tr>";
                  
                  
                  while($runrows= mysql_fetch_assoc($query))
                  { 
                      $date = $runrows['DATE'];
                      $pid = $runrows['PRODUCTID'];
                      $unit = $runrows['UNITSSOLD'];
                      $cname = $runrows['CUSNAME'];
                      $caddr = $runrows['CUSADDR'];
                      $salesid = $runrows['SALESID'];
                     
                      echo " 
                      <option>
                   <tr>
                        <td><a href='modifysales2.php?sid=$salesid'>$salesid</a></td>
                        <td>$date</td>
                        <td>$pid</td>
                        <td>$unit</td>
                        <td>$cname</td>
                        <td>$caddr</td>
                      </tr></option>
                       ";
                  }
              }
    
 
               echo " </table></select></form>";                             
                             mysql_close();
  
                       
                 ?>






</body>

=======
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">



    <title>Sales List</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/materialize.min.css">

    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>

    <link rel="stylesheet" href="font/material-design-icons">
    <link rel="stylesheet" href="font/roboto">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <nav>
        <div class="nav-wrapper teal ">
            <a href="#" class="brand-logo">Sales Management System</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="agntoptions.html">Home</a></li>
                <li><a href="help.html">Help</a></li>
            </ul>
        </div>
    </nav>




</head>

<body>



    <div class="container row">
        <form>
            <div class="input-field col s4 offset-s3">
                <input id="search" type="search" required>
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>

        </form>
    </div>




    <?php 
       require 'config.php';
    
    $pid = $agentid = $date = $unit = $cname = $caddr = $salesid = "";
    


  
      

              $strSQL = "SELECT * FROM sales";
              $query=mysql_query($strSQL);
   
              if(mysql_num_rows($query)==0)
              { 
                  echo "<h3>No Transaction Found</h3><p class='center-align'>Redirecting to HOME</p>";
                  echo '<div class="progress">
                      <div class="indeterminate"></div>
                 </div>';
                  header( "refresh:3;url=agntoptions.html" );
              }
              else
              {
                  
                  echo "<div>&nbsp</div>
                  <form action='modifysales2.php' method='GET'>
                       <table   class=\"highlight container \" >
                       <select name='sid'>
                          <tr>
                            <th>SALES ID</th>
                            <th>DATE</th>
                            <th>PRODUCT ID</th>
                            <th>UNITS SOLD</th>
                            <th>CUSTOMER NAME</th>
                            <th>CUSTOMER ADDRESS</th>
                          </tr>";
                  
                  
                  while($runrows= mysql_fetch_assoc($query))
                  { 
                      $date = $runrows['DATE'];
                      $pid = $runrows['PRODUCTID'];
                      $unit = $runrows['UNITSSOLD'];
                      $cname = $runrows['CUSNAME'];
                      $caddr = $runrows['CUSADDR'];
                      $salesid = $runrows['SALESID'];
                     
                      echo " 
                      <option>
                   <tr>
                        <td><a href='modifysales2.php?sid=$salesid'>$salesid</a></td>
                        <td>$date</td>
                        <td>$pid</td>
                        <td>$unit</td>
                        <td>$cname</td>
                        <td>$caddr</td>
                      </tr></option>
                       ";
                  }
              }
    
 
               echo " </table></select></form>";                             
                             mysql_close();
  
                       
                 ?>






</body>

>>>>>>> 4517c1e9d0176b17e76e3fb2f6ba30987c0f3c59
</html>