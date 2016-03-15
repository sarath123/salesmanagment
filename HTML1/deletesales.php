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
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
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
    
    
    
      if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
          
         $salesid=$_POST["ssid"];   
         
        $remove="DELETE FROM sales WHERE SALESID=$salesid";
         $s=mysql_query($remove); 
          if($s)
         {
               sleep(3);
              header ('location: deletesales.php');
         }

      }
      
               $id=$_SESSION['agentidvalue'];
              $strSQL = "SELECT * FROM sales WHERE AGENTID=$id ";
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
                  <form action='deletesales.php?' method='POST'>
                       <table   class=\"highlight container \" >
                       <select >
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
                <td><a href='#modal1' class='btn waves-effect wave-light   collection-item  btn modal-trigger' onclick='return myfunction($salesid,\"$date\",$pid,$unit,\"$cname\",\"$caddr\")'>$salesid</a></td>
                <td>$date</td>
                <td>$pid</td>
                <td>$unit</td>
                <td>$cname</td>
                <td>$caddr</td>
            </tr>
        </option>
        "; } }
    
    echo " </table>
        </select>
        
        
        <!-- Modal Structure -->
        <div id='modal1' class='modal modal-fixed-footer'>
            <div class='modal-content'>
                <h5>Delete Sales Details </h5>
                <p>Product ID :
                    <a id='mproductid' value=''> </a>
                    <br> SALES ID :
                    <a id='msalesid' value=''></a>
                    <br> Date of Transaction :
                    <a id='mdate' value=''></a>
                    <br> Units Sold :
                    <a id='munits' value=''></a>
                    <br> Customer Name :
                    <a id='mcname' value=''></a>
                    <br> Customer Address :
                    <a id='mcaddr' value=''></a>
                    <br>
                    <input type= 'hidden' name= 'ssid' id='ssid' value=''>
                </p>
            </div>
            <div class='modal-footer'>
                <button type='submit' class='modal-action modal-close waves-effect waves-green btn-flat ' onclick='Materialize.toast(\"DONE\", 1000)'>Remove</button>


            </div>
        </div>
        </form>"; 
    mysql_close(); ?>








            <script type="text/javascript">
                function myfunction(a, b, c, d, e, f) {
                    /*  var jsalesid = document.getElementsById("sid").value;
                      var jpid = document.getElementById("sid").value;
                      var jdate = document.getElementsById("sid").value;
                      var junitsold = document.getElementsById("sid").value;
                      var jcusname = document.getElementsById("sid").value;
                      var jcusaddr = document.getElementsById("sid").value;*/

                    document.getElementById("msalesid").innerHTML = a;
                    document.getElementById("mproductid").innerHTML = c;
                    document.getElementById("mdate").innerHTML = b;
                    document.getElementById("munits").innerHTML = d;
                    document.getElementById("mcname").innerHTML = e;
                    document.getElementById("mcaddr").innerHTML = f;
                    document.getElementById("ssid").value = a;

                }
            </script>





            <script type="text/javascript">
                $(document).ready(function () {
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('.modal-trigger').leanModal();
                });
            </script>




    </body>

    </html>