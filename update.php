<?php
    include('dbConnect.php');
    include('user.php');

    $dbConnect = new dbConnect();

    if(isset($_POST['update']))
    {
        $username = isset($_POST['username']) ? ($_POST['username']) : "";
        $name = isset($_POST['name']) ? ($_POST['name']) : "";
        $mobile = isset($_POST['mobile']) ? ($_POST['mobile']) : "";

        $user = new user();
        $sql = $user->update($username, $name, $mobile, $dbConnect->connect);
    }
    elseif(isset($_POST['back']))
    {   
        header('Location:customerDash.php');
    }  
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/signup.css">
        <title>
            Update Info
        </title>
    </head>

    <body>
        <div class="container">
            <h1 class="heading">Update Details</h1>
        
            <form action="" method="POST">
                
                <div class="row">
                    <div class="col-25">
                        <label for="name">Name</label>
                    </div>

                    <div class="col-75">
                        <input type="text" id="name" name="name" placeholder="Enter Name.." onkeypress="return alphaonly(event)" value="<?php echo $_SESSION['userdata']['name']?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="mobile">Mobile</label>
                    </div>

                    <div class="col-75">
                        <input type="number" id="mobile" name="mobile" placeholder="Enter Mobile Number.." value="<?php echo $_SESSION['userdata']['mobile']?>">
                    </div>
                </div>

                <div class="row">
                    <input type="submit" name="update" value="Update">
                </div>

                <div class="row">
                    <input type="submit" name="back" value="Back">
                </div>
            </form>
        </div>

        <script>
            function alphaonly(button) 
            { 
                console.log(button.which);
                var code = button.which;
                if ((code > 64 && code < 91) || (code < 123 && code > 96)|| (code==08)||(code < 58 && code > 47))
                return true; 
                return false; 
            } 
        </script>
    </body>
</html>
