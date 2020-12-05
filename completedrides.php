<?php
    include('dbConnect.php');
    include('user.php');

    $x = $_SESSION['userdata']['userid'];

    $dbConnect = new dbConnect();
    $user = new user();
?>

<html>
    <head>
        <center>
        <?php
            if(isset($_SESSION['userdata']['username']))  
            {
                echo "<h3> Hello <b>" .$_SESSION['userdata']['username']. "</b> </h3>";
            }
            else
            {
                echo "<h3>You are not logged In</h3>";
            }
        ?>
        </center>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/infopage.css">
        <link rel="stylesheet" href="css/dashboard.css">
        <!-- ICON -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <title>CedCab</title>
        <script src="cabbook.js"></script>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <!-- Brand -->
                <a href="customerDash.php" class="navbar-brand pl-5"><span class="bg-dark text-white diff">Ced</span><span class="text-white diff">Cab</span></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_menu">
                    <span class="navbar-toggler-icon"></span>
                </button>     

                <ul class="navbar-nav">
                
                    <li class="nav-item">
                        <a class="nav-link" href="infopage.php">Account Info</a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Rides
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="pendingrides.php">Pending Rides</a>
                            <a class="dropdown-item" href="completedrides.php">Completed Rides</a>
                            <a class="dropdown-item" href="allrides.php">All Rides</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Account
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="update.php">Update Info</a>
                            <a class="dropdown-item" href="changepassword.php">Change Password</a>
                            <a class="dropdown-item" href="filter.php">Filter</a>
                        </div>
                    </li>

                    <li class="nav-item float-right">
                        <a class="nav-link" href="logout.php">LogOut</a>
                    </li>
                </ul>
            </nav>
        </header>
   
         <div class='container'>
            <h2 class="text-center text-info m-3">Your Completed Rides With Us</h2>
            <input type='hidden' id='sort' value='asc'>
            <table width='100%' id='empTable' border='1' cellpadding='10'>
                <tr>
                    <th><span onclick='sortTable("ride_id");'>Ride Id</span></th>
                    <th><span onclick='sortTable("ride_date");'>Ride Date</span></th>
                    <th><span>Pickup</span></th>
                    <th><span>Destination</span></th>
                    <th><span onclick='sortTable("total_distance");'>Total Distance</span></th>
                    <th><span onclick='sortTable("luggage");'>Luggage</span></th>
                    <th><span onclick='sortTable("total_fare");'>Total Fare</span></th>
                    <th><span>Invoice</span></th>
                </tr>

                <?php 
                    // $query = "SELECT * FROM tbl_ride ORDER BY ride_id ASC";
                    $query = "SELECT * FROM tbl_ride WHERE user_id = '$x' AND status = '2'";
                    $result = mysqli_query($dbConnect->connect,$query);

                    while($row = mysqli_fetch_array($result))
                    {
                    $ride_id  = $row['ride_id'];
                    $ride_date = $row['ride_date'];
                    $pickup = $row['pickup'];
                    $destination = $row['destination'];
                    $total_distance = $row['total_distance'];
                    $luggage = $row['luggage'];
                    $total_fare = $row['total_fare'];
                ?>

                <tr>
                    <td><?php echo $ride_id; ?></td>
                    <td><?php echo $ride_date; ?></td>
                    <td><?php echo $pickup; ?></td>
                    <td><?php echo $destination; ?></td>
                    <td><?php echo $total_distance; ?></td>
                    <td><?php echo $luggage; ?></td>
                    <td><?php echo $total_fare; ?></td>
                    <td><?php echo "<a href='invoice.php?id=".$row['ride_id']."'>Invoice</a>" ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>                     
    </body>
</html>