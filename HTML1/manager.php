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

        <script src="js/materialize.js"></script>
        <script src="js/materialize.min.js"></script>

        <link rel="stylesheet" href="font/material-design-icons">
        <link rel="stylesheet" href="font/roboto">

        <nav>
            <div class="nav-wrapper teal ">
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
            $lll = $valueid['LOCATION'];
            echo " <h5>Manager ID : $ppp  <span style='float:right;'>Area : $lll<span></h5>";
             
             $_SESSION["manageridvalue"]=$ppp;
            $_SESSION["location"]=$lll;
        }
    
       ?>



            <div class="row " style="padding:40px;">
                <div class="col s12 m3">
                    <div class="z-depth-1 ">
                        <a href="signup.php" class="card">
                            <div class="card blue ">
                                <div class="card-content white-text">
                                    <span class="card-title">Add Agents</span>
                                    <p>To add new sales agent</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>




                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="delete.php" class="card ">
                            <div class="card red">
                                <div class="card-content white-text">
                                    <span class="card-title">Delete Agents</span>
                                    <p>To remove sales agent</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="salesLogManager.php" class="card ">
                            <div class="card orange">
                                <div class="card-content white-text">
                                    <span class="card-title">Sales log</span>
                                    <p>To view sales log</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="chart/QuadrantAnalysis.php" class="card ">
                            <div class="card green">
                                <div class="card-content white-text">
                                    <span class="card-title">Quadrant report</span>
                                    <p>General report on Analysis</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="productlist.php" class="card ">
                            <div class="card grey">
                                <div class="card-content white-text">
                                    <span class="card-title">Product List</span>
                                    <p>To view list of products</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>




                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="agentlist.php" class="card ">
                            <div class="card pink">
                                <div class="card-content white-text">
                                    <span class="card-title">Agent List</span>
                                    <p>To view list of agents </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="chart/QuadrantAnalysisManager.php" class="card ">
                            <div class="card brown">
                                <div class="card-content white-text">
                                    <span class="card-title">Self Analysis</span>
                                    <p>To analyse user performance </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="reviewWork.php" class="card ">
                            <div class="card cyan">
                                <div class="card-content white-text">
                                    <span class="card-title">Review Work</span>
                                    <p>To assign and review sales </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s12 m3">
                    <div class="z-depth-1">
                        <a href="agentRanking.php" class="card ">
                            <div class="card black">
                                <div class="card-content white-text">
                                    <span class="card-title">Agent Ranking</span>
                                    <p>To view ranking of agents </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>




    </body>

    </html>