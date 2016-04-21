<?php

session_start();
if((isset($_SESSION['email']))&&($_SESSION['cat']=="agent"))
{
    header ('Location:agntoptions.php');
}
if((isset($_SESSION['email']))&&($_SESSION['cat']=="manager"))
{
    header ('Location:manager.php');
}
$host='localhost';
$user='root';
$pass='';
$dbname='salesmanagement';

$link=mysql_connect($host,$user,$pass);

$con=mysql_select_db($dbname,$link);

if(isset($_POST['email']))

{  
    $username=$_POST['email'];
    $password=$_POST['password'];
    
    $query=mysql_query("SELECT * FROM user WHERE EMAIL='$username'"); 
    if($query==true && mysql_num_rows($query)>0)
    {   
        $row=mysql_fetch_assoc($query);
        
        if($password==$row["PASSWORD"])
            {
            $_SESSION["email"]=$username;
            if($row["POSITION"]=="manager")
               {
                $_SESSION['cat']="manager";
                header ('Location:manager.php');
                echo "welcome manager";
              }
            
             else if($row["POSITION"]=="agent")
               {
                 $_SESSION['cat']="agent";
                 header ('Location:agntoptions.php');
                echo "welcome agent";
               }
             
            
            
            }
        
        
    }
    
    
    else 
    {
        $query1=mysql_query("SELECT * FROM admin WHERE username='$username'");
         if($query1==true)
         {   
            $row=mysql_fetch_assoc($query1);
        
          if($password==$row["password"])
            {
              $_SESSION["email"]=$username;
            
                $_SESSION['cat']="admin";
                header ('Location:admin.php');
                echo "welcome admin";
             }
   
        
         }
}
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
                <a id="top" href="#" class="brand-logo">Sales Management System</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="help.html">Help</a></li>
                </ul>
            </div>
        </nav>


    </head>

    <body>

        <p>
            <div id="container">
                <div class="row">
                    <form id="sign" action="login.php" method="post">

                        <div class="col s4 offset-s4">
                            <input type="email" name="email" placeholder="email" pattern="[a-zA-Z0-9]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}" title="example@example.com" required>
                        </div>
                        <br>

                        <div class="col s4 offset-s4">
                            <input type="password" name="password" placeholder="password" required>
                        </div>
                        <br>
                        <div class="col s5 offset-s4">
                            <input type="submit" class="btn waves-effect wave-light" value="Login In">
                        </div>
                        <br>



                    </form>
                </div>
            </div>
        </p>


    </body>

    </html>