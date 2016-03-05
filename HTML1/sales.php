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
                  
                  echo "
                       <table border='0'  class=\"striped  container\" >
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
                      
                     
                      echo " 
                      
                      <tr>
                        <td>$salesid</td>
                        <td>$date</td>
                        <td>$pid</td>
                        <td>$unit</td>
                        <td>$cname</td>
                        <td>$caddr</td>
                      </tr>
                       ";
                  }
              }
    
 
               echo " </table>";                             
                             mysql_close();
  
                       
                 ?>








</body>

</html>