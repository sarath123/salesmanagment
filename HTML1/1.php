<html>

<body>
    <?php  
                require 'config.php';
                    $query="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH , DATE FROM sales GROUP BY MONTH(DATE) ";
                    $return=mysql_query($query);
       
                    while($runrows= mysql_fetch_assoc($return))
                    {  
                        $sum = $runrows['SUM(UNITSSOLD)'];
                        $m = $runrows['MONTH']; 
                        $date= date("F", strtotime($runrows['DATE']));
                        if($m==1||$m==2||$m==3)
                            //echo " ['$date', $sum], "; 
                            //echo " ['$date', $sum], ";
                           echo "<p> ".$date." </p>
                    < p > ".$sum." < /p>";
       
                        
                    }
        ?>
</body>

</html>