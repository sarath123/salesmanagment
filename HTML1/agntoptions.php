<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
if($_SESSION['cat']=="manager")
{
    header("Location:manager.php");
}
    
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">

        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/materialize.css">
        <link rel="stylesheet" href="css/materialize.min.css">

        <script src="js/materialize.js"></script>
        <script src="js/materialize.min.js"></script>

        <link rel="stylesheet" href="font/material-design-icons">
        <link rel="stylesheet" href="font/roboto">

        <nav>
            <div class="nav-wrapper teal " id="lol">
                <a href="#" class="brand-logo">Sales Management System</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="help.html">Help</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </nav>
    </head>


    <body>


        <?php 
         require 'config.php';
        
        if(isset($_SESSION['email']))
        {
   
 
        $ss=$_SESSION ['email'];
            
        $sql="SELECT * FROM user WHERE EMAIL='$ss'";
        $return=mysql_query($sql);
       
            $valueid=mysql_fetch_assoc($return);
            $ppp = $valueid['ID'];
            echo " Agent ID : $ppp";
             $_SESSION["agentidvalue"]=$ppp;
        }
    
       ?>



            <div class="row">
                <div class="col s4">&nbsp;</div>
                <div class="col s4 ">
                    <div class="z-depth-1">
                        <a href="entersales.php" class="card ">
                            <div class="card orange darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">Add Sales transaction</span>
                                    <p>To add new sales details</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s4">&nbsp;</div>
            </div>




            <div class="row">
                <div class="col s4">&nbsp;</div>
                <div class="col s4 ">
                    <div class="z-depth-1">
                        <a href="modifysales.php" class="card ">
                            <div class="card green darken-2">
                                <div class="card-content white-text">
                                    <span class="card-title">Modify Transcation</span>
                                    <p>To modify sales details</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s2">&nbsp;</div>
            </div>



            <div class="row">
                <div class="col s4">&nbsp;</div>
                <div class="col s4 ">
                    <div class="z-depth-1">
                        <a href="login.html" class="card ">
                            <div class="card blue darken-2">
                                <div class="card-content white-text">
                                    <span class="card-title">Sales Report</span>
                                    <p>To veiw sales details</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s2">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col s4">&nbsp;</div>
                <div class="col s4 ">
                    <div class="z-depth-1">
                        <a href="deletesales.php" class="card ">
                            <div class="card red darken-2">
                                <div class="card-content white-text">
                                    <span class="card-title">Remove Sales</span>
                                    <p>To delete transactoin details</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s2">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col s4">&nbsp;</div>
                <div class="col s4 ">
                    <div class="z-depth-1">
                        <a href="sales.php" class="card ">
                            <div class="card purple darken-2">
                                <div class="card-content white-text">
                                    <span class="card-title">Sales List</span>
                                    <p>To veiw user transactoin details</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s2">&nbsp;</div>
            </div>




    </body>