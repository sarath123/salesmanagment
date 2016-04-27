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
        
              $date = date('Y-m-d');
              $time=strtotime($date);
              $month=date("n",$time);
              
              echo 'Current Date : '.$date;
             
              $q=(int)($month/3);
              $q++;
              
              $q1=$q*3-2;
              $q2=$q*3-2;
              $q3=$q*3-2;
        
              
        
              
              
             
    
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
                  header( "refresh:3;url=manager.html" );
              }
              else
              {
                  
                  /*echo "
                       <table border='0' >
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Target</th>
                            <th>Rating</th>
                          </tr>";*/
                  
                  
                  while($runrows= mysql_fetch_assoc($query))
                  { 
                      $name = $runrows['NAME'];
                      $id = $runrows['ID'];
                      $address = $runrows['ADDRESS'];
                      $tel = $runrows['PHONE'];
                      $target = $runrows['TARGET'];
                      $rating = $runrows['RATING'];
                      $prevtarget=$runrows['PREVTARGET'];
                    /*  echo " 
                      
                      <tr>
                        <td>$id</td>
                        <td>$name</td>
                        <td>$address</td>
                        <td>$tel</td>
                        <td>$target</td>
                        <td>$rating</td>
                      </tr>
                       ";*/
                      $oldsales=0; 
                      $tarquery="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH FROM sales, user WHERE user.LOCATION='$location' AND user.ID=sales.AGENTID AND sales.AGENTID=$id AND (MONTH(DATE)=$q1 OR MONTH(DATE)=$q2 OR MONTH(DATE)=$q3)GROUP BY MONTH(DATE)";
                       $tarresult=mysql_query($tarquery);
                        while($tarrows= mysql_fetch_assoc($tarresult))
                        {
                            $oldsales+=$tarrows['SUM(UNITSSOLD)'];
                        }
                      
                
                //prevTarget      
                      
                      
                      
                      
                      
                      
                  
                 $temp=$target;
                      
                      
                     $mon=mysql_query( "SELECT MONTH(TDATE) AS MONTH FROM user WHERE ID='$id'");        
                      $row1= mysql_fetch_assoc($mon);
                      
                      $row=$row1['MONTH'];
                      
                    if($row>=($q1+3) && $row>=($q2+3) && $row>=($q3+3) )
                    {  $target=round($prevtarget+($oldsales*0.05));
                  
                        mysql_query( "UPDATE user SET TARGET='$target' WHERE ID='$id'");        
                 
                      if($prevtarget==0)
                      {  $prevtarget=$oldsales;
                         mysql_query( "UPDATE user SET PREVTARGET='$prevtarget' WHERE ID='$id'");       
                      }
                      else
                           mysql_query( "UPDATE user SET PREVTARGET='$temp' WHERE ID='$id'");   
                        
                     mysql_query( "UPDATE user SET TDATE='$date' WHERE ID='$id'");       
                        
                    }
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      //BONUS
                      
                        if($oldsales>$prevtarget)
                        {
                            $bonus=0.08*$oldsales;
              
                        }
                      else
                            $bonus=0;
                      
                      
                      
                     mysql_query( "UPDATE user SET BONUS='$bonus' WHERE ID='$id'");   
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      echo" <tr>
                      <fieldset>
                                <pre><b>Agent ID</b> :$id                           <b>Name</b> :$name</pre>
                                <pre><b>Address</b> :$address                       <b>Phone</b> :$tel</pre>
                                <pre><b>Rating</b> :$rating                             <b>Target</b> :$target</pre>
                                <p class='right-align'><b>Last Quadrant Achieved sales unit</b> :$oldsales</p>
                                 
                                        
                                
                                
                        </fieldset>
                    </tr>";
                      
                      
                      
                        
                  }
              }
    
 
              // echo " </table>";           
        
        
        
        
        
        
        
        
                             mysql_close();
  
                       
                 ?>




    </body>

    </html>