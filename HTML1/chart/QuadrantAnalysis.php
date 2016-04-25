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

if($_SESSION['cat']=="agent") 
    $_SESSION['home']="agntoptions";
else if ($_SESSION['cat']=="manager") 
     $_SESSION['home']="manager"; 
else 
    $_SESSION['home']="admin";

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
                    <li><a href="../<?php echo $_SESSION['home'] ?>.php">Home</a></li>
                    <li><a href="help.html">Help</a></li>
                </ul>
            </div>
        </nav>
    </head>

    <body>

        <h3 align="center">Quadrant Analysis</h3>
        <form align="right" method="get" action="QAbar.php">
            <button type="submit">Bar Graph</button>
        </form>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load Charts and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart']
            });

            // Draw the pie chart for 1st quadrant when Charts is loaded.
            google.charts.setOnLoadCallback(drawquad1);

            // Draw the pie chart for the 2nd quadrant when Charts is loaded.
            google.charts.setOnLoadCallback(drawquad2);

            // Draw the pie chart for 1st quadrant when Charts is loaded.
            google.charts.setOnLoadCallback(drawquad3);

            // Draw the pie chart for the 2nd quadrant when Charts is loaded.
            google.charts.setOnLoadCallback(drawquad4);






            // Callback that draws the pie chart for 1st quadrant.
            function drawquad1() {



                // Create the data table for 1st quadrant.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([<?php  
                require '../config.php';
                    $query="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH , DATE FROM sales GROUP BY MONTH(DATE) ";
                    $return=mysql_query($query);
       
                    while($runrows= mysql_fetch_assoc($return))
                    {  
                        $sum = $runrows['SUM(UNITSSOLD)'];
                        $m = $runrows['MONTH']; 
                        $date= date("F", strtotime($runrows['DATE']));
                        if($m==1||$m==2||$m==3)
                            echo " ['$date', $sum], "; 
                    }
        
                    ?>

                ]);

                // Set options for 1st quadrant pie chart.
                var options = {
                    title: 'Sales in 1 st Quadrant',
                    width: 600,
                    height: 500
                };

                // Instantiate and draw the chart for 1st quadrant .
                var chart = new google.visualization.PieChart(document.getElementById('quad1'));
                chart.draw(data, options);
            }







            // Callback that draws the pie chart for 2nd quadrant.
            function drawquad2() {

                // Create the data table for 2nd quadrant.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([<?php  
                
                    $query="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH , DATE FROM sales GROUP BY MONTH(DATE) ";
                    $return=mysql_query($query);
       
                    while($runrows= mysql_fetch_assoc($return))
                    {  
                        $sum = $runrows['SUM(UNITSSOLD)'];
                        $m = $runrows['MONTH']; 
                        $date= date("F", strtotime($runrows['DATE']));
                        if($m==4||$m==5||$m==6)
                            echo " ['$date', $sum], "; 
                    }
        
                    ?>

        ]);

                // Set options for 2nd quadrant chart.
                var options = {
                    title: 'Sales in 2nd Quadrant',
                    width: 600,
                    height: 500
                };

                // Instantiate and draw the chart for 2nd quadrant.
                var chart = new google.visualization.PieChart(document.getElementById('quad2'));
                chart.draw(data, options);
            }




            // Callback that draws the pie chart for 3rd quadrant.
            function drawquad3() {

                // Create the data table for 3rd quadrant.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    <?php  
               
                    $query="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH , DATE FROM sales GROUP BY MONTH(DATE) ";
                    $return=mysql_query($query);
       
                    while($runrows= mysql_fetch_assoc($return))
                    {  
                        $sum = $runrows['SUM(UNITSSOLD)'];
                        $m = $runrows['MONTH']; 
                        $date= date("F", strtotime($runrows['DATE']));
                        if($m==7||$m==8||$m==9)
                            echo " ['$date', $sum], "; 
                    }
        
                    ?>
                ]);

                // Set options for 3rd quadrant pie chart.
                var options = {
                    title: 'Sales in 3rd Quadrant',
                    width: 600,
                    height: 500
                };

                // Instantiate and draw the chart for 3rd quadrant .
                var chart = new google.visualization.PieChart(document.getElementById('quad3'));
                chart.draw(data, options);
            }



            // Callback that draws the pie chart for 4th quadrant.
            function drawquad4() {

                // Create the data table for 4th quadrant.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');
                data.addRows([
                    <?php  
                    $query="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH , DATE FROM sales GROUP BY MONTH(DATE) ";
                    $return=mysql_query($query);
       
                    while($runrows= mysql_fetch_assoc($return))
                    {  
                        $sum = $runrows['SUM(UNITSSOLD)'];
                        $m = $runrows['MONTH']; 
                        $date= date("F", strtotime($runrows['DATE']));
                        if($m==10||$m==11||$m==12)
                            echo " ['$date', $sum], "; 
                    }
        
                    ?>
        ]);

                // Set options for 4th quadrant pie chart.
                var options = {
                    title: 'Sales in 4th Quadrant',
                    width: 600,
                    height: 500
                };

                // Instantiate and draw the chart for 4th quadrant .
                var chart = new google.visualization.PieChart(document.getElementById('quad4'));
                chart.draw(data, options);
            }
        </script>


        <!--Table and divs that hold the pie charts-->
        <table class="columns">
            <tr>
                <td>
                    <div id="quad1" style="border: 1px solid #ccc"></div>
                </td>
                <td>
                    <div id="quad2" style="border: 1px solid #ccc"></div>
                </td>
            </tr>
        </table>

        <table class="columns">
            <tr>
                <td>
                    <div id="quad3" style="border: 1px solid #ccc"></div>
                </td>
                <td>
                    <div id="quad4" style="border: 1px solid #ccc"></div>
                </td>
            </tr>
        </table>


    </body>

    </html>