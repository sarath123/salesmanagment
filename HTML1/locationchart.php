<html>

<head>


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
                <li><a href="manager.html">Home</a></li>
                <li><a href="help.html">Help</a></li>
            </ul>
        </div>
    </nav>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);









        function drawChart() {
            var data = google.visualization.arrayToDataTable([
        ["Element", "Density", {
                    role: "style"
                }],
        <?php 
          require 'config.php';
                $c=0;
        $color = array("#ff0000", "#ffff00", "#80ff00","#00ffff");
        $query="SELECT SUM(UNITSSOLD),PRODUCTID FROM sales GROUP BY PRODUCTID";
        $return=mysql_query($query);
         while($runrows= mysql_fetch_assoc($return))
         {
            $sum = $runrows['SUM(UNITSSOLD)'];
            $pid = $runrows['PRODUCTID']; 
             $cc=$color[$c++];
             echo " [\"$pid\",$sum,\"$cc\", ],";
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
                title: "ProductID vs Units Sold",
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
</head>

<body>


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
             echo " $pid----$sum|||||| ";
             
         }        
        ?>


</body>

</html>