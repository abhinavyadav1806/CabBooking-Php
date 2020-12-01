<?php
    include('dbConnect.php');
    include('user.php');
  
    if(isset($_SESSION['userdata']))
    {
        $dbConnect = new dbConnect();
        $user = new user(); 

        $user->ride($_SESSION['ride']['pickup'], $_SESSION['ride']['drop'], $_SESSION['ride']['luggage'], $_SESSION['ride']['fare'], $_SESSION['ride']['distance'], $dbConnect->connect);
    }
    else
    {
        header('Location: login.php'); 
    }
?>