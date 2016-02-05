<?php

$host='localhost';
$user='root';
$pass='';
$dbname='salesmanagement';

$link=mysql_connect($host,$user,$pass);

$con=mysql_select_db($dbname,$link);


?>