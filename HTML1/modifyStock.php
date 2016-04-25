<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
if($_SESSION['cat']=="manager")
{
    header ('Location:login.php');
}
if($_SESSION['cat']=="agent")
{
    header ('Location:agentoptions.php');
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
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="help.html">Help</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>




    </head>

    <body>





        <p>Click on required product ID to update</p>


        <?php 
       require 'config.php';
    
   


  
      
             
              $strSQL = "SELECT * FROM product ";
              $query=mysql_query($strSQL);
   
              if(mysql_num_rows($query)==0)
              { 
                  echo "<h3>No product Found</h3><p class='center-align'>Redirecting to HOME</p>";
                  echo '<div class="progress">
                      <div class="indeterminate"></div>
                 </div>';
                  header( "refresh:3;url=admin.php" );
              }
              else
              {
                  
                  echo "<div>&nbsp</div>
                  <form action='modifyStock2.php' method='GET'>
                       <table   class=\"highlight container \" >
                       <select name='sid'>
                           <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Cost</th>
                            <th>Stock</th>
                            <th>Production Cost</th>
                          </tr>";
                  
                  
                  while($runrows= mysql_fetch_assoc($query))
                  { 
                     $name = $runrows['NAME'];
                      $pid = $runrows['PID'];
                      $category = $runrows['CATEGORY'];
                      $cost = $runrows['COST'];
                      $stock = $runrows['STOCK'];
                      $productioncost = $runrows['PRODUCTIONCOST'];
                     
                      echo " 
                      <option>
                   <tr>
                        <td>$pid</td>
                        <td>$name</td>
                        <td>$category</td>
                        <td>$cost</td>
                        <td>$stock</td>
                        <td>$productioncost</td>
                        <td><a href='modifyStock2.php?sid=$pid'>Modify Stock</a></td>
                        
                      </tr></option>
                       ";
                  }
              }
    
 
               echo " </table></select></form>";                             
                             mysql_close();
  
                       
                 ?>






    </body>

    </html>