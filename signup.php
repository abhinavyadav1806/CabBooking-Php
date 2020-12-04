<?php
    include('dbConnect.php');
    include('user.php');

    $dbConnect = new dbConnect();

    if(isset($_POST['submit']))
    {
        $username = isset($_POST['username']) ? ($_POST['username']) : "";
        $name = isset($_POST['name']) ? ($_POST['name']) : "";
        $mobile = isset($_POST['mobile']) ? ($_POST['mobile']) : "";
        $password = isset($_POST['password']) ? ($_POST['password']) : "";
        $repassword = isset($_POST['repassword']) ? ($_POST['repassword']) : "";
        //echo $username ,$name, $mobile, $password, $repassword;

        $user = new user();
        
        $sql = $user->signup($username, $name, $mobile, $password, $repassword, $dbConnect->connect);
        echo $sql;
    }  
    elseif(isset($_POST['already']))
    {
        header("Location:login.php");
    }
    elseif(isset($_POST['home']))
    {
        header("Location: index.php");
    }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/signup.css">
        <title>
            Register
        </title>
    </head>

    <body>
        <div>
            <?php include('header.php'); ?>
        </div>

        <div class="container">

            <div class="imgcontainer">
                <img src="image/logo.jpg" alt="Avatar" class="avatar">
                <h3>Sign Up To Book Cab</h3>
            </div>

            <form action="" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label for="username">User Name</label>
                    </div>

                    <div class="col-75">
                        <input type="text" id="username" name="username" placeholder="Unique User Name.." pattern="[a-zA-Z0-9_]{1,20}" title="NO SPACE ALLOWED ENTER ONLY LETTERS AND NUMBERS" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="name">Name</label>
                    </div>

                    <div class="col-75">
                        <input type="text" id="name" name="name" placeholder="Enter Name.." pattern="[a-zA-Z_]+([a-zA-Z]+){1,20}" title="Only letters are accepted" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="mobile">Mobile</label>
                    </div>

                    <div class="col-75">
                        <input type="number" id="mobile" name="mobile" placeholder="Enter Mobile Number.." required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="password">Password</label>
                    </div>

                    <div class="col-75">
                        <input type="password" id="password" name="password" placeholder="Enter Password.." required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="password">RePassword</label>
                    </div>

                    <div class="col-75">
                        <input type="password" id="repassword" name="repassword" placeholder="Enter Password Again.." required>
                    </div>
                </div>

                <div class="row">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>

            <form>
                <div class="row">
                    <input type="submit" id="already" name="already" value="Already Customer? Login">
                </div>
            </form>


        </div>
    </body>
</html>
