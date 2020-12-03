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
    elseif(isset($_POST['cancelbtn']))
    {
        header("Location: index.php");
    }
    elseif(isset($_POST['signup']))
    {
        header("Location: signup.php");
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
        <div class="form-popup" id="myForm">
            <form action="" method="post">

                <div class="imgcontainer">
                    <img src="image/user-avatar.png" alt="Avatar" class="avatar">
                </div>

                <div>
                    <label  class="col-25" for="username"><b>Username</b></label>
                    <input  class="col-75" type="text" name="username" placeholder="Enter Username">

                    <label  class="col-25" for="password"><b>Password</b></label>
                    <input  class="col-75" type="password" name="password" placeholder="Enter Password">

                    <button type="submit" name="submit">Login</button>
                    <!-- <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label> -->
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="submit" class="cancelbtn" name="cancelbtn" id="cancelbtn"  style="float:right;">Home</button>
                    <button type="submit" class="signup" name="signup" id="signup">Sign Up</button>
                    <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
                </div>
            </form>
        </div>

        <?php include('footer.php'); ?>
        
    </body>
</html>