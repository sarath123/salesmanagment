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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="js/materialize.js"></script>
        <script src="js/materialize.min.js"></script>

        <link rel="stylesheet" href="font/material-design-icons">
        <link rel="stylesheet" href="font/roboto">

        <nav>
            <div class="nav-wrapper teal " id="lol">
                <a href="#" class="brand-logo">Sales Management System</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="agntoptions.php">Home</a></li>
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

    // define variables and set to empty values
   $pidErr = $agentidErr = $dateErr = $unitErr = $cnameErr = $caddrErr = "";
   $pid = $agentid = $date = $unit = $cname = $caddr = "";
    $f = $q =0;
    $salesid=0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    if (empty($_POST["agentid"])) {
      $agentidErr = "Agent ID is required";
     } else {
      $agentid = test_input($_POST["agentid"]);
      $f++;
   }
    
      
      
      $p=$_POST["pid"];
      $check="SELECT PID FROM product WHERE PID=$p";
      $result= mysql_query($check);
      
       if (empty($_POST["pid"])) {
      $pidErr = "Product ID is required";
     } 
      else if(mysql_num_rows($result)=='')
      {
          $pidErr="product with ID:$p not found";
      }
      else {
      $pid = test_input($_POST["pid"]);
      $f++;
   }
      
      
         if (empty($_POST["date"])) {
      $dateErr = "Date is required";
     } else {
      $date = test_input($_POST["date"]);
      $f++;
   }
      
      
     
      $check="SELECT STOCK FROM product WHERE PID=$p";
      $result= mysql_query($check);
      $runrows= mysql_fetch_assoc($result);
      $stock=$runrows['STOCK'];
      $sold=$_POST["unitsold"];
         if (empty($_POST["unitsold"])) {
      $unitErr = "Number of units sold is required";
     } 
      else if(mysql_num_rows($result)=='')
      {
          $unitErr="Not Enough Stock";
          
      }
      else if($sold>$stock)
      {
          
          $unitErr="Not Enough Stock";
      }
      else {
      $unit = test_input($_POST["unitsold"]);
      $f++;
   }
      
      
      
      
      
      
        if (empty($_POST["cusname"])) {
      $cnameErr = "Customer name is required";
     } else {
      $cname = test_input($_POST["cusname"]);
      $f++;
   }
      
      if (empty($_POST["cusaddr"])) {
      $caddrErr = "Customer address is required";
     } else {
      $caddr = test_input($_POST["cusaddr"]);
      $f++;
   }
      
      
      
      
      
      
        $s = "SELECT * FROM sales";
              $query=mysql_query($s); 
            while($runrows= mysql_fetch_assoc($query))
                  { 
                      $salesid = $runrows['SALESID'];
                    }
    
      }
     
       function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
       }
      
     

      
       if($f==6)
    {  
        
$salesid++;
           
        $strSQL = "INSERT INTO sales (AGENTID,PRODUCTID,UNITSSOLD,CUSADDR,CUSNAME,DATE,SALESID) VALUES('$agentid','$pid','$unit','$caddr','$cname','$date','$salesid')";
        $q=mysql_query($strSQL);
           
        $stock-=$unit;   
        mysql_query("UPDATE product SET STOCK='$stock' WHERE PID=$pid "  );
    }

        
        
        
        
        
     // $qw="  SELECT SUM(UNITSSOLD) FROM sales WHERE AGENTID='$agentid'";
   //   $r=mysql_query($qw);    
        
	  
if($q )
{
 sleep(3);
 header ('location: agntoptions.php');
}
             
    
    
   
    
   ?>


            <?php   $s = "SELECT * FROM sales";
              $quer=mysql_query($s); 
    
    if(mysql_num_rows($quer)==0)
    {
        echo "<h3>No Transaction Found</h3>";
    }
     else
     {
            while($runrows = mysql_fetch_assoc($quer))
                  { 
                      $salesid = $runrows["SALESID"];
                    }
        } 
    mysql_close();
    ?>


                <form method="POST" action="entersales.php">
                    <feildset>
                        <legend>
                            <h6>Enter Sales details</h6></legend>




                        <div class="row">
                            <div>
                                <div class="col s5">&nbsp;</div>
                                <div class="col s2">
                                    <input type="text" name="pid" placeholder="Product ID">
                                    <span class="error">* <?php echo $pidErr;?></span>
                                </div>

                            </div>

                            <div>
                                <div class="col s3 ">&nbsp;</div>
                                <h5>SALES ID : <?php $salesid++; echo "$salesid"; ?></h5>
                            </div>

                        </div>



                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s2">
                                <input type="text" name="agentid" value="<?php echo $_SESSION['agentidvalue']; ?>" hidden>
                                <!-- <span class="error">* <?php echo $agentidErr;?></span> -->
                            </div>
                            <br>
                            <div class="col s5">&nbsp;</div>
                        </div>

                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s2">
                                <input type="date" name="date" placeholder=" ">
                                <span class="error">* <?php echo $dateErr;?></span>
                            </div>
                            <br>
                            <div class="col s5">&nbsp;</div>
                        </div>


                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s3">
                                <input type="text" name="unitsold" placeholder="Number of units sold">
                                <span class="error">* <?php echo $unitErr;?></span>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s4">
                                <input type="text" name="cusname" placeholder="customer name">
                                <span class="error">* <?php echo $cnameErr;?></span>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                        <div class="row">
                            <div class="col s5">&nbsp;</div>
                            <div class="col s4">
                                <input type="text" name="cusaddr" placeholder="customer address">
                                <span class="error">* <?php echo $caddrErr;?></span>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                        <div class="row">
                            <div class="col s6">&nbsp;</div>
                            <div class="col s3">
                                <button class="btn waves-effect wave-light   collection-item  btn modal-trigger" data-target="modal1" onclick="return myfunction()">Done</button>
                            </div>
                            <div class="col s3">&nbsp;</div>
                        </div>


                    </feildset>

                    </div>






                    <!-- Modal Structure -->
                    <div id="modal1" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <h5>Add Sales Details</h5>
                            <p>Product ID :
                                <a id="mproductid" value=""> </a>
                                <br> Agent ID :
                                <a id="magentid" value=""></a>
                                <br> Date of Transaction :
                                <a id="mdate" value=""></a>
                                <br> Units Sold :
                                <a id="munits" value=""></a>
                                <br> Customer Name :
                                <a id="mcname" value=""></a>
                                <br> Customer Address :
                                <a id="mcaddr" value=""></a>
                                <br>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat " onclick="Materialize.toast('DONE', 1000)">ADD</button>


                        </div>
                    </div>
                </form>




                <script type="text/javascript">
                    function myfunction() {
                        var jagentid = document.getElementsByName("agentid")[0].value;
                        var jpid = document.getElementsByName("pid")[0].value;
                        var jdate = document.getElementsByName("date")[0].value;
                        var junitsold = document.getElementsByName("unitsold")[0].value;
                        var jcusname = document.getElementsByName("cusname")[0].value;
                        var jcusaddr = document.getElementsByName("cusaddr")[0].value;

                        document.getElementById("magentid").innerHTML = jagentid;
                        document.getElementById("mproductid").innerHTML = jpid;
                        document.getElementById("mdate").innerHTML = jdate;
                        document.getElementById("munits").innerHTML = junitsold;
                        document.getElementById("mcname").innerHTML = jcusname;
                        document.getElementById("mcaddr").innerHTML = jcusaddr;

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