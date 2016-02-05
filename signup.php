<?php

require'config.php';
$username=$_POST['user'];
$password=$_POST['pass'];


$sql="INSERT INTO Admin(username,password) VALUES('$username','$password')";
$query=mysql_query($sql);
if($query) {
    echo "success";
}



?>