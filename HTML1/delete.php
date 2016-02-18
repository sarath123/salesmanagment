<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Detele agent</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <title></title>

    <nav>
        <div class="nav-wrapper teal ">
            <a href="#" class="brand-logo">Sales Management System</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="help.html">Help</a></li>
            </ul>

        </div>
    </nav>


    <style>
        .error {
            color: #FF0000;
        }
    </style>



</head>

<body>



    <?php

    require 'config.php';
    
    $searchErr = $search = "";
    $f=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
      
  
    if (empty($_POST["search"])) {
       $searchErr = "Search Value is required";}
        else
        {   $search = test_input($_POST["search"]);
       if (!preg_match("/^[a-zA-Z ]*$/",$search)) {
       $searchErr = "Only letters and white space allowed"; 
        }
       else
           $f++;
      }
    }    
      
    if( $f==1)
    {
    $strSQL = "SELECT * FROM user WHERE NAME LIKE '%$search%'";
    $query=mysql_query($strSQL);
        
        if(mysql_num_rows($query)==0)
        { echo "<p> Search value not found !!</p>";
        }
        else
          {
           while($runrows= mysql_fetch_assoc($query))
            { 
               $name = $runrows['NAME'];
               echo $name;
               echo "<script> document.getElementById('result').innerHTML= '..<p> $name <br></p>'; </script> ";
            }
          }
    
    }
     

  
    
       function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
       }
    
    
    
    ?>


        <form action="" method="POST">
            <div>
                <input type="text" name="search" placeholder="Search Value ">
                <span class="error">* <?php echo $searchErr;?></span>
                <input type="submit" value="Search">
            </div>

        </form>
        <div id="result">

        </div>



</body>

</html>