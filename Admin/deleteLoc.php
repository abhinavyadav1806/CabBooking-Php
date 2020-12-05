<?php
    include("../dbConnect.php");
    $dbConnect = new dbConnect();

    $id = $_GET['id']; 

    mysqli_query($dbConnect->connect,"DELETE FROM tbl_location WHERE id='".$id."'");
    header("Location: locationL.php");
?> 