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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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

        <style>
            .error {
                color: #FF0000;
            }
        </style>



    </head>

    <body>

        <?php 
       require 'config.php';
    
       if ($_SERVER["REQUEST_METHOD"] == "GET")
     {
    
   
  
             $search=$_GET["sid"];

              $strSQL = "SELECT * FROM product WHERE PID=$search";
              $query=mysql_query($strSQL);
   
              if(mysql_num_rows($query)!=1)
              { 
                  echo "<h3>No Transaction Found</h3><p class='center-align'>Redirecting to HOME</p>";
                  echo '<div class="progress">
                      <div class="indeterminate"></div>
                 </div>';
                  header( "refresh:3;url=admin.php" );
              }
              else
              {
                  
                  echo "<div>&nbsp</div>
                       <table   class=\"highlight container \" >
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
                      $unitsm= $runrows['UNITSM'];
                      echo " 
                      
                   <tr>
                        <td name='sid'>$pid</td>
                       
                        <td>$name</td>
                        <td>$category</td>
                        <td>$cost</td>
                        <td>$stock</td>
                        <td>$productioncost</td>
                      </tr>
                       ";
                  }
              }
    
 
               echo " </table>";                             
                             
  
     }
                 ?>





            <?php

   

 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      

    
    
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
      
      
      
        $stock=test_input($_POST["stock"]);
        $pid=test_input($_POST["pid"]);
    
      
     
            
   

    
     
        
         
        $strSQL = "UPDATE product SET STOCK='$stock' WHERE PID=$pid";
        $q=mysql_query($strSQL);
   

	mysql_close();
        
        
     
    
if($q)
{
    // echo"<h5>STOCK UPDATED</h5>";  
        
// sleep(2);
//header ('location: admin.php');
}
   
    
    
  }
    
   ?>



                <?php  
if ($_SERVER["REQUEST_METHOD"] == "GET")

{  echo '
    <form method="POST" action="modifyStock2.php">



                    <div class="row">
                        <div>
                            <h5>Enter New Stock details</h5>
                            <div class="col s5">&nbsp;</div>

                            <div class="col s2">

                                <input type="text" name="stock" placeholder="New Stock" value="">
                                <input type="hidden" name="pid" placeholder="New Stock" value=" '.$pid.' ">

                    </div>
                    <br>
                    <div class="col s5">&nbsp;</div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col s6">&nbsp;</div>
                        <div class="col s2">
                            <button type="submit" class="btn waves-effect wave-light">Done</button>
                        </div>
                        <div class="col s3">&nbsp;</div>
                    </div>



                    </form>


                    '; }
        
        else
            echo'<h5>Stock Updated</h5>
               <div class="row">
                       
                        <div class="col s2">
               <form action="modifyStock.php">
                        <button type="submit"  class="btn waves-effect wave-light" >Update Stock</button>
                          </div>
                       
                   
                    </form>
            
            ';
        
        
        
        
        ?>





    </body>

    </html>