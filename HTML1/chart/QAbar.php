<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:../login.php");
}
/*if($_SESSION['cat']=="agent")
{
    header ('Location:../agntoptions.php');
}*/
?>

    <html>

    <head>


        <link rel="stylesheet" href="../css/materialize.css">
        <link rel="stylesheet" href="../css/global.css">
        <link rel="stylesheet" href="../css/materialize.min.css">

        <script src="../js/materialize.js"></script>
        <script src="../js/materialize.min.js"></script>

        <link rel="stylesheet" href="../font/material-design-icons">
        <link rel="stylesheet" href="../font/roboto">

        <nav>
            <div class="nav-wrapper teal ">
                <a href="#" class="brand-logo">Sales Management System</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../manager.php">Home</a></li>
                    <li><a href="../help.html">Help</a></li>
                </ul>
            </div>
        </nav>

    </head>

    <body>
        <h3 align="center">Quadrant Analysis</h3>
        <form align="right" method="get" action="QuadrantAnalysis.php">
            <button type="submit">Pie Chart</button>
        </form>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);









            function drawChart() {
                var data = google.visualization.arrayToDataTable([
        ["Element", "Quantity", {
                        role: "style"
                }],
        <?php 
          require '../config.php';
                $c=0;
                    
                $i=1;
                $s=0;
                    $q=0;
        $color = array("#ffff00","#ff0000",  "#80ff00","#00ffff");
        $query="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH , DATE FROM sales GROUP BY MONTH(DATE)";
        $return=mysql_query($query);
         while($i<10)
         {  $runrows= mysql_fetch_assoc($return);
            $sum = $runrows['SUM(UNITSSOLD)'];
            $month = $runrows['MONTH']; 
             $cc=$color[$c++];
            if($month==$i|| $month==($i+1) ||$month==($i+2))
                $s+=$sum;
             else     
               { $q=($i+2)/3;
                 echo " [\"$q\st Qudarant\",$s,\"$cc\", ],";
                  $i=3+$i;
                $s=$sum;
               }
               
             
             if($c==4)
                  $c=0;
         }        
        ?>
      ]);


                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {
                        calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"
                },
                       2]);

                var options = {
                    title: "Yearly Quadrant vs Units Sold",
                    width: 800,
                    height: 600,
                    bar: {
                        groupWidth: "90%"
                    },
                    legend: {
                        position: "none"
                    },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                chart.draw(view, options);
            }
        </script>
        <div id="columnchart_values" style="width: 900px; height: 300px;"></div>










        </nav>
        <!--Div that will hold the pie chart-->
        <div id="chart_div"></div>


        <?php 
          require 'config.php';
        
        $query="SELECT SUM(UNITSSOLD),PRODUCTID FROM sales GROUP BY PRODUCTID";
        $return=mysql_query($query);
         while($runrows= mysql_fetch_assoc($return))
         {
            $sum = $runrows['SUM(UNITSSOLD)'];
            $pid = $runrows['PRODUCTID']; 
            // echo " $pid----$sum|||||| ";
            
            } 
        
        ?>


    </body>

    </html>