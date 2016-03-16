<?php
echo 'Hello World<br>hello all';

$name="Sarath";
$age=20;

$num1=1;
$num2=2;

$result=$num1+$num2;

echo '<br>'.$result.'<br>';

echo " My name is $name. And my age is $age";


?>
    <html>

    <body>
        <?php  
                require 'config.php';
            $query="SELECT SUM(UNITSSOLD), MONTH(DATE) AS MONTH FROM sales GROUP BY MONTH(DATE) ";
            $return=mysql_query($query);
       // if(mysql_num_rows($return)!=false)
         while($runrows= mysql_fetch_assoc($return))
         {  
            $sum = $runrows['SUM(UNITSSOLD)'];
            
            $m = $runrows['MONTH']; 
            //$date= strtotime($runrows['DATE']);
            echo " ['$m',$sum], "; 
         }
        
        ?>

    </body>

    </html>