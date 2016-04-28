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


        <form action="removeProduct.php" action="GET">
            <input type="text" name="sid">
            <input type="submit">
        </form>

        <?php 
       require 'config.php';
    
            if(empty($_GET["sid"]))
            {
             echo"    <p>Click on required product ID to remove</p>";

  
      
             
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
                       <select name='sid1'>
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
                      //$pid=$_GET["sid"];
                     
                      echo "
                      <option>
                   <tr>
                        <td><a href='removeProduct.php?sid=$pid'>$pid</a></td>
                        <td>$name</td>
                        <td>$category</td>
                        <td>$cost</td>
                        <td>$stock</td>
                        <td>$productioncost</td>
                      </tr></option>
                       ";
                  }
              }
    
 
               echo " </table></select></form>";        
                
                
            }
        
        else
        {
            
            $pid=$_GET["sid"];
            
             $sql = "DELETE FROM product WHERE PID= '$pid' "; 
                             $retval = mysql_query( $sql); 
            
            echo ' <h5>Product with PID:'.$pid.' Removed</h5>;
             <div class="row">
                       
                        <div class="col s2">
               <form action="removeProduct.php">
                        <button type="submit"  class="btn waves-effect wave-light" >Remove Another</button>
                          </div>';
        }
        
                             mysql_close();
  
                       
                 ?>






    </body>

    </html>