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



        <title>Product List</title>
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
                    <li><a href="<?php echo $_SESSION['cat'] ?>.php">Home</a></li>
                    <li><a href="help.html">Help</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>




    </head>

    <body>


        <?php 
       require 'config.php';
    //echo $_SESSION['email'] ;
    $name = $pid =  $unitsm =  $category = $cost = $stock = $productioncost = "";
    


  
      

              $strSQL = "SELECT * FROM product";
              $query=mysql_query($strSQL);
   
              if(mysql_num_rows($query)==0)
              { 
                  echo "<h3>No Products Found</h3><p class='center-align'>Redirecting to HOME</p>";
                  echo '<div class="progress">
                      <div class="indeterminate"></div>
                 </div>';
                  header( "refresh:3;url=manager.html" );
              }
              else
              {
                  
                  echo "
                       <table border='0'  class=\"striped\" >
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
                      
                      <tr>
                        <td>$pid</td>
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
                             mysql_close();
  
                       
                 ?>








    </body>

    </html>