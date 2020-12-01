<?php
    include('../dbConnect.php');
    include('admin.php');

    $dbConnect = new dbConnect();
    $admin = new admin();
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/infopage.css">
        <!-- ICON -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>

    <body>
        <header>

            <h1>ALL Information</h1>
            <h3><a href='index.php'>GO BACK</a></h3>
            <!-- TILES -->
            <div> 
                <div class = "column" style = "background-color: #ed9537;">
                    <h3 class = "text-center">Total Fare Spent On CedCab</h3>
                    <h1 class="text-center text-danger">
                        <?php 
                            $admin->total_user($dbConnect->connect);
                        ?>
                    </h1>
                </div>

                <div class="column" style="background-color: #0cc71c;">
                    <h3 class="text-center">Overall Fare Collection</h3>
                    <h1 class="text-center text-danger">
                        <?php 
                            $admin->total_fare($dbConnect->connect);
                        ?>
                    </h1>
                </div>

                <div class="column" style="background-color: #ad1a29;">
                    <h3 class="text-center">Number of Approved Users</h3>
                    <h1 class="text-center text-info">
                        <?php 
                            $admin->approved_user($dbConnect->connect);
                        ?>
                    </h1>
                </div>

                <div class="column" style="background-color: #ed9537;">
                    <h3 class="text-center">Number of Blocked Users</h3>
                    <h1 class="text-center text-info">
                        <?php 
                            $admin->blocked_user($dbConnect->connect);
                        ?>
                    </h1>
                </div>

                <div class="column" style="background-color: #0cc71c;">
                    <h3 class="text-center">Number of Pending Request</h3>
                    <h1 class="text-center text-info">
                        <?php 
                            $admin->pending_request($dbConnect->connect);
                        ?>
                    </h1>
                </div>

                <div class="column" style="background-color: #ad1a29;">
                    <h3 class="text-center">Cancelled Request</h3>
                    <h1 class="text-center text-info">
                        <?php 
                            $admin->cancelled_request($dbConnect->connect);
                        ?>
                    </h1>
                </div>
                
            </div>
            <!-- TILES END-->
        </header>
    </body>
</html>