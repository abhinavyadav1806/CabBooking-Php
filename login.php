<?php
    include('dbConnect.php');
    include('user.php');

    if(isset($_POST['submit']))
    {
        $username = isset($_POST['username']) ? ($_POST['username']) : "";
        $password = isset($_POST['password']) ? ($_POST['password']) : "";

        $dbConnect = new dbConnect();
        $user = new user();

        $sql = $user->login($username, $password, $dbConnect->connect);
        echo $sql;
    }
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/login.css">
        <title>Login</title>
    </head>

    <body>
        <div>
            <?php include('header.php'); ?>
        </div>

        <div class="container">

            <div class="imgcontainer">
                <img src="image/logo.jpg" alt="Avatar" class="avatar">
                <h3>Login To Book Cab</h3>
            </div>

            <form action="" method="post">
                <div>
                    <div class="row">
                        <div class="col-25">
                        <label  class="col-25" for="username"><b>Username</b></label>
                        </div>

                        <div class="col-75">
                        <input  class="col-75" type="text" name="username" placeholder="Enter Username"><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label  class="col-25" for="password"><b>Password</b></label>
                        </div>

                        <div class="col-75">
                            <input  class="col-75" type="password" name="password" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
 
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </body>
</html>