<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title>Detele agent</title>
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
    
    $name = $sex =  $date =  $email = "";
    
    $searchErr = $search = "";
    $f = $c = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submitted"]=="yes") 
  {
      
  
    if (empty($_POST["search"])) {
       $searchErr = "* Search Value is required";}
        else
        {   $search = test_input($_POST["search"]);
       if (!preg_match("/^[a-zA-Z ]*$/",$search)) {
       $searchErr = "Only letters and white space allowed"; 
        }
       else
           $f++;
      }
    }    
    
    
    ?>




        <input type="hidden" name="ready" value="no">

        <form action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col s5 offset-s3">
                        <input type="text" name="search" placeholder="Search Value ">
                        <span class="error"><?php echo $searchErr;?></span>
                        <?php echo '<input type="hidden" name="submitted" value="yes">'; ?>
                            <button class="btn waves-effect waves-light" type="submit" value="Search">Submit
                                <i class="material-icons right"></i>
                            </button>
                    </div>
                </div>
            </div>

        </form>
        <div id="result">

        </div>







        <?php

  
      
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
                      $sex = $runrows['SEX'];
                      $date = $runrows['JOINDATE'];
                      $email = $runrows['EMAIL'];
                      $c++;
                      echo "  <div class=\"collection\">
                      <a href=\"#modal1?email=$email\"   class=\"collection-item  btn modal-trigger\" data-target=\"modal1\" >$name $sex $date $email</a> </div>";
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






            <form method="get">
                <!-- Modal Structure -->
                <div id="modal1" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <h4>Modal Header</h4>
                        <p>
                            <?php echo "$name $sex $date $email"; 
                              echo " <input type=\"hidden\" name=\"name\" value=\"$name\"> "; 
                              echo '<input type="hidden" name="ready" value="yes">';
                                ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" href="#!" id="delete" class="modal-action modal-close waves-effect waves-green btn-flat ">Remove</button>
                    </div>
                </div>
            </form>







            <?php 
                         if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["ready"]) ) 
                         {
                              if($_GET["ready"]=="yes")
                              {
                              $search=$_GET["name"];
                              $strSQL = "SELECT * FROM user WHERE NAME LIKE '%$search%'";
                              $query=mysql_query($strSQL);
        
                        
                               
                                  while($runrows= mysql_fetch_assoc($query))
                                  { 
                                      $name = $runrows['NAME'];
                                      $sex = $runrows['SEX'];
                                      $date = $runrows['JOINDATE'];
                                      $email = $runrows['EMAIL'];
                                      if($name==$search)
                                           break;
                                  }
                             
                             
                            
                             $sql = "DELETE FROM user WHERE NAME= '$name' AND EMAIL='$email'"; 
                             $retval = mysql_query( $sql); 
                             mysql_close();
  
                             }
                         }
                  
                 ?>








                <script type="text/javascript">
                    $(document).ready(function () {
                        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                        $('.modal-trigger').leanModal();
                    });
                </script>

</body>

</html>