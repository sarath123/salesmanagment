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
                <form id="sign" action="" method="post">

                    <div class="col s4 offset-s4">
                        <input type="text" name="name" placeholder="Username" required>
                    </div>
                    <br>
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